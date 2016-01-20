var Vue = require('vue');
var VueRouter = require('vue-router');

Vue.use(VueRouter);

var router = new VueRouter({
    history: true,
});

router.map({
    '/': {
        component: {
            template: 'homepage',
        }
    },
    'about': {
        component: {
            template: 'this is about',
        }
    }
});

var App = Vue.extend({});
router.start(App, '#app');