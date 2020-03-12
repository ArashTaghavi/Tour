<template>
    <card :title=$route.name :active_loading=false>
        <add-btn :to="`/hostels/room/${$route.params.id}/bed`"/>
        <div class="table-responsive" v-if="beds.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>شماره تخت</th>
                                <th>تخفیف</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(bed,index) in beds" :key=index>
                                <td>{{bed.number}}</td>
                                <td>% {{bed.discount}}</td>
                                <td>
                                    <delete-btn :id="bed.id"/>
                                    <router-link :to="`/hostels/room/bed/${bed.id}/edit`">
                                        <button class="btn btn-icon btn-sm icon-left btn-info">
                                            <i class="fa fa-edit"></i>
                                            ویرایش
                                        </button>
                                    </router-link>
                                    <link-btn icon="home" :to="`/hostels/room/bed/${bed.id}/discount`">تخفیف</link-btn>
                                    <icon-btn type='danger' v-if="bed.is_reserved==1" icon="window-close"
                                              @click="handleReserve(bed.id)">تخلیه
                                    </icon-btn>
                                    <icon-btn type='primary' v-if="bed.is_reserved==0" icon="check"
                                              @click="handleReserve(bed.id)">رزرو
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
                beds: []
            }
        },

        created() {
            this.getBeds();
        },
        methods: {
            getBeds() {
                axios.get(`/bed-hostel-rooms/${this.$route.params.id}`)
                    .then(response => this.beds = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleReserve(id) {
                axios.put(`/bed-hostel-rooms/handle-reserve/${id}`)
                    .then(response => this.getBeds())
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/bed-hostel-rooms/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getBeds();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }


    }
</script>