import Vue from 'vue'
import Vuex from 'vuex'
import productos from './modules/productos'

Vue.use(Vuex)

export const store = new Vuex.Store({
    modules: {
        productos
    },
});
