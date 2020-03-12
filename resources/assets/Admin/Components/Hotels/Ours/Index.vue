<template>
    <card :title=$route.name>
        <add-btn to="/hotels"/>
        <div class="table-responsive" v-if="hotels.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>شهر</th>
                                <th>ستاره</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(hotel,index) in hotels" :key=index>
                                <td>{{hotel.title}}</td>
                                <td>{{hotel.city}}</td>
                                <td>
                                    <span v-for="star in hotel.star" class="fa fa-star" style="color: goldenrod"></span>
                                </td>
                                <td>
                                    <delete-btn :id="hotel.id"/>
                                    <edit-btn :to="`${hotel.id}`"/>
                                    <link-btn type="warning" icon="file" :to="`/hotels/${hotel.id}/gallery`">
                                        گالری
                                    </link-btn>
                                    <link-btn type="info" icon="home" :to="`/hotels/${hotel.id}/room`">
                                        اتاق
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
                hotels: []
            }
        },

        created() {
            this.getHotels();
        },
        methods: {
            getHotels() {
                axios.get('/hotels')
                    .then(response => this.hotels = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/hotels/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getHotels();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>