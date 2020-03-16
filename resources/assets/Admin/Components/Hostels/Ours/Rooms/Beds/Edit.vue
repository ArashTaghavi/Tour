<template>
    <card :title=$route.name>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="number" class="required">شماره تخت</label>
                    <input v-model="form.number"
                           type="number" class="form-control form-control-sm" id="number"
                           placeholder="شماره تخت را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="price" class="required">قیمت</label>
                    <input v-model="form.price"
                           min="0"
                           type="text" class="form-control form-control-sm" id="price"
                           placeholder="قیمت را وارد نمایید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="persons" class="required">تعداد نفر</label>
                    <input v-model="form.persons"
                           min="0"
                           type="text" class="form-control form-control-sm" id="persons"
                           placeholder="مشخص کنید که تخت چند نفره است">
                </div>
            </div>
            <submit @click="handleSubmit"/>
        </div>

    </card>
</template>

<script>
    export default {
        created() {

            this.getBed();
        },

        methods: {
            getBed() {
                axios.get(`/bed-hostel-rooms/get/${this.$route.params.id}`)
                    .then(response => this.form = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleSubmit() {
                axios.put(`/bed-hostel-rooms/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.$router.go(-1);
                }).catch(error => this.errorNotify(error));
            },

        }
    }
</script>
