<template>
    <card :title=$route.name :active_loading=false>
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <cropper-portlet v-model="form.profile_image" title="تصویر پروفایل" place="right"/>
                </div>
            </div>
            <submit @click="handleSubmit"/>
        </div>
        <div class="row" v-if="gallery.images!=null">
            <div class="table-responsive">
                <div class="section-title">گالری هاستل</div>
                <table class="table table-sm table-text-center">
                    <thead>
                    <tr>
                        <th>تصویر</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(gallery,key) in gallery.images" :key=key>
                        <td>
                            <img :src=gallery.profile_image :alt=gallery.id style="max-width: 100%">
                        </td>
                        <td>
                            <delete-btn :id="gallery.id"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </card>
</template>


<script>
    export default {
        data() {
            return {
                gallery: []
            }
        },
        created() {
            this.getGallery();
        },

        methods: {
            handleSubmit() {
                axios.post(`/hostel-images/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.getGallery();
                    this.emptyForm();
                }).catch(error => this.errorNotify(error));
            },
            getGallery() {
                axios.get(`/hostel-images/${this.$route.params.id}`)
                    .then(response => this.gallery = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/hostel-images/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getGallery();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }
    }
</script>
