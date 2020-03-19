import axios from 'axios'

const baseURL = 'http://webforceshop.test/api/';
const state = {
    products: [],
    product: {},
}

const mutations = {
    FETCH_PRODUCTS(state, products) {
        state.products = products;
    },
    NEW_PRODUCTO(state, newProducto) {
        state.products.push(newProducto);
    },
    FETCH_PRODUCT(state, product) {
        state.product = product;
    },
}

const getters = {
    getAllProducts(state) {
        return state.products;
    },
    getProduct(state) {
        return state.product;
    }
}

const actions = {
    fetchProducts({ commit }) {
        return axios.get(`${baseURL}products`)
            .then(response => {

                commit("FETCH_PRODUCTS", response.data.data);

                return response.data;
            }).catch(error => {
                return Promise.reject(error);
        });
    },
    fetchProduct({ commit }, { id }) {
        return axios.get(`${baseURL}products/${id}/`)
            .then((response) => {

                const product = response.data.data;
                commit("FETCH_PRODUCT", product);

                return product;
            }).catch((error) => {
                return Promise.reject(error);
        });
    }
}

export default {
    state,
    mutations,
    getters,
    actions,
}
