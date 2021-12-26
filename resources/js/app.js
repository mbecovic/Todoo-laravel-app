// require('./bootstrap');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
Vue.component('to-do', require('./components/ToDo.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
});
