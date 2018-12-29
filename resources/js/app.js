/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('jumbo', require('./components/JumboComponent.vue'));
Vue.component('single-tweet', require('./components/TweetComponent.vue'));
Vue.component('learn-laravel', require('./components/LearnComponent.vue'));
Vue.component('single-speaker', require('./components/SpeakerComponent.vue'));
Vue.component('contact-form', require('./components/ContactFormComponent.vue'));
Vue.component('sponsors-slider', require('./components/SponsorsComponent.vue'));
Vue.component('speaker-call', require('./components/SpeakerCallComponent.vue'));
Vue.component('slack-inviter', require('./components/SlackInviterComponent.vue'));
Vue.component('tinyletter-subscribe', require('./components/TinyLetterSubscribeComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
