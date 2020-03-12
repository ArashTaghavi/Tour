<template>
    <card :title=$route.name>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="floor" class="required">عنوان</label>
                    <input v-model="form.floor"
                           type="number" class="form-control form-control-sm" id="floor"
                           placeholder="طبقه را وارد کنید">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="number" class="required">شماره اتاق</label>
                    <input v-model="form.number"
                           type="number" class="form-control form-control-sm" id="number"
                           placeholder="شماره اتاق را وارد کنید">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="travel_style" class="required">امکانات رفاهی</label>
                    <input v-model="option"
                           @keypress.enter="addOption"
                           type="text" class="form-control form-control-sm" id="travel_style"
                           placeholder="امکانات رفاهی را وارد کنید و اینتر بزنید">
                </div>
                <div class="btn-group">
                    <button class="btn btn-sm btn-info" v-for="(value,index) in form.options">
                        <span>{{value}}</span>
                        <span class="ml-2" @click="removeOption(index)">
                                                    <i class="fa fa-window-close"></i>
                                                </span>
                    </button>
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
            <div class="col-md-8">
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
                option: []
            }
        },
        created() {

            this.getRoom();
        },

        methods: {
            getRoom() {
                axios.get(`/hotel-rooms/get/${this.$route.params.id}`)
                    .then(response => this.form = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleSubmit() {
                axios.put(`/hotel-rooms/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.$router.go(-1);
                }).catch(error => this.errorNotify(error));
            },
            addOption() {
                if (this.option !== '')
                    this.form.options.push(this.option);
                this.option = '';
            },
            removeOption(index) {
                this.form.options.splice(index, 1);
                this.$forceUpdate();
            },
            handleDelete(id) {
                axios.delete(`/hotel-rooms/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getRooms();
                    })
                    .catch(error => this.errorNotify(error));
            }

        }
    }
</script>
