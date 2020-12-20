require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-component', require('./main.vue').default);

Vue.use(require("bridge-vue-notification"));

const app = new Vue({
    el: '#app',
});
