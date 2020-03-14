<template>
    <card :title="`${$route.name}`">
        <add-btn to="policies"/>
        <div class="table-responsive" v-if="policies.length">
            <div id="table-1_wrapper" class="container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(policy,key) in policies" :key=key>
                                <td>
                                    <input type="text" class="no-input" @focus="handleClass($event)"
                                           @focusout="handleFieldUpdate(policy.id,'title',$event)"
                                           v-model="policy.title" placeholder="عنوان">

                                </td>
                                <td>
                                    <delete-btn :id=policy.id>حذف</delete-btn>
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
                policies: []
            }
        },
        created() {
            this.getPolicies();
        },
        methods: {
            getPolicies() {
                axios.get('/policies')
                    .then(response => this.policies = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/policies/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getPolicies();
                    })
                    .catch(error => this.errorNotify(error));
            },
            handleClass(event) {
                event.target.classList.remove('no-input');
                event.target.classList.add('form-control');
                event.target.classList.add('form-control-sm');
            },
            handleFieldUpdate(id, field, event) {
                event.target.classList.remove('form-control');
                event.target.classList.remove('form-control-sm');
                event.target.classList.add('no-input');
                axios.put(`/policies/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
        }
    }
</script>