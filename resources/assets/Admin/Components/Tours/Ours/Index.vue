<template>
    <card :title=$route.name>
        <add-btn to="/tours"/>
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
                                    <delete-btn :id="tour.id"/>
                                    <edit-btn :to="`${tour.id}`"/>
                                    <link-btn type="warning" icon="file" :to="`/tours/${tour.id}/gallery`">
                                        گالری
                                    </link-btn>
                                    <link-btn type="primary" icon="file" :to="`/tours/${tour.id}/itinerary`">
                                        برنامه سفر
                                    </link-btn>
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
                axios.get('/tours')
                    .then(response => this.tours = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/tours/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getTours();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>