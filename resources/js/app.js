/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('art', require('./components/Art.vue').default);
Vue.component('arte', require('./components/Arte.vue').default);
Vue.component('step', require('./components/Step.vue').default);
Vue.component('stepe', require('./components/Stepe.vue').default);
Vue.component('faq', require('./components/Faq.vue').default);
Vue.component('faqe', require('./components/Faqe.vue').default);
Vue.component('product', require('./components/Product.vue').default);
Vue.component('feedback', require('./components/Feedback.vue').default);
Vue.component('remark', require('./components/Remark.vue').default);
Vue.component('remarke', require('./components/Remarke.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
