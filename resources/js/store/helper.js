import { mapState, mapGetters, mapActions } from 'vuex'


/* Products */
export const productsComputed = {
    ...mapGetters(['getAllProducts', 'getProduct']),
    ...mapState(['products', 'product']),
};

export const productsMethods = mapActions(['fetchProducts', 'fetchProduct']);


/* Cart */
export const cartComputed = {
    ...mapGetters(['getItemsCart',]),
    ...mapState(['cart', 'cart_items']),
};

export const cartMethods = mapActions(['addToCard', 'removeItemCart', 'fetchCart']);

/* Billing */
export const billingComputed = {
    ...mapGetters(['getBillingData',]),
    ...mapState(['billing']),
};

export const billingMethods = mapActions(['addBillingData', ]);
