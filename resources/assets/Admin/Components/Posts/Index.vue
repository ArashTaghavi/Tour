<template>
    <card :title="`${$route.name}`">
        <add-btn to="posts"/>
        <div class="table-responsive" v-if="posts.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>دسته بندی</th>
                                <th>توضیحات</th>
                                <th>تصویر</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(post,key) in posts" :key=key>
                                <td>{{post.title}}</td>
                                <td>{{post.category.title}}</td>
                                <td>{{post.description}}</td>
                                <td>
                                    <img :src=post.url :alt=post.id class="img-thumbnail" style="width: 50%">
                                </td>
                                <td style="width: 30% !important">
                                    <link-btn type="warning" icon="comment" :to="`/posts/${post.id}/comments`">نظرات</link-btn>
                                    <edit-btn :to="`/posts/${post.id}`"/>
                                    <delete-btn :id="post.id"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <not-found v-else/>
    </card>
</template>


<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            this.getPosts();
        },

        methods: {
            getPosts() {
                axios.get('/posts')
                    .then(response => this.posts = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/posts/${id}`)
                    .then(response => this.getPosts())
                    .catch(error => this.errorNotify(error));
            }
        }

    }
</script>
<style>
    td{
        width: 15% !important;
    }
</style>