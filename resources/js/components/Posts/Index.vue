<template>
    <div class="container">

        <div class="row justify-content-between">
            <div class="col-md-2">
                <select v-model="params.category_id" class="form-select">
                    <option value="">-- choose category --</option>
                    <option v-for="category in categories" :value="category.id">
                        {{category.name}}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control col-md-3" placeholder="search" v-model="search">
            </div>
        </div>
        <table class="table mt-4">
            <div class="loading-cover" v-if="loading">
                <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;
        background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;" width="317px" height="317px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <g transform="rotate(0 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                        </rect>
                    </g><g transform="rotate(30 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(60 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(90 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(120 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(150 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(180 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(210 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(240 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(270 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(300 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g><g transform="rotate(330 50 50)" style="animation-play-state: running; animation-delay: 0s;">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0a0a0a" style="animation-play-state: running; animation-delay: 0s;">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite" style="animation-play-state: running; animation-delay: 0s;"></animate>
                    </rect>
                </g>
                    <!-- [ldio] generated by https://loading.io/ --></svg>
            </div>
            <thead>
            <tr>
                <th scope="col">
                    <a href="" @click.prevent="changeSort('title')">Title</a>
                    <span v-if="params.sort_field === 'title' && params.sort_direction === 'asc'">&uarr;</span>
                    <span v-if="params.sort_field === 'title' && params.sort_direction === 'desc'">&darr;</span>
                </th>
                <th scope="col">
                    <a href="" @click.prevent="changeSort('post_text')">Post text</a>
                    <span v-if="params.sort_field === 'post_text' && params.sort_direction === 'asc'">&uarr;</span>
                    <span v-if="params.sort_field === 'post_text' && params.sort_direction === 'desc'">&darr;</span>
                </th>
                <th scope="col">
                    <a href="" @click.prevent="changeSort('created_at')">Created at</a>
                    <span v-if="params.sort_field === 'created_at' && params.sort_direction === 'asc'">&uarr;</span>
                    <span v-if="params.sort_field === 'created_at' && params.sort_direction === 'desc'">&darr;</span>

                </th>
                <th scope="col">Actions</th>
            </tr>
            <tr>
                <th>
                    <input type="text" class="form-input w-100" v-model="params.title">
                </th>

                <th>
                    <input type="text" class="form-input w-100" v-model="params.post_text">
                </th>

                <th>
                    <input type="text" class="form-input w-100" v-model="params.created_at">
                </th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="post in posts.data" :key="post.id">

                <td>{{post.title}}</td>
                <td>{{post.post_text.substring(0, 50)}}</td>
                <td>{{post.created_at}}</td>
                <td>
                    <router-link :to="{name: 'posts.edit', params: {id: post.id}}" class="btn btn-sm btn-info mx-2">Edit
                    </router-link>
                    <button @click="deletePost(post.id)" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <pagination :data="posts" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
    export default {
        name: "Index",

        data() {
            return {
                posts: {},
                categories: {},
                params: {
                    category_id: '',
                    sort_field: 'created_at',
                    sort_direction: 'desc',
                    title: '',
                    post_text: '',
                    created_at: ''
                },
                search: '',
                loading: false,
            }
        },

        mounted() {
            this.getResults();
            this.getCategories();
        },

        watch: {
            params: {
                handler () {
                    this.getResults()
                },
                deep: true
            },
            search(val, old) {
                if(val.length>= 4 || old.length >= 4) {
                    this.getResults()
                }
            },
            // categoryId(value) {
            //     this.getResults();
            // }
        },

        methods: {
            // getResults(page = 1) {
            //     this.loading = true;
            //     axios.get('/api/posts?page=' + page +
            //         '&category_id=' + this.categoryId +
            //         '&sort_field=' + this.sortField +
            //         '&sort_direction=' + this.sortDirection
            //     )
            //         .then(response => {
            //             this.posts = response.data;
            //             this.loading = false;
            //         });
            //
            // },
            getResults(page = 1) {
                //this.loading = true;
                axios.get('/api/posts', {
                    params: {
                        page,
                        search: this.search.length >= 4 ? this.search : '',
                        ...this.params
                    }
                }).then(response => {
                    //console.log(response.data.data);
                    this.posts = response.data;
                    //this.loading = false;
                })
            },

            getCategories() {
                axios.get('/api/categories')
                    .then(response => {
                        this.categories = response.data.data;
                    });
            },

            changeSort(field) {
                if( this.params.sort_field === field ) {
                    this.params.sort_direction = this.params.sort_direction === 'asc' ? 'desc' : 'asc'
                } else {
                    this.params.sort_field = field;
                    this.params.sort_direction = 'asc'
                }
                this.getResults();
            },


            deletePost(id) {
                this.$swal({
                    title:  'Are you sure?',
                    text: 'The record will be permanently deleted.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                })
                    .then(result => {
                        if(result.value) {
                            axios.delete('/api/posts/' + id)
                                .then(response => {
                                    this.$swal({icon: 'success', title: 'Post deleted successfully'});
                                    this.getResults();
                                })
                                .catch(error => {
                                    this.$swal({icon:'error', title: 'Something went wrong'});

                                });
                        }
                    });

            }
        }

    }
</script>

<style scoped>
    .loading-cover {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0, .4);
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
