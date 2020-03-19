<template>
    <section class="title-product">
        <div class="single-product-content">
            <v-container>
                <v-row>
                    <v-col>
                        <h1>Category: <span>{{ getProduct.category }}</span></h1>
                        <hr>
                        <v-breadcrumbs :items="items" large></v-breadcrumbs>
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </section>
</template>

<script>
import {
    productsComputed,
    } from '../../store/helper';

export default {
    data: () => ({
      items: [
        {
          text: 'Home',
          disabled: false,
          href: '/',
        },
        {
          text: 'Product',
          disabled: true,
          href: 'breadcrumbs_link_2',
        },
      ],
    }),
    computed: {
        ...productsComputed,
    },
}
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';
    @import '../../../sass/common/_fonts';

    .title-product {
        div.single-product-content {
            position: relative;
            padding-top: 120px;

            @media #{map-get($display-breakpoints, 'sm-and-up')} {
                padding-top: 180px;
            }

            @media #{map-get($display-breakpoints, 'md-and-up')} {
                padding-top: 5rem;
            }

            @media #{map-get($display-breakpoints, 'lg-and-up')} {
                padding-top: 7.5rem;
            }

            h1 {
                color: map-get($theme-colors, primary);

                span {
                    color: map-get($theme-colors, dark);
                }
            }

            hr {
                border-color: map-get($theme-colors, primary);
                opacity: 0.5;
                width: 128px;
                margin: 24px 0;

                @media #{map-get($display-breakpoints, 'md-and-up')} {
                    margin: 32px 0;
                }

                @media #{map-get($display-breakpoints, 'lg-and-up')} {
                    margin: 40px 0;
                }
            }

            ul.v-breadcrumbs {
                background-color: map-get($theme-colors, white);
                padding: 0;
                margin-bottom: 0;

                li {
                    text-transform: uppercase;
                    color: map-get($theme-colors, dark);
                    font-size: 0.875rem;
                    line-height: 1.25rem;
                    padding-left: 0;

                    @media #{map-get($display-breakpoints, 'md-and-up')} {
                        line-height: 1.5rem;
                        font-size: 1rem;
                    }

                    a.v-breadcrumbs__item {
                        font-weight: 500;
                        text-transform: uppercase;
                        color: map-get($theme-colors, primary);
                        position: relative;
                        top: 0;
                        -webkit-transition: all 0.25s ease-out;
                        -moz-transition: all 0.25s ease-out;
                        -o-transition: all 0.25s ease-out;
                        transition: all 0.25s ease-out;
                        padding: 4px 0;

                        &:hover {
                            text-decoration: none;
                            top: -2px;
                        }
                    }
                }
            }
        }
    }
</style>
