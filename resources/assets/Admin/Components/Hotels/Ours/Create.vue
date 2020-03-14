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
                    <label for="bedroom_count" class="required">تعداد اتاق</label>
                    <input v-model="form.bedroom_count"
                           type="number" class="form-control form-control-sm" id="bedroom_count"
                           placeholder="تعداد را وارد کنید">
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
                    <label for="state" class="required">استان</label>
                    <input v-model="form.state"
                           type="text" class="form-control form-control-sm" id="state"
                           placeholder="استان را وارد کنید">
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
                    <label for="postal_code" class="required">کد پستی</label>
                    <input v-model="form.postal_code"
                           type="number" class="form-control form-control-sm" id="postal_code"
                           placeholder="کد پستی را وارد کنید">
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

            <div class="col-md-6">
                <label for="address" class="required">آدرس 1</label>
                <textarea class="form-control form-control-sm" cols="10" rows="5" id="address"
                          v-model="form.address"></textarea>
            </div>
            <div class="col-md-6">
                <label for="address2" class="">آدرس 2</label>
                <textarea class="form-control form-control-sm" cols="10" rows="5" id="address2"
                          v-model="form.address2"></textarea>
            </div>
            <div class="col-md-12">
                <h6 class="mt-4">اطلاعات تماس</h6>
                <hr>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="contact_name" class="required">نام</label>
                    <input v-model="form.contact_name"
                           type="text" class="form-control form-control-sm" id="contact_name"
                           placeholder="نام را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="manager_email">ایمیل مدیر</label>
                    <input v-model="form.manager_email"
                           type="text" class="form-control form-control-sm" id="manager_email"
                           placeholder="ایمیل مدیر را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="booking_email" class="required">ایمیل مسول رزرو</label>
                    <input v-model="form.booking_email"
                           type="text" class="form-control form-control-sm" id="booking_email"
                           placeholder="ایمیل مسول رزور را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="website">وبسایت</label>
                    <input v-model="form.website"
                           type="text" class="form-control form-control-sm" id="website"
                           placeholder="وبسایت را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="currency" class="required">واحد پول</label>
                    <input v-model="form.currency"
                           type="text" class="form-control form-control-sm" id="currency"
                           placeholder="وبسایت را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="language">زبان</label>
                    <input v-model="form.language"
                           type="text" class="form-control form-control-sm" id="language"
                           placeholder="زبان را وارد کنید">
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

            <div class="col-md-12">
                <h6>امکانات رفاهی</h6>
                <span v-for="(feature,index) in features" :key=index>
                    <label :for="`feature-${feature.id}`">{{feature.title}}</label>
                    <input type="checkbox" class="mr-2" :value=feature.title v-model="form.options"
                           :id="`feature-${feature.id}`">
                </span>
            </div>
            <div class="col-md-12">
                <h6>قوانین</h6>
                <span v-for="(policy,index) in policies" :key=index>
                    <label :for="`policy-${policy.id}`">{{policy.title}}</label>
                    <input type="checkbox" class="mr-2" :value=policy.title v-model="form.policies"
                           :id="`policy-${policy.id}`">
                </span>
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
        data(){
          return {
              features: [],
              policies:[]
          }
        },
        created() {
            this.form.country = 'ایران';
            this.getFeatures();
            this.getPolicies();
            this.form.options = [];
            this.form.policies = [];
        },
        methods: {
            getFeatures() {
                axios.get('/features')
                    .then(response => this.features = response.data)
                    .catch(error => this.errorNotify(error));
            },
            getPolicies() {
                axios.get('/policies')
                    .then(response => this.policies = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleSubmit() {
                axios.post(`/hotels`, this.form).then(response => {
                    this.successNotify(response);
                    this.$router.push('/hotels/ours')
                }).catch(error => this.errorNotify(error));
            },
        },
    }
</script>
