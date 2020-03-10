import Vue from 'vue';

import VueRouter from 'vue-router';
import router from "./router";
import VueBootstrap from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import axios from 'axios';
import VueAxios from 'vue-axios';

import App from './components/App';

Vue.use(VueAxios, axios);
Vue.axios.defaults.baseURL = 'http://flor2u_test_task.com/api';
Vue.use(VueRouter);
Vue.use(VueBootstrap);

Vue.router = router;

const app = new Vue({
    el: '#app',
    components: {App},
    router
});
