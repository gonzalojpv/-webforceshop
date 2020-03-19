
import axios from 'axios';

const baseURL = 'http://webforceshop.test/api/';

const state = {
    billing: {},
};

const mutations = {
    SET_BILLING(state, form) {
        state.billing = form;
    },
    CLEAN_BILLING() {
        state.billing = {};
    }
}

const getters = {
    getBillingData(state) {
        return state.billing;
    }
}


const actions = {
    addBillingData({ commit }, form) {
        commit("SET_BILLING", form);
    }
};


export default {
    state,
    mutations,
    getters,
    actions,
}
