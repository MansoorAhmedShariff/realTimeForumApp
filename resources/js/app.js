
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import Vuetify from 'vuetify';
import AppHome from './components/AppHome';
 
Vue.use(Vuetify)

const app = new Vue({
    el: '#app',
    components:{AppHome}
});
