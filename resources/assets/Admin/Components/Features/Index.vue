<template>
    <card :title="`${$route.name}`">
        <add-btn to="features"/>
        <div class="table-responsive" v-if="features.length">
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
                            <tr v-for="(feature,key) in features" :key=key>
                                <td>
                                    <input type="text" class="no-input" @focus="handleClass($event)"
                                           @focusout="handleFieldUpdate(feature.id,'title',$event)"
                                           v-model="feature.title" placeholder="عنوان">

                                </td>
                                <td>
                                    <delete-btn :id=feature.id>حذف</delete-btn>
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
                features: []
            }
        },
        created() {
            this.getFeatures();
        },
        methods: {
            getFeatures() {
                axios.get('/features')
                    .then(response => this.features = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/features/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getFeatures();
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
                axios.put(`/features/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
        }
    }
</script>