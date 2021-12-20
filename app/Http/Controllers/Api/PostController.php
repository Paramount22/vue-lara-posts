<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sortField = request('sort_field', 'created_at');
        if( !in_array($sortField, ['title', 'post_text', 'created_at']) ) {
            $sortField = 'created_at';
        }
        $sortDirection = request('sort_direction', 'desc');
        if( !in_array($sortDirection, ['asc', 'desc',]) ) {
            $sortDirection = 'desc';
        }

        $filled = array_filter(request()->only([
            'title',
            'post_text',
            'created_at'
        ]));
        $posts = Post::when(count($filled) > 0, function ($query) use($filled) {
            // local search for particular column (title, post_text, created_at)
            foreach ($filled as $column => $value) {
                $query->where($column, 'LIKE', '%' . $value . '%' );
            }
            // general search
        })->when(request('search', '') != '', function ($query) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('post_text', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('created_at', 'LIKE', '%' . request('search') . '%');
            });
        })->when(request('category_id', '') != '', function($query) {
            $query->where('category_id', request('category_id'));
        })->orderBy($sortField, $sortDirection)
        ->paginate(5);
        return PostResource::collection($posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        //sleep(3);
        $post = Post::create($request->validated());

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(PostStoreRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
