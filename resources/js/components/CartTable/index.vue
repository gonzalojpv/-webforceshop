<template>
    <section class="cart-table">
        <v-container>
            <v-row>
                <v-col>
                    <h2>Your <span>order</span></h2>
                    <hr>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" v-if="getItemsCart.length">
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th class="text-left">Product name</th>
                                    <th class="text-left">Price</th>
                                    <th class="text-left">Quantity</th>
                                    <th class="text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in getItemsCart" :key="item.name">
                                    <td>{{ item.product.name }}</td>
                                    <td>{{ item.quantity }}</td>
                                    <td>{{ item.product.price }}</td>
                                    <td class="text-center">
                                        <v-btn
                                            fab
                                            outlined
                                            x-small
                                            v-on:click="handleAction(item.id)"
                                            color="#020409">
                                            X
                                        </v-btn>
                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-col>
                <v-col cols="12" v-else>
                    <v-alert outlined color="purple">
                        <div class="title">Oops!</div>
                        <div>You don't add nothing in your shopping cart.</div>
                        <br />
                        <v-btn link href="/" depressed large>Shop now!</v-btn>
                    </v-alert>
                </v-col>
            </v-row>
            <v-row v-if="getItemsCart.length">
                <v-col cols="6" md="6">
                    <h4>Subtotal</h4>
                </v-col><v-col cols="6" md="6">
                    <h4>$838</h4>
                </v-col>
            </v-row>
            <v-row v-if="getItemsCart.length">
                <v-col cols="12">
                    <hr class="divider">
                </v-col>
            </v-row>
            <v-row v-if="getItemsCart.length">
                <v-col cols="6" md="6">
                    <h4>Shipping</h4>
                </v-col><v-col cols="6" md="6">
                    <h4>$838</h4>
                </v-col>
            </v-row>
            <v-row v-if="getItemsCart.length">
                <v-col cols="12">
                    <hr class="divider">
                </v-col>
            </v-row>
            <v-row v-if="getItemsCart.length">
                <v-col cols="6" md="6">
                    <h4>Total</h4>
                </v-col><v-col cols="6" md="6">
                    <h4>$838</h4>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>

<script>
import {
        billingComputed,
        cartComputed,
        cartMethods
    } from '../../store/helper';
import swal from 'sweetalert';

export default {
    data() {
        return {
        };
    },
    mounted() {
        this.fetchCart().then();
    },
    methods: {
        ...cartMethods,
        handleAction(id) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    this.removeItemCart(id).then( (response) => {
                        swal("Poof! Product removed from cart shopping.", {
                            icon: "success",
                        });
                    });
                }
            });
        }
    },
    computed: {
        ...billingComputed,
        ...cartComputed,
    },
}
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';
    @import '../../../sass/common/_fonts';

    section.cart-table {
        font-family: $font-family-base;

        h2 {
            color: map-get($theme-colors, primary);
            text-align: right;

            span {
                color: map-get($theme-colors, dark);
            }
        }

        h4 {
            color: map-get($theme-colors, dark);
            text-align: right;
        }

        hr {
            border-color: map-get($theme-colors, primary);
            opacity: 0.5;
            width: 128px;
            margin: 24px 0;
            margin-right: 0;
                margin-left: auto;

            &.divider {
                margin: 0;
                width: 70%;
                margin-right: 0;
                margin-left: auto;
            }
        }
    }
</style>
