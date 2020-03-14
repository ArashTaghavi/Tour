<template>
    <card :title=$route.name>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="floor" class="required">طبقه</label>
                    <input v-model="form.floor"
                           type="number" class="form-control form-control-sm" id="floor"
                           placeholder="طبقه را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="number" class="required">شماره اتاق</label>
                    <input v-model="form.number"
                           type="number" class="form-control form-control-sm" id="number"
                           placeholder="شماره اتاق را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="bed_count" class="required">تعداد تخت</label>
                    <input v-model="form.bed_count"
                           type="number" class="form-control form-control-sm" id="bed_count"
                           placeholder="تعداد تخت را وارد کنید">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description" class="">توضیحات</label>
                    <textarea v-model="form.description"
                              type="text" class="form-control form-control-sm"
                              rows="5"
                              id="description"
                              placeholder="توضیحات را وارد کنید">
                    </textarea>
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
        data() {
            return {
                rooms: [],
                option: [],
                features: [],
                options: []
            }
        },
        created() {
            this.getRoom();
            this.getFeatures();
        },

        methods: {
            getFeatures() {
                axios.get('/features')
                    .then(response => this.features = response.data)
                    .catch(error => this.errorNotify(error));
            },
            getRoom() {
                axios.get(`/hostel-rooms/get/${this.$route.params.id}`)
                    .then(response => this.form = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleSubmit() {
                axios.put(`/hostel-rooms/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.$router.go(-1);
                }).catch(error => this.errorNotify(error));
            },
        }
    }
</script>
