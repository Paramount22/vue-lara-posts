<template>
    <div class="container">
        <div class="card col-5">
            <div class="card-header">
                Create post
            </div>
            <div class="card-body">
                <form @submit.prevent="submitForm">
                    <div class="group-form mb-3">
                        <input v-model="fields.title" type="text" class="form-control" placeholder="Title">
                        <div class="text-danger mt-1"
                             v-if="errors && errors.title && fields.title === ''">
                            <strong>{{errors.title[0]}}</strong>
                        </div>
                        <div class="text-success mt-1"
                             v-if="fields.title !== ''">
                            <strong>Good ;-))</strong>
                        </div>
                    </div>

                    <div class="group-form mb-3">
                        <textarea v-model="fields.post_text" cols="5" class="form-control"
                                  placeholder="Text"></textarea>

                        <div class="text-danger mt-1" v-if="errors && errors.post_text && fields.post_text === ''">
                            <strong>{{errors.post_text[0]}}</strong>
                        </div>
                        <div class="text-success mt-1"
                             v-if="fields.post_text !== ''">
                            <strong>Good ;-))</strong>
                        </div>
                    </div>

                    <select v-model="fields.category_id" class="form-select" aria-label="Default select example">
                        <option value="">--select category --</option>
                        <option  v-for="category in categories" :value="category.id">
                            {{category.name}}
                        </option>
                    </select>
                    <div class="text-danger mt-1" v-if="errors && errors.category_id && fields.category_id === ''">
                        <strong>{{errors.category_id[0]}}</strong>
                    </div>
                    <div class="text-success mt-1"
                         v-if="fields.category_id !== ''">
                        <strong>Good ;-))</strong>
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit"
                               :value="formSubmitting ? 'Saving Post...' : 'Update Post'"
                               class="btn"
                               :class="formSubmitting ? 'btn-success' : 'btn-primary'"
                               :disabled="formSubmitting" />

                        <router-link :to="{name: 'posts.index'}"
                                     class="btn btn-sm btn-secondary mx-2">Back
                        </router-link>

                    </div>

                    <div class="progress mt-3" v-if="formSubmitting">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "PostsEdit",
        data() {
            return {
                categories: {},
                fields: {
                    title: '',
                    post_text: '',
                    category_id: '',

                },
                errors: {},
                formSubmitting: false
            }
        },

        created() {
            this.getCategories();
            this.getPost();
        },

        methods: {
            getCategories() {
                axios.get('/api/categories')
                    .then(response => {
                        this.categories = response.data.data;
                    });
            },

            submitForm() {
                this.formSubmitting = true;
                axios.put('/api/posts/' + this.$route.params.id , this.fields)
                    .then(response => {
                        this.$swal({icon: 'success', title: 'Post updated successfully'});
                        this.$router.push('/');
                        this.formSubmitting = false;
                    })
                    .catch(error => {
                        this.$swal({icon:'error', title: 'Something went wrong'});
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;

                        }
                        this.formSubmitting = false;
                    });
            },

            getPost() {
                axios.get('/api/posts/' + this.$route.params.id )
                    .then(response => {
                        this.fields = response.data.data
                    });
            }

            // selectFile(event) {
            //     this.fields.thumbnail = event.target.files[0]
            // }
        }
    }
</script>

<style scoped>

</style>
