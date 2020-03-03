<template>
    <card :title="`${$route.name}`">
        <div class="row">
            <div class="btn-group col-md-4 offset-md-4 mb-4">
                <button class="btn btn-sm btn-outline-success" style="width:100%" @click="handleSearch(1)">تایید شده
                </button>
                <button class="btn btn-sm btn-outline-danger" style="width:100%" @click="handleSearch(0)">تایید نشده
                </button>
                <button class="btn btn-sm btn-outline-info" style="width:100%" @click="handleSearch(2)">همه</button>
            </div>
        </div>
        <div class="table-responsive" v-if="comments.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>متن کامنت</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(comment,key) in comments" :key=key>
                                <td>{{comment.full_name}}</td>
                                <td>{{comment.email}}</td>
                                <td>{{comment.description}}</td>
                                <td>{{jDate(comment.created_at)}}</td>
                                <td>
                                    <icon-btn type="success" icon="check" v-if="comment.approved==0"
                                              @click="handlePending(comment.id)"> تایید
                                    </icon-btn>
                                    <delete-btn :id="comment.id"/>
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
                comments: []
            }
        },
        created() {
            this.getComments();
        },
        methods: {
            getComments() {
                axios.get('/comments')
                    .then(response => this.comments = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/comments/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getComments();
                    })
                    .catch(error => this.errorNotify(error));
            },
            handlePending(id) {
                axios.put(`/comments/${id}`)
                    .then(response => this.getComments())
                    .catch(error => this.errorNotify(error));
            },
            handleSearch(approved) {
                axios.get(`/comments/${approved}/search`)
                    .then(response => this.comments = response.data)
                    .catch(error => this.errorNotify(error));
            },
            jDate(date) {
                return moment(date).format('jYYYY/jM/jD HH:mm:ss');
            },
        }
    }
</script>
