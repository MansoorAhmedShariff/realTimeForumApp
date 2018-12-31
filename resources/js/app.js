
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'

Vue.use(VueSimplemde)

import AppHome from './components/AppHome';
import router from './router/router.js';
import User from './helpers/User.js';

window.User = User
window.EventBus = new Vue();
 
Vue.use(Vuetify)

const app = new Vue({
    el: '#app',
    router,
    components:{AppHome}
});
