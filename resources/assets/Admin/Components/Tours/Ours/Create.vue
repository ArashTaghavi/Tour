<template>
    <card :title=$route.name :active_loading=false>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="required">عنوان</label>
                    <input v-model="form.title"
                           type="text" class="form-control form-control-sm" id="title"
                           placeholder="عنوان تور را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="from" class="required">مبدا</label>
                    <input v-model="form.from"
                           type="text" class="form-control form-control-sm" id="from" placeholder="مبدا را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="to" class="required">مقصد</label>
                    <input v-model="form.to"
                           type="text" class="form-control form-control-sm" id="to" placeholder="مقصد را وارد کنید">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="min_age" class="required">حداقل سن</label>
                    <input v-model="form.min_age"
                           min="0"
                           type="number" class="form-control form-control-sm" id="min_age" placeholder="حداقل سن">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="max_age" class="required">حداکثر سن</label>
                    <input v-model="form.max_age"
                           min="0"
                           type="number" class="form-control form-control-sm" id="max_age" placeholder="حداکثر سن">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="min_group" class="required">حداقل نفرات</label>
                    <input v-model="form.min_group"
                           min="0"
                           type="number" class="form-control form-control-sm" id="min_group" placeholder="حداقل نفرات">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="max_group" class="required">حداکثر نفرات</label>
                    <input v-model="form.max_group"
                           min="0"
                           type="number" class="form-control form-control-sm" id="max_group" placeholder="حداکثر نفرات">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="accommodation" class="required">محل اقامت</label>
                    <input v-model="form.accommodation"
                           type="text" class="form-control form-control-sm" id="accommodation"
                           placeholder="محل اقامت را وارد کنید">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="transportation" class="required">حمل و نقل</label>
                    <input v-model="transportation"
                           @keypress.enter="addTransportation"
                           type="text" class="form-control form-control-sm" id="transportation"
                           placeholder="نوع حمل و نقل را وارد کنید و اینتر بزنید">
                </div>
                <span class="text-muted" v-if="this.form.transportation.length>0">
                            <i class="fa fa-car"></i>
                            وسایل مورد استفاده:
                        </span>
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary" v-for="(value,index) in form.transportation">
                        <span>{{value}}</span>
                        <span class="ml-2" @click="removeTransportation(index)">
                                                    <i class="fa fa-window-close"></i>
                                                </span>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="travel_style" class="required">نوع سفر</label>
                    <input v-model="travel_style"
                           @keypress.enter="addTravelStyle"
                           type="text" class="form-control form-control-sm" id="travel_style"
                           placeholder="نوع سفر را وارد کنید و اینتر بزنید">
                </div>
                <div class="btn-group">
                    <button class="btn btn-sm btn-info" v-for="(value,index) in form.travel_style">
                        <span>{{value}}</span>
                        <span class="ml-2" @click="removeTravelStyle(index)">
                                                    <i class="fa fa-window-close"></i>
                                                </span>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="trips" class="required">سفرها</label>
                    <input v-model="trips"
                           @keypress.enter="addTrips"
                           type="text" class="form-control form-control-sm" id="trips"
                           placeholder=" سفر را وارد کنید و اینتر بزنید">
                </div>
                <div class="btn-group">
                    <button class="btn btn-sm btn-warning" v-for="(value,index) in form.trips">
                        <span>{{value}}</span>
                        <span class="ml-2" @click="removeTrips(index)">
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
            <div class="col-md-9">
                <label for="description">توضیحات تور</label>
                <textarea class="form-control form-control-sm" cols="10" rows="5" id="description"
                          v-model="form.description"></textarea>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <cropper-portlet v-model="form.profile_image" title="تصویر شاخص" place="left"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tour_leader_id" class="required">تور لیدر</label>
                    <select name="" id="tour_leader_id" class="form-control form-control-sm" v-model="form.tour_leader_id">
                        <option :value="tour_leader.id" v-for="(tour_leader,key) in tour_leaders" :key=key>{{tour_leader.name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <icon-btn @click="addPeriod" type="success" icon="check">افزودن دوره</icon-btn>
            </div>
            <div class="row" v-for="(period,key) in periods" :key=key>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="discount">تخفیف</label>
                        <input v-model="period.discount"
                               min="0"
                               type="text" class="form-control form-control-sm" id="discount" placeholder="تخفیف">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="start_date" class="required">تاریخ شروع</label>
                        <Datepicker :inline="true" v-model="period.start_date" placeholder="تاریخ شروع تور"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="end_date" class="required">تاریخ پایان</label>
                        <Datepicker :inline="true" v-model="period.end_date" placeholder="تاریخ پایان تور"
                        />
                    </div>
                </div>
            </div>
            <submit @click="handleSubmit"/>
        </div>
    </card>
</template>


<script>
    import Datepicker from 'vuejs-datepicker';


    export default {
        data() {
            return {
                transportation: '',
                travel_style: '',
                trips: '',
                periods: [{
                    start_date: null,
                    end_date: null,
                    discount: 0
                }],
                tour_leaders: []
            }
        },
        created() {
            this.getTourLeaders();
            this.form.transportation = [];
            this.form.travel_style = [];
            this.form.trips = [];
            this.form.periods = [];
        },

        methods: {
            handleSubmit() {
                this.form.periods = this.periods;
                axios.post(`/tours`, this.form).then(response => {
                    this.successNotify(response);
                      this.$router.push('/tours/ours')
                }).catch(error => this.errorNotify(error));
            },
            addTransportation() {
                if (this.transportation !== '')
                    this.form.transportation.push(this.transportation);
                this.transportation = '';
            },
            removeTransportation(index) {
                this.form.transportation.splice(index, 1);
                this.$forceUpdate();
            },
            addTravelStyle() {
                if (this.travel_style !== '')
                    this.form.travel_style.push(this.travel_style);
                this.travel_style = '';
            },
            removeTravelStyle(index) {
                this.form.travel_style.splice(index, 1);
                this.$forceUpdate();
            },
            addTrips() {
                if (this.trips !== '')
                    this.form.trips.push(this.trips);
                this.trips = '';
            },
            removeTrips(index) {
                this.form.trips.splice(index, 1);
                this.$forceUpdate();
            },
            addPeriod() {
                let item = {
                    start_date: null,
                    end_date: null,
                    discount: 0
                };
                this.periods.push(item);

                item = {};
            },
            removePeriod() {

            },
            getTourLeaders() {
                axios.get('/tour-leaders')
                    .then(response => this.tour_leaders = response.data)
                    .catch(error => this.errorNotify(error));
            },
        },
        components: {
            Datepicker
        }
    }
</script>
