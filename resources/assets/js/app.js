
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    require('axios');
    require('./bootstrap');
    require('./smooth-scroll');
    require('./validator');
    require('./modules/contact');
} catch (e) {}

/**
 * Snackbar is the notification function to display quick notifications on the site.
 *
 * @param message
 */
window.showSnackBar = (message) => {
    let snackbar;
    snackbar = document.getElementById("snackbar");
    snackbar.className = "show";
    snackbar.innerHTML = message;
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
};

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });
