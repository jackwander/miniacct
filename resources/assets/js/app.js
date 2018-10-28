
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import swal from 'sweetalert2';
window.swal = swal;

import vSelect from 'vue-select';

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

import moment from 'moment';
window.moment = moment;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.filter('toCurrency', function (value) {
    if (typeof value !== "number") {
        return value;
    }
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'Php',
        minimumFractionDigits: 2
    });
    return formatter.format(value);
});

Vue.filter('formatDate', function(value) {
  if (value) {
    return moment(String(value)).format('MMM DD, YYYY');
  }
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('accounts', require('./components/Accounts.vue'));
Vue.component('account', require('./components/Account.vue'));
Vue.component('v-select', vSelect)
const app = new Vue({
    el: '#app'
});
