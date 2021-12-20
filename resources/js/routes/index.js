
import PostsIndex from '../components/Posts/Index'
import PostsCreate from '../components/Posts/PostsCreate'
import PostsEdit from '../components/Posts/PostsEdit'


export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: PostsIndex,
            name: 'posts.index'
        },

        {
            path: '/posts/create',
            component: PostsCreate,
            name: 'posts.create'
        },

        {
            path: '/posts/:id/edit',
            component: PostsEdit,
            name: 'posts.edit'
        },
    ]
}


