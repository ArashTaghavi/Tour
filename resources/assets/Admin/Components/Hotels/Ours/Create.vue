<template>
    <card :title=$route.name :active_loading=false>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="title" class="required">نام</label>
                    <input v-model="form.title"
                           type="text" class="form-control form-control-sm" id="title"
                           placeholder="نام هتل را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="country" class="required">کشور</label>
                    <input v-model="form.country"
                           type="text" class="form-control form-control-sm" id="country"
                           placeholder="کشور را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="city" class="required">شهر</label>
                    <input v-model="form.city"
                           type="text" class="form-control form-control-sm" id="city"
                           placeholder="شهر را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="star" class="required">ستاره</label>
                    <input v-model="form.star"
                           type="text" class="form-control form-control-sm" id="star"
                           placeholder="ستاره را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone" class="required">تلفن</label>
                    <input v-model="form.phone"
                           type="text" class="form-control form-control-sm" id="phone"
                           placeholder="تلفن را وارد کنید">
                </div>
            </div>


            <div class="col-md-9">
                <label for="address" class="required">آدرس</label>
                <textarea class="form-control form-control-sm" cols="10" rows="5" id="address"
                          v-model="form.address"></textarea>
            </div>
            <div class="col-md-12">
                <div class="form-group mt-5">
                    <cropper-portlet v-model="form.profile_image" title="تصویر شاخص" place="left"/>
                </div>
            </div>

            <submit @click="handleSubmit"/>
        </div>
    </card>
</template>


<script>


    export default {
        created() {
            this.form.country = 'ایران';
        },
        methods: {
            handleSubmit() {
                axios.post(`/hotels`, this.form).then(response => {
                    this.successNotify(response);
                    this.$router.push('/hotels/ours')
                }).catch(error => this.errorNotify(error));
            },
        },
    }
</script>
