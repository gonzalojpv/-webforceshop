<template>
    <section class="product-content">
        <v-container>
            <v-row>
                <v-col col="12" sm="12" md="6">
                    <div
                        v-bind:style="{ 'background-image': 'url(' + getProduct.featured_image + ')' }"
                        class="single-product-featured-image"></div>
                </v-col>
                <v-col col="12" sm="12" md="6">
                    <div class="single-product-entry">
                        <h3>{{ getProduct.name }}</h3>
                        <hr>
                        <div class="single-product-entry-content">
                            <p v-if="getProduct.long_description">
                                {{ getProduct.long_description }}
                            </p>
                            <p v-else>
                                {{ getProduct.description }}
                            </p>
                        </div>
                    </div>
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
    data() {
        return {
            featured_image: 'http://martinezbrands.com/wp-content/uploads/2019/08/antonio-aguilar.jpg',
        };
    },
    mounted() {
        this.fetchProduct({id: this.$route.params.id}).then();
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

    section.product-content {
        div.single-product-featured-image {
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            height: 440px;
            margin-bottom: 2rem;

            @media #{map-get($display-breakpoints, 'md-and-up')} {
                height: 42.5rem;
            }

            @media #{map-get($display-breakpoints, 'lg-and-up')} {
                margin-bottom: 0;
            }
        }
        div.single-product-entry {
            h3 {
                color: map-get($theme-colors, gray-1);
                margin-bottom: 2rem;
            }

            hr {
                border-color: map-get($theme-colors, dark);
                opacity: 0.25;
                margin-bottom: 24px;
                margin-left: 0;
                margin-right: 0;
            }

            div.single-product-entry-content {
                p {
                    color: map-get($theme-colors, gray-1);
                    margin-top: 0;
                    margin-bottom: 1rem;
                    font-size: 1rem;
                    line-height: 1.5rem;
                }
            }
        }
    }
</style>
