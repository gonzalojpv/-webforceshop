import axios from 'axios'

const baseURL = 'http://webforceshop.test/api/';
const state = {
    products: [
            { "id": 2, "name": "fuga possimus quis", "price": 52.5, "description": 'jojojojo', "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 3, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 2, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 3, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 2, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 3, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 2, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 3, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 2, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
            { "id": 3, "name": "fuga possimus quis", "price": 52.5, "description": null, "created_at": "17/03/2020", "updated_at": "17/03/2020" },
        ],
    src: 'http://martinezbrands.com/wp-content/uploads/2019/08/rancho-viejo.jpg',
}

const mutations = {
    FETCH_PRODUCTS(state, products) {
        state.products = products;
    },
    NEW_PRODUCTO(state, newProducto) {
        state.products.push(newProducto);
    },
}

const getters = {
    getAllProducts(state) {
        return state.products;
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
    }
}

export default {
    state,
    mutations,
    getters,
    actions,
}
