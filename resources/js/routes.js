import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent.vue';
import bookables from './components/bookables.vue';
import bookable from './components/bookable/Bookable.vue';

const routes = [
    {
        path : '/',
        component : ExampleComponent,
        name : 'Home'
    },
    {
        path : '/second',
        component : bookables,
        name : 'About'
    },
    {
        path : '/bookable/:id?',
        component : bookable,
        name : 'bookable'
    }
];

const router = new VueRouter({
    routes,
    mode:'history'
});

export default router;
