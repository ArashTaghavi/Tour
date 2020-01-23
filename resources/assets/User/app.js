import Vue from 'vue';

import VueRouter from 'vue-router';

// ==================  Handler & Helper ==================
import UiHandler from "../common/Mixins/UiHandler";
import NotifyHandler from "../common/Mixins/NotifyHandler";
import './Helper/Axios';

Vue.mixin(UiHandler);
Vue.mixin(NotifyHandler);

// ================== Packages  ==================
import moment from 'moment-jalali';

moment.locale('fa');
window.moment = moment;

import routes from './routes';


// ================== Use ==================
Vue.use(axios);
Vue.use(VueRouter);


// ================== VueRouter Config ==================
let router = new VueRouter({
    routes,
    mode: 'history',
    base: 'user'
});

Vue.router = router;

//  ================== Components  ==================
Vue.component('submit', () => import('./../common/Components/SubmitButton'));
Vue.component('card', () => import('./../common/Components/Card'));
Vue.component('ui-button', () => import('./../common/Components/UiButton'));
Vue.component('loading', () => import('./../common/Components/Loading'));
Vue.component('not-found', () => import('./../common/Components/NotFound'));
Vue.component('edit-btn', () => import('./../common/Components/EditButton'));
Vue.component('delete-btn', () => import('./../common/Components/DeleteButton'));
Vue.component('add-btn', () => import('./../common/Components/AddButton'));
Vue.component('icon-btn', () => import('./../common/Components/IconButton'));
Vue.component('link-btn', () => import('./../common/Components/LinkButton'));


import App from './App.vue';


window.Vue = Vue;

router.beforeEach((to, from, next) => {
    document.title = ` پنل کاربر - ${to.name}`;
    next();
});

window.app = new Vue({
    el: '#app',
    router,
    components: {App},
    render: h => h(App)
});