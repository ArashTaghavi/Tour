<template>
    <card :title="`${$route.name}`" :active_loading=false>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="title" class="required">عنوان</label>
                    <input type="text" class="form-control form-control-sm" v-model="form.title" id="title"
                           placeholder="عنوان را اینجا وارد نمایید.">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category_id" class="required">دسته بندی</label>
                    <select name="" id="category_id" class="form-control" v-model="form.category_id">
                        <option :value="category.id" v-for="(category,key) in categories" :key=key> {{category.title}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <label for="description" class="required">توضیحات</label>
                <textarea  id="description"
                           class="form-control"

                           v-model="form.description"
                           placeholder="توضیحات تصویر را اینجا وارد نمایید."></textarea>
            </div>
            <div class="col-md-12 text-right mt-3">
                <div class="form-group">
                    <cropper-portlet v-model="form.url" title="تصویر پروفایل" place="right"/>
                </div>
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
                axios.post('/posts', this.form)
                    .then(response => {
                        this.successNotify(response);
                        this.$router.push('/posts')
                    })
                    .catch(error => this.errorNotify(error));
            }
        }
    }
</script>