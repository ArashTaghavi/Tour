<template>
    <card :title="`${$route.name}`" :active_loading=false>
        <div class="row">
            <div class="form-group">
                <label for="title" class="required">عنوان</label>
                <input type="text" class="form-control form-control-sm" v-model="form.title" id="title"
                       placeholder="عنوان را اینجا وارد نمایید.">
            </div>
            <submit @click="handleSubmit"/>
        </div>

    </card>
</template>


<script>
    export default {

        methods: {
            handleSubmit() {
                axios.post('/features',this.form)
                    .then(response => {
                        this.successNotify(response);
                        this.$router.push('/features')
                    })
                    .catch(error => this.errorNotify(error));
            }
        }
    }
</script>