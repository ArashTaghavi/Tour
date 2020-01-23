<template>
    <card :title=$route.name :active_loading=false>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="title" class="required">عنوان</label>
                    <input v-model="form.title"
                           type="text" class="form-control form-control-sm" id="title"
                           placeholder="عنوان عکس را وارد کنید">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="">توضیحات</label>
                    <textarea v-model="form.description"
                              rows="5"
                              type="text" class="form-control form-control-sm" id="description"
                              placeholder="توضیحات را وارد کنید">
                    </textarea>
                </div>
            </div>
            <div class="col-md-3">
                <label for="main_gallery" style="line-height:10">نمایش در اسلایدر اصلی
                    <input type="checkbox" id="main_gallery" v-model="form.main_gallery">
                </label>
            </div>
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <cropper-portlet v-model="form.profile_image" title="تصویر پروفایل" place="right"/>
                </div>
            </div>
            <submit @click="handleSubmit"/>
        </div>
        <div class="row" v-if="gallery.images!=null">
            <div class="table-responsive">
                <div class="section-title">گالری تور</div>
                <table class="table table-sm table-text-center">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>مکان قرار گیری</th>
                        <th>تصویر</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(gallery,key) in gallery.images" :key=key>
                        <td>
                            <input type="text" class="no-input" @focus="handleClass($event)"
                                   @focusout="handleFieldUpdate(gallery.id,'title',$event)"
                                   v-model="gallery.title" placeholder="عنوان">
                        </td>
                        <td>
                        <textarea type="text" class="no-input" rows="5" style="width: 100%;resize: none"
                                  @focus="handleClass($event)"
                                  @focusout="handleFieldUpdate(gallery.id,'description',$event)"
                                  v-model="gallery.description" placeholder="توضیحات تصویر">
                            </textarea>
                        </td>
                        <td>
                            <select name="" id="" v-model="gallery.main_gallery" class="no-input"
                                    @change="handleFieldUpdate(gallery.id,'main_gallery',$event)"

                            >
                                <option :value=true>اسلایدر اصلی</option>
                                <option :value=false>مکان های دیدنی</option>
                            </select>
                        </td>
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
                axios.post(`/image-tours/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.getGallery();
                    this.emptyForm();
                }).catch(error => this.errorNotify(error));
            },
            getGallery() {
                axios.get(`/image-tours/${this.$route.params.id}`)
                    .then(response => this.gallery = response.data)
                    .catch(error => this.errorNotify(error));
            },
            handleClass(event) {
                event.target.classList.remove('no-input');
                event.target.classList.add('form-control');
                event.target.classList.add('form-control-sm');
            },
            handleFieldUpdate(id, field, event) {
                event.target.classList.remove('form-control');
                event.target.classList.remove('form-control-sm');
                event.target.classList.add('no-input');
                axios.put(`/image-tours/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/image-tours/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getGallery();
                    })
                    .catch(error => this.errorNotify(error));
            }
        }
    }
</script>
