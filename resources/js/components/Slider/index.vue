<template>
    <section class="slider-content">
        <v-carousel
            cycle
            continuous
            :show-arrows="false">
            <v-carousel-item
                v-for="(slide, i) in items"
                :key="i">
                <div
                    class="slider-image"
                    v-bind:style="{ 'background-image': 'url(' + slide.src + ')' }">
                    <div class="texture-bg"></div>
                        <v-container>
                            <v-row>
                                <v-col cols="12">
                                    <div class="carousel-caption">
                                        <h1>{{ slide.title }}</h1>
                                        <hr>
                                        <p>{{ slide.desciption }}</p>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-container>
                    </div>
            </v-carousel-item>
        </v-carousel>
    </section>
</template>

<script>
  export default {
    data () {
        return {
            items: [
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg',
                    title: 'Lorem ipsum dolor sit amet',
                    desciption: 'Vivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit',
                },
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg',
                    title: 'Vivamus integer non suscipit ',
                    desciption: 'Vivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit',
                },
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
                    title: 'Vivamus integer non suscipit ',
                    desciption: 'Vivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit',
                },
                {
                    src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
                    title: 'Vivamus integer non suscipit ',
                    desciption: 'Vivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit',
                },
            ],
        }
    },
  }
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables';
@import '../../../sass/common/_fonts';

.slider-content {
    .texture-bg {
        position: absolute;
        z-index: 1;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, rgba(2, 4, 9, 0) 0%, #020409 100%);
        transform: rotate(180deg);
    }

    .v-carousel {
        .v-window__container {
            div.v-window-item {
                height: 100vh;
                min-height: 720px;

                div.v-carousel__item {
                    div.slider-image {
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position-x: center;
                        background-position-y: center;
                        height: 800px;

                        @media #{map-get($display-breakpoints, 'md-and-up')} {
                            height: 620px;
                        }

                        @media #{map-get($display-breakpoints, 'lg-and-up')} {
                            height: 100vh;
                            min-height: 720px;
                        }
                    }

                    div.carousel-caption {
                        z-index: 2;
                        position: relative;
                        top: 0;
                        left: 0;
                        text-align: left;
                        padding: 9rem 1rem 1rem;
                        width: 100%;

                        h1 {
                            text-transform: uppercase;
                            color: map-get($theme-colors, white);
                            margin-bottom: 2rem;
                            font-family: $font-header;

                            @media #{map-get($display-breakpoints, 'md-and-up')} {
                                font-size: 3rem;
                            }
                        }

                        hr {
                            border-color: map-get($theme-colors, white);
                            opacity: 0.25;
                            width: 148px;
                            margin-left: 0 !important;
                            margin-right: 0;
                        }

                        p {
                            font-family: "Montserrat", sans-serif;
                            font-weight: 200;
                            color: map-get($theme-colors, white);
                            margin-bottom: 2rem;
                            margin-top: 2rem;

                            @media #{map-get($display-breakpoints, 'lg-and-up')} {
                                font-size: 1.25rem;
                                line-height: 1.75rem;
                            }
                        }
                    }
                }
            }
        }
    }
}
</style>
