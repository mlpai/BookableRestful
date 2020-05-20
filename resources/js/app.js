require('./bootstrap');
import VueRouter from 'vue-router';
import router from './routes';
import index from './pages/index.vue'
import moment from 'moment'
import StarRating from './shared/components/StarRating.vue'
window.Vue = require('vue');
Vue.use(VueRouter);

Vue.filter('fromNow',value => moment(value).fromNow());

Vue.component('StarRating',StarRating);

const app = new Vue({
    el: '#app',
    router,
    components : {
        "index": index
    }
});
