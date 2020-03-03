<template>
    <card :title="`${$route.name}`">
        <add-btn to="categories"/>
        <div class="table-responsive" v-if="categories.length">
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
                            <tr v-for="(category,key) in categories" :key=key>
                                <td>
                                    <input type="text" class="no-input" @focus="handleClass($event)"
                                           @focusout="handleFieldUpdate(category.id,'title',$event)"
                                           v-model="category.title" placeholder="عنوان">

                                </td>
                                <td>
                                    <icon-btn v-if="category.published===1" type="danger" icon="window-close"
                                              @click="handlePublished(category.id)">غیر فعال
                                    </icon-btn>
                                    <icon-btn v-if="category.published===0" type="success" icon="check"
                                              @click="handlePublished(category.id)">فعال
                                    </icon-btn>
                                    <delete-btn :id=category.id>حذف</delete-btn>
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
                categories: []
            }
        },
        created() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                axios.get('/categories')
                    .then(response => this.categories = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handlePublished(id) {
                axios.put(`/categories/published/${id}`)
                    .then(response => this.getCategories())
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/categories/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getCategories();
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
                axios.put(`/categories/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
        }
    }
</script>