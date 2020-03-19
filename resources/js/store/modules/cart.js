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
    REMOVE_TO_CART() {

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
    }
};


export default {
    state,
    mutations,
    getters,
    actions,
}
