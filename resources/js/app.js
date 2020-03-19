import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify);
Vue.use(VueRouter)

import App from './views/App'
import ProductDetail from './views/ProductDetail'
import Home from './views/Home'
import Checkout from './views/Checkout'

import {store} from './store';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/product/:id',
            name: 'product_detail',
            component: ProductDetail,
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    vuetify: new Vuetify(),
    router,
    store,
});
