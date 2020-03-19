import Vue from 'vue'
import Vuex from 'vuex'
import productos from './modules/productos'
import cart from './modules/cart'

Vue.use(Vuex)

export const store = new Vuex.Store({
    modules: {
        productos,
        cart
    },
});
