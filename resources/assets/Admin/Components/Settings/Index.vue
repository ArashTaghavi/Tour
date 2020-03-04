<template>
    <card :title="`${$route.name}`">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="no-input" @focus="handleClass($event)"
                           @focusout="handleFieldUpdate(settings.id,'phone',$event)"
                           v-model="settings.phone" placeholder="تلفن">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="no-input" @focus="handleClass($event)"
                           @focusout="handleFieldUpdate(settings.id,'email',$event)"
                           v-model="settings.email" placeholder="ایمیل">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea type="text" class="no-input" @focus="handleClass($event)"
                           @focusout="handleFieldUpdate(settings.id,'address',$event)"
                              v-model="settings.address" placeholder="آدرس"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea type="text" class="no-input" @focus="handleClass($event)"
                              @focusout="handleFieldUpdate(settings.id,'about_us',$event)"
                              v-model="settings.about_us" placeholder="درباره ما"></textarea>
                </div>
            </div>
        </div>
    </card>
</template>


<script>
    export default {
        data() {
            return {
                settings: {}
            }
        },
        created() {
            this.getSettings();
        },
        methods: {
            getSettings() {
                axios.get('/settings')
                    .then(response => this.settings = response.data)
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
                axios.put(`/settings/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
            jDate(date) {
                return moment(date).format('jYYYY/jM/jD HH:mm:ss');
            },
        }
    }
</script>
