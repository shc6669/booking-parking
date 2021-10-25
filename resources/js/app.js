require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Router from './router'

/**
 * Vue Render Init
 */
 new Vue({
    el: '#app',
    router: Router
});