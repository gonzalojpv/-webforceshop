<template>
    <section class="grid-products">
        <v-container>
            <v-row>
                <v-col
                    v-for="(product, i) in getAllProducts" :key="i"
                    col="12"
                    sm="4"
                    md="3"
                    lg="3">
                    <a href="#" class="product-card-anchor">
                        <div class="product-card">
                            <div
                                v-bind:style="{ 'background-image': 'url(' + src + ')' }"
                                class="product-card-image"></div>
                            <h5 class="product-card-title">Titli</h5>
                            <p class="product-card-text">des</p>
                            <a class="btn-discover" href="/">Discover it</a>
                        </div>
                    </a>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>

<script>
import {
    productsComputed,
    productsMethods
    } from '../../store/helper';

export default {
    mounted() {
        this.fetchProducts().then(response => {
            console.log(response);
        });
    },
    computed: {
        ...productsComputed,
    },
    methods: {
        ...productsMethods,
    }
}
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';
    @import '../../../sass/common/_fonts';

    .grid-products {
        .product-card-anchor {
            position: relative;
            color: map-get($theme-colors, dark);
            background-color: map-get($theme-colors, white);
            border-radius: 0;
            text-decoration: none;
            -webkit-transition: all 0.5s ease-out;
            -moz-transition: all 0.5s ease-out;
            -o-transition: all 0.5s ease-out;
            transition: all 0.5s ease-out;

            &:hover {
                text-decoration: none;
            }

            .product-card {
                position: relative;
                padding: 1.5rem;
                margin-bottom: 1rem;
                border: 4px solid map-get($theme-colors, white);
                -webkit-transition: all 0.5s ease-out;
                -moz-transition: all 0.5s ease-out;
                -o-transition: all 0.5s ease-out;
                transition: all 0.5s ease-out;
                height: 440px;

                @media #{map-get($display-breakpoints, 'sm-and-up')} {
                    height: 456px;
                }

                @media #{map-get($display-breakpoints, 'md-and-up')} {
                    height: 456px;
                }

                @media #{map-get($display-breakpoints, 'lg-and-up')} {
                    height: 468px;
                }

                a.btn-discover {
                    font-family: $font-family-base;
                    font-weight: 500;
                    font-size: 0.875rem;
                    text-decoration: none;
                    text-transform: uppercase;
                    padding: 5px 24px 7px;
                    position: absolute;
                    bottom: -18px;
                    left: calc(50% - 60px);
                    border: 2px solid #a98307;
                    color: map-get($theme-colors, white);
                    background-color: map-get($theme-colors, primary);
                    visibility: hidden;
                    opacity: 0;
                    -webkit-transition: all 0.25s ease-out;
                    -moz-transition: all 0.25s ease-out;
                    -o-transition: all 0.25s ease-out;
                    transition: all 0.25s ease-out;
                }

                &:hover {
                    border-color: map-get($theme-colors, primary);

                    a.btn-discover {
                        visibility: visible;
                        opacity: 1;
                        bottom: -24px;
                    }
                }

                .product-card-image {
                    position: relative;
                    height: 280px;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: contain;
                    margin-bottom: 1.5rem;

                    @media #{map-get($display-breakpoints, 'sm-and-up')} {
                        height: 272px;
                    }

                    @media #{map-get($display-breakpoints, 'md-and-up')} {
                        height: 272px;
                    }

                    @media #{map-get($display-breakpoints, 'lg-and-up')} {
                        height: 272px;
                    }
                }

                .product-card-title {
                    text-align: center;
                    font-size: 1rem;
                    line-height: 1.5rem;

                    @media #{map-get($display-breakpoints, 'lg-and-up')} {
                        font-size: 1.25rem;
                        line-height: 1.75rem;
                    }
                }

                p.product-card-text {
                    text-align: center;
                    font-family: "Montserrat", sans-serif;
                    font-size:  0.75rem;
                    line-height: 1rem;
                    width: 100%;
                    color: map-get($theme-colors, gray-2);
                    margin-bottom: 0;

                    @media #{map-get($display-breakpoints, 'lg-and-up')} {
                        font-size: 0.875rem;
                        line-height: 1.25rem;
                    }
                }
            }
        }
    }

</style>
