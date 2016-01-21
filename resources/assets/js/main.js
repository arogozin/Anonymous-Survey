var Vue = require('vue');
var VueRouter = require('vue-router');

Vue.use(VueRouter);

var router = new VueRouter({
    history: true,
});

import Login from './views/login.vue';
Vue.component('login', Login)

router.map({
    '/': {
        component: Login,
    },
    'about': {
        component: {
            template: 'this is about',
        }
    }
});


var App = Vue.extend({
    data: function() {
        return {
            links: [
                { path: '/', text: 'Dashboard' },
                { path: '/about', text: 'About' },
            ],
        };
    },
});
router.start(App, '#app');