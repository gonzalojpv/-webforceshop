import Vue from 'vue'
import Vuex from 'vuex'
import productos from './modules/productos'
import cart from './modules/cart'
import billing from './modules/billing'

Vue.use(Vuex)

export const store = new Vuex.Store({
    modules: {
        productos,
        cart,
        billing
    },
});
