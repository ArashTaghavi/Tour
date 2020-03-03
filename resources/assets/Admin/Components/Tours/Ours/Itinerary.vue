<template>
    <card :title=$route.name>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title" class="required">عنوان</label>
                    <input v-model="form.title"
                           type="text" class="form-control form-control-sm" id="title"
                           placeholder="عنوان را کنید">
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
            <submit @click="handleSubmit"/>
        </div>
        <div class="row" v-if="itineraries.length>0">
            <h5 class="">برنامه ریزی سفر</h5>
            <div class="col-md-12">
                <div id="accordion">
                    <div class="accordion" v-for="(itinerary,key) in itineraries" :key=key>
                        <div class="accordion-header collapsed" role="button"
                             data-toggle="collapse"
                             :data-target="`#panel-body-1${itinerary.id}`" aria-expanded="false">
                            <delete-btn :id=itinerary.id class="float-left"/>
                            <input type="text" class="no-input" @focus="handleClass($event)"
                                   @focusout="handleFieldUpdate(itinerary.id,'title',$event)"
                                   v-model="itinerary.title" placeholder="عنوان">
                        </div>
                        <div class="accordion-body collapse" :class="{'show':(key===0)}"
                             :id="`panel-body-1${itinerary.id}`"
                             data-parent="#accordion"
                             style="">
                            <textarea type="text" class="no-input" rows="5" style="width: 100%;resize: none"
                                      @focus="handleClass($event)"
                                      @focusout="handleFieldUpdate(itinerary.id,'description',$event)"
                                      v-model="itinerary.description" placeholder="توضیحات تور">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </card>
</template>

<script>
    export default {
        data() {
            return {
                itineraries: []
            }
        },
        created() {
            this.getItineraries();
        },

        methods: {
            handleSubmit() {
                axios.post(`/itinerary-tours/${this.$route.params.id}`, this.form).then(response => {
                    this.successNotify(response);
                    this.getItineraries();
                    this.emptyForm();
                }).catch(error => this.errorNotify(error));
            },
            getItineraries() {
                axios.get(`/itinerary-tours/${this.$route.params.id}`)
                    .then(response => this.itineraries = response.data)
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
                axios.put(`/itinerary-tours/field-update/${id}/${field}`, {data: event.target.value})
                    .then(response => response)
                    .catch(error => this.errorNotify(error));
            },
            handleDelete(id) {
                axios.delete(`/itinerary-tours/${id}`)
                    .then(response => {
                        this.successNotify(response);
                        this.getItineraries();
                    })
                    .catch(error => this.errorNotify(error));
            }

        }
    }
</script>
