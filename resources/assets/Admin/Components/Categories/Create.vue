<template>
    <card :title="`${$route.name}`" :active_loading=false>
        <div class="row">
            <div class="form-group">
                <label for="title" class="required">عنوان</label>
                <input type="text" class="form-control form-control-sm" v-model="form.title" id="title"
                       placeholder="عنوان را اینجا وارد نمایید.">
            </div>
            <submit @click="handleSubmit"/>
        </div>

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
            handleSubmit() {
                axios.post('/categories',this.form)
                    .then(response => {
                        this.successNotify(response);
                        this.$router.push('/categories')
                    })
                    .catch(error => this.errorNotify(error));
            }
        }
    }
</script>