<template>
    <section class="product-content">
        <v-container>
            <v-row>
                <v-col col="12" sm="12" md="6">
                    <div
                        v-bind:style="{ 'background-image': 'url(' + featured_image + ')' }"
                        class="single-product-featured-image"></div>
                </v-col>
                <v-col col="12" sm="12" md="6">
                    <div class="single-product-entry">
                        <h3>Vivamus integer non suscipit</h3>
                        <hr>
                        <div class="single-product-entry-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora tellus ligula porttitor metus.

                            Vivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit, euismod libero facilisi aptent elementum felis blandit cursus gravida sociis erat ante, eleifend lectus nullam dapibus netus feugiat curae curabitur est ad. Massa curae fringilla porttitor quam sollicitudin iaculis aptent leo ligula euismod dictumst, orci penatibus mauris eros etiam praesent erat volutpat posuere hac. Metus fringilla nec ullamcorper odio aliquam lacinia conubia mauris tempor, etiam ultricies proin quisque lectus sociis id tristique, integer phasellus taciti pretium adipiscing tortor sagittis ligula.
                            </p>
                        </div>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>

<script>
export default {
    props:[ 'category', 'product', 'description' ],
    data() {
        return {
            featured_image: 'http://martinezbrands.com/wp-content/uploads/2019/08/antonio-aguilar.jpg',
        };
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
