<template>
    <card :title=$route.name>
        <add-btn to="/tour-leaders"/>
        <div class="table-responsive" v-if="tour_leaders.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>توضیحات</th>
                                <th>تصویر</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(tour_leader,index) in tour_leaders" :key=index>
                                <td>
                                    <input type="text" class="no-input" @focus="handleClass($event)"
                                           @focusout="handleFieldUpdate(tour_leader.id,'name',$event)"
                                           v-model="tour_leader.name">
                                </td>
                                <td>
                                  <textarea type="text"  class="no-input" rows="5" style="width: 100%;resize: none"
                                            @focus="handleClass($event)"
                                            @focusout="handleFieldUpdate(tour_leader.id,'description',$event)"
                                            v-model="tour_leader.description" placeholder="توضیحات تور لیدرز">
                            </textarea>
                            </td>
                                <td>
                                    <img :src="tour_leader.profile_image"  style="max-width: 30%" :alt="tour_leader.name">
                                </td>
                                <td>
                                    <delete-btn :id="tour_leader.id"/>
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
                tour_leaders: []
            }
        },

        created() {
            this.getTourLeaders();
        },
        methods: {
            getTourLeaders() {
                axios.get('/tour-leaders')
                    .then(response => this.tour_leaders = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/tour-leaders/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getTourLeaders();
                    })
                    .catch(error => this.errorNotify(error));
            },
            handleFieldUpdate(id, field, event) {
                event.target.classList.remove('form-control');
                event.target.classList.remove('form-control-sm');
                event.target.classList.add('no-input');
                axios.put(`/tour-leaders/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
        }


    }
</script>