require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.component('pagination', require('laravel-vue-pagination'));

import App from './components/App'
import routes from './routes'


Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    components: {App},
    router: new VueRouter(routes)


});
