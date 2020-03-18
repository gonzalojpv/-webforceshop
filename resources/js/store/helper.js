import { mapState, mapGetters, mapActions } from 'vuex'


/* Products */
export const productsComputed = {
    ...mapGetters(['getAllProducts', 'getProduct']),
    ...mapState(['products', 'product']),
};

export const productsMethods = mapActions(['fetchProducts', 'fetchProduct']);
