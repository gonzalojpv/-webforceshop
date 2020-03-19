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
                <v-col cols="12">
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th class="text-left">Product name</th>
                                    <th class="text-left">Price</th>
                                    <th class="text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in desserts" :key="item.name">
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.calories }}</td>
                                    <td class="text-center">
                                        <v-btn
                                            fab
                                            outlined
                                            x-small
                                            v-on:click="handleAction"
                                            color="#020409">
                                            X
                                        </v-btn>
                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="6" md="6">
                    <h4>Subtotal</h4>
                </v-col><v-col cols="6" md="6">
                    <h4>$838</h4>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <hr class="divider">
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="6" md="6">
                    <h4>Shipping</h4>
                </v-col><v-col cols="6" md="6">
                    <h4>$838</h4>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <hr class="divider">
                </v-col>
            </v-row>
            <v-row>
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
            desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
          },
          {
            name: 'Eclair',
            calories: 262,
          },
          {
            name: 'Cupcake',
            calories: 305,
          },
          {
            name: 'Gingerbread',
            calories: 356,
          },
        ],
        };
    },
    methods: {
        ...cartMethods,
        handleAction(evt) {
            evt.preventDefault();
            console.log('remove item cart');
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

            &.divider {
                margin: 0;
                width: 70%;
                margin-right: 0;
                margin-left: auto;
            }

            @media #{map-get($display-breakpoints, 'md-and-up')} {
                margin: 32px 0;
            }

            @media #{map-get($display-breakpoints, 'lg-and-up')} {
                margin: 40px 0;
            }
        }
    }
</style>
