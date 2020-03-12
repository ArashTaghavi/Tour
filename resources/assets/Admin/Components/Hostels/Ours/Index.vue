<template>
    <card :title=$route.name>
        <add-btn to="/hostels"/>
        <div class="table-responsive" v-if="hostels.length">
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
                            <tr v-for="(hostel,index) in hostels" :key=index>
                                <td>{{hostel.title}}</td>
                                <td>{{hostel.city}}</td>
                                <td>
                                    <span v-for="star in hostel.star" class="fa fa-star" style="color: goldenrod"></span>
                                </td>
                                <td>
                                    <delete-btn :id="hostel.id"/>
                                    <edit-btn :to="`${hostel.id}`"/>
                                    <link-btn type="warning" icon="file" :to="`/hostels/${hostel.id}/gallery`">
                                        گالری
                                    </link-btn>
                                    <link-btn type="info" icon="home" :to="`/hostels/${hostel.id}/room`">
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
                hostels: []
            }
        },

        created() {
            this.getHostels();
        },
        methods: {
            getHostels() {
                axios.get('/hostels')
                    .then(response => this.hostels = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/hostels/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getHostels();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>