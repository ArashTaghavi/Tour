<template>
    <card :title=$route.name>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="discount" class="required">تخفیف</label>
                    <input v-model="form.discount"
                           type="number" class="form-control form-control-sm" id="discount"
                           placeholder="تخفیف را وارد کنید">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="start_date" class="required">تاریخ شروع</label>
                    <Datepicker :inline="true" v-model="form.start_date" placeholder="تاریخ شروع تور"
                    />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="end_date" class="required">تاریخ پایان</label>
                    <Datepicker :inline="true" v-model="form.end_date" placeholder="تاریخ پایان تور"
                    />
                </div>
            </div>
            <submit @click="handleSubmit"/>
        </div>
    </card>
</template>

<script>
    import Datepicker from "vuejs-datepicker";

    export default {
        created() {
          this.getDiscount()
        },

        methods: {
            getDiscount() {
                axios.get(`/bed-hostel-rooms/get/${this.$route.params.id}`)
                    .then(response => this.form = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleSubmit() {
                axios.put(`/bed-hostel-rooms/discount/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.$router.go(-1);
                }).catch(error => this.errorNotify(error));
            },
        },
        components: {
            Datepicker
        }
    }
</script>
