<template>
    <card :title=$route.name>
        <add-btn :to="`/hostels/${$route.params.id}/room`"/>
        <div class="table-responsive" v-if="rooms.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>شماره اتاق</th>
                                <th>تعداد تخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(room,index) in rooms" :key=index>
                                <td>{{room.number}}</td>
                                <td>{{room.bed_count}}</td>
                                <td>
                                    <delete-btn :id="room.id"/>
                                    <router-link :to="`/hostels/room/${room.id}/edit`">
                                        <button class="btn btn-icon btn-sm icon-left btn-info">
                                            <i class="fa fa-edit"></i>
                                            ویرایش
                                        </button>
                                    </router-link>
                                    <link-btn type="warning" icon="file" :to="`/hostels/room/${room.id}/gallery`">
                                        گالری
                                    </link-btn>
                                    <link-btn icon="home" :to="`/hostels/room/${room.id}/bed`">تخت</link-btn>
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
                rooms: []
            }
        },

        created() {
            this.getRooms();
        },
        methods: {
            getRooms() {
                axios.get(`/hostel-rooms/${this.$route.params.id}`)
                    .then(response => this.rooms = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleReserve(id) {
                axios.put(`/hostel-rooms/handle-reserve/${id}`)
                    .then(response => this.getRooms())
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/hostel-rooms/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getRooms();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>