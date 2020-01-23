<template>
    <card :title=$route.name>
        <div class="table-responsive" v-if="tours.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>مبدا</th>
                                <th>مقصد</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(tour,index) in tours" :key=index>
                                <td>{{tour.title}}</td>
                                <td>{{tour.from}}</td>
                                <td>{{tour.to}}</td>
                                <td>{{tour.start_date}}</td>
                                <td>{{tour.end_date}}</td>
                                <td>
                                    <a :href="`/tours/${tour.slug}`" class="btn btn-sm btn-success m-1">
                                        مشاهده تور
                                        <i class="fa fa-eye"></i>
                                    </a>
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
                tours: []
            }
        },

        created() {
            this.getTours();
        },
        methods: {
            getTours() {
                axios.get('/reserved-tours')
                    .then(response => this.tours = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/reserved-tours/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getTours();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>