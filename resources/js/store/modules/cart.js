import axios from 'axios';

const baseURL = 'http://webforceshop.test/api/';

const state = {
    cart: {},
    cart_items: [],
};

const mutations = {
    ADD_TO_CART(state, product) {
        state.cart_items.push(product);
    },
    UPDATE_CART(state, items) {
        state.cart_items = items;
    }
}

const getters = {
    getCart(state) {
        return { cart: state.cart, items: state.cart_items};
    }
}


const actions = {
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
    }
};


export default {
    state,
    mutations,
    getters,
    actions,
}
