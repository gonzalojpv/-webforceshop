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
            <v-row>
                <v-col cols="12">
                    <v-btn block dark>Place Order</v-btn>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <div class="text-center">
                        <p class="order-message text-center">
                        Any personal information we request will be used only to process your order or provide support. Under no circumstances will we sell or otherwise give away your information.
                    </p>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>

<script>
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
          {
            name: 'Jelly bean',
            calories: 375,
          },
          {
            name: 'Lollipop',
            calories: 392,
          },
          {
            name: 'Honeycomb',
            calories: 408,
          },
          {
            name: 'Donut',
            calories: 452,
          },
          {
            name: 'KitKat',
            calories: 518,
          },
        ],
        };
    }
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
        }

        hr {
            border-color: map-get($theme-colors, primary);
            opacity: 0.5;
            width: 128px;
            margin: 24px 0;

            &.divider {
                margin: 0;
                width: 50%;
            }

            @media #{map-get($display-breakpoints, 'md-and-up')} {
                margin: 32px 0;
            }

            @media #{map-get($display-breakpoints, 'lg-and-up')} {
                margin: 40px 0;
            }
        }

        p.order-message {
            width: 50%;
            margin: 0 auto;
            text-align:center;
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.5rem;
        }
    }
</style>
