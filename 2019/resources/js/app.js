import swal from 'sweetalert';

require('./bootstrap');
window.Vue = require('vue');

// Ignore the custom tito button HTML
Vue.config.ignoredElements = ['tito-button'];

// Load Vue components...
Vue.component('schedule', require('./components/ScheduleComponent.vue').default);
Vue.component('speakers', require('./components/SpeakersComponent.vue').default);
Vue.component('slack-invite', require('./components/SlackInviteComponent.vue').default);

const app = new Vue({ el: '#app' });
