require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

axios.defaults = undefined;
axios.defaults.baseURL = 'http://localhost:80/api';

new Vue({
    el: '#app',
    components: { App },
    template: '<App/>',
});

