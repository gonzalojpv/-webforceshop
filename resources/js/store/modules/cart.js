import axios from 'axios';

const baseURL = 'http://webforceshop.test/api/';

const state = {
    cart: {
        subtotal: 0,
        shipping: 20,
        total: 0,
    },
    cart_items: [],
};

const mutations = {
    ADD_TO_CART(state, product) {
        state.cart_items.push(product);
    },
    UPDATE_CART(state, items) {
        state.cart_items = items;
    },
    UPDATE_INFO_CART(state, data) {
        state.cart.subtotal = data.subtotal;
        state.cart.total = data.total;
    }
}

const getters = {
    getItemsCart(state) {
        return state.cart_items;
    },
    getInfoCart(state) {
        return state.cart;
    },
    getTotalCart(state) {
        let sum = 0;
        let total = state.cart_items.forEach(element => sum + element.product.price);

        return total;
    }
}

const actions = {
    updateTotalCart({ state, commit }, value) {
        let sum = 0;
        let subtotal = state.cart_items.forEach(element => sum + element.product.price);
        let total = subtotal + state.shipping;
        commit("UPDATE_INFO_CART", { total, subtotal });
    },
    addToCard({ commit }, value) {
        return axios.post(`${baseURL}cart/`, value)
            .then(response => {

                //commit("FETCH_PRODUCTS", response.data.data);

                return response.data;
            }).catch(error => {
                return Promise.reject(error);
        });
    },
    removeItemCart({ commit }, id) {
        return axios.delete(`${baseURL}cart/${id}`).then(response => {
            console.log(response);

            commit("UPDATE_CART", response.data.data);

            return response.data;
        }).catch(error => {
            return Promise.reject(error);
        });
    },
    fetchCart({ state, commit }) {
        return axios.get(`${baseURL}cart/`).then(response => {

            commit("UPDATE_CART", response.data.data);

            let subtotal = 0;
            response.data.data.forEach(element => {
                subtotal = subtotal + element.product.price;
            });
            let total = subtotal + state.cart.shipping;

            commit("UPDATE_INFO_CART", { total, subtotal });

            return response.data;
        }).catch(error => {
            return Promise.reject(error);
        });
    }
};


export default {
    state,
    mutations,
    getters,
    actions,
}
