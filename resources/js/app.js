require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-component', require('./main.vue').default);

const app = new Vue({
    el: '#app',
});
