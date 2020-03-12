<template>
    <card :title=$route.name>
        <add-btn :to="`/hotels/${$route.params.id}/room`"/>
        <div class="table-responsive" v-if="rooms.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>شماره اتاق</th>
                                <th>تخفیف</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(room,index) in rooms" :key=index>
                                <td>{{room.number}}</td>
                                <td>% {{room.discount}}</td>
                                <td>
                                    <delete-btn :id="room.id"/>
                                    <router-link :to="`/hotels/room/${room.id}/edit`">
                                        <button class="btn btn-icon btn-sm icon-left btn-info">
                                            <i class="fa fa-edit"></i>
                                            ویرایش
                                        </button>
                                    </router-link>
                                    <link-btn type="warning" icon="file" :to="`/hotels/room/${room.id}/gallery`">
                                        گالری
                                    </link-btn>
                                    <link-btn icon="home" :to="`/hotels/room/${room.id}/discount`">تخفیف</link-btn>
                                    <icon-btn type='danger' v-if="room.is_reserved==1" icon="window-close"
                                              @click="handleReserve(room.id)">تخلیه
                                    </icon-btn>
                                    <icon-btn type='primary' v-if="room.is_reserved==0" icon="check"
                                              @click="handleReserve(room.id)">رزرو
                                    </icon-btn>
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
                axios.get(`/hotel-rooms/${this.$route.params.id}`)
                    .then(response => this.rooms = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleReserve(id) {
                axios.put(`/hotel-rooms/handle-reserve/${id}`)
                    .then(response => this.getRooms())
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/hotel-rooms/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getRooms();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>