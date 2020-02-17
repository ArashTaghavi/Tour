<template>
    <card :title=$route.name :active_loading=false>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title" class="required">نام و نام خانوادگی</label>
                    <input v-model="form.name"
                           type="text" class="form-control form-control-sm" id="title"
                           placeholder="نام کامل تور لیدر را وارد نمایید">
                </div>
            </div>
            <div class="col-md-6">
                <label for="description" class="required">درباره تور لیدر</label>
                <textarea class="form-control form-control-sm" cols="30" rows="13" id="description" v-model="form.description"></textarea>
            </div>
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <cropper-portlet v-model="form.profile_image" title="تصویر پروفایل" place="left"/>
                </div>
            </div>
            <submit @click="handleSubmit"/>
        </div>
    </card>
</template>


<script>


    export default {
        methods: {
            handleSubmit() {
                axios.post(`/tour-leaders`,this.form).then(response => {
                    this.successNotify(response);
                    this.$router.push('/tour-leaders')
                }).catch(error => this.errorNotify(error));
            },
        }
    }
</script>
