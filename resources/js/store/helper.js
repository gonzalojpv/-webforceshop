import { mapState, mapGetters, mapActions } from 'vuex'


/* Products */
export const productsComputed = {
    ...mapGetters(['getAllProducts']),
    ...mapState(['src', 'products']),
};

export const productsMethods = mapActions(['fetchProducts']);
