import axios from 'axios';

const baseURL = 'http://webforceshop.test/api/';

const state = {
    cart: {
        subtotal: 0,
        shipping: 20,
        total: 0,
    },
    _cart: getCart('auth._cart'),
    cart_items: [],
    id: getCart('cart.id'),
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
    },
    SET_KEY_CART(state, _cart) {
        saveState('auth._cart', _cart);
        state._cart = _cart;
    },
    SET_ID_CART(state, _id) {
        saveState('cart.id', _id);
        state.id = _id;
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
    },
    getKeyCart(state) {
        return { id: state.id, _cart: state._cart };
    }
}

const actions = {
    updateTotalCart({ state, commit }, value) {
        let sum = 0;
        let subtotal = state.cart_items.forEach(element => sum + element.product.price);
        let total = subtotal + state.shipping;
        commit("UPDATE_INFO_CART", { total, subtotal });
    },
    addToCard({ state, commit }, value) {

        value._cart = state._cart;

        return axios.post(`${baseURL}cart/`, value)
            .then(response => {
                commit("ADD_TO_CART", response.data.data);
                commit("SET_KEY_CART", response.data.data.session_id);
                commit("SET_ID_CART", response.data.data.cart_id);

                return response.data;
            }).catch(error => {
                return Promise.reject(error);
        });
    },
    removeItemCart({ commit }, id) {
        return axios.delete(`${baseURL}cart/${id}`).then(response => {

            commit("UPDATE_CART", response.data.data);

            return response.data;
        }).catch(error => {
            return Promise.reject(error);
        });
    },
    fetchCart({ state, commit }, id) {
        return axios.get(`${baseURL}cart/${id}`).then(response => {

            commit("UPDATE_CART", response.data.data.items);

            let subtotal = 0;
            response.data.data.items.forEach(element => {
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

function getCart(key) {
    return window.localStorage.getItem(key);
}

function saveState(key, state) {
    window.localStorage.setItem(key, JSON.stringify(state))
}

export default {
    state,
    mutations,
    getters,
    actions,
}
