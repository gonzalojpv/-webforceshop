<template>
    <div class="add-to-cart">
        <p class="price">${{ getProduct.price }}</p>
        <v-form @submit="onSubmit">
            <v-container>
                <v-row>
                    <v-col cols="4">
                        <v-text-field
                            type="number"
                            step="1"
                            min="1"
                            max="10"
                            value="1"
                            class="quantity"
                            v-model="quantity"
                            label="Quantity"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <button
                            type="submit"
                            name="add-to-cart"
                            value="12"
                            class="single_add_to_cart_button">{{ text_button }}</button>
                    </v-col>
                </v-row>
            </v-container>

        </v-form>
        <div class="product_meta">
            Category: <span>{{ getProduct.category }}</span>
        </div>
    </div>
</template>

<script>
import {
    productsComputed,
    cartComputed,
    cartMethods
    } from '../../store/helper';
import swal from 'sweetalert';

export default {
    data() {
        return {
            quantity: 1,
            text_button: 'Add to cart',
        };
    },
    methods: {
        ...cartMethods,
        onSubmit(evt) {
            evt.preventDefault();

            this.addToCard({
                product_id: this.getProduct.id,
                quantity: this.quantity,
            }).then((response) => {
                swal('In your cart shopping!', 'You added new product in your shopping cart!', 'success');
                 this.text_button = 'Update cart';
            });
        }
    },
    computed: {
        ...productsComputed,
        ...cartComputed,
    },
}
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';
    @import '../../../sass/common/_fonts';

    div.add-to-cart {
        p.price {
            font-size: 2.5rem;
            font-weight: 600;
            color: map-get($theme-colors, dark);
        }

        form {
            label.v-label {
                font-weight: 700;
                color: map-get($theme-colors, dark);
                font-size: 1.125rem;
            }
            input.quantity {
                border-bottom: 1px solid map-get($theme-colors, dark);
                font-size: 1.125rem;
                text-align: center;
                font-weight: 400;
            }
            button.single_add_to_cart_button {
                border: 1px solid map-get($theme-colors, dark);
                border-radius: 0;
                background-color: map-get($theme-colors, white);
                font-weight: 700;
                text-align: center;
                font-size: 1.125rem;
                padding: .618em 1em;
                position: relative;
                -webkit-transition: all 0.25s ease-out;
                -moz-transition: all 0.25s ease-out;
                -o-transition: all 0.25s ease-out;
                transition: all 0.25s ease-out;
                top: 0;
                font-family: $font-header;

                &:hover {
                    border-color: map-get($theme-colors, primary);
                    background-color: map-get($theme-colors, primary);
                    color: map-get($theme-colors, white);
                    top: -1px;
                }
            }
        }

        .product_meta {
            font-size: 1.125rem;
            color: map-get($theme-colors, dark);

            span {
                color: map-get($theme-colors, primary);
            }
        }
    }
</style>
