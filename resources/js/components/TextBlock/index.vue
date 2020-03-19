<template>
    <section class="text-block">
        <v-container>
            <v-row>
                <v-col cols="8" offset="2">
                    <h2>Our Top <span>Sellers</span></h2>
                    <hr>
                    <p class="content">
                        {{ description }}
                    </p>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>

<script>
export default {
    data() {
        return {
            description: 'We proudly represent a unique and exclusive portfolio of brands that already have an established consumer base, and rely on us to strategically identify and develop their own innate distribution channels, as well as new brands that are backed up with a serious marketing plan and budget to allow the development of a consumer base within the chosen distribution channels.'
        };
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables';
@import '../../../sass/common/_fonts';

.text-block {
    h2 {
      color: map-get($theme-colors, dark);
      text-align: center;

      @media #{map-get($display-breakpoints, 'sm-and-up')} {
        text-align: center;
      }

      span {
        color: map-get($theme-colors, primary);
      }
    }

    hr {
      border-color: map-get($theme-colors, primary);
      opacity: 0.5;
      width: 128px;
      margin: 1.5rem auto 2.5rem;

      @media #{map-get($display-breakpoints, 'sm-and-up')} {
        margin: 1.5rem auto 2.5rem;
      }
    }

    p.content {
      color: map-get($theme-colors, gray-1);
      text-align: center;
      font-family: $font-family-base;
      line-height: 1.5;

      @media #{map-get($display-breakpoints, 'sm-and-up')} {
        text-align: center;
      }
    }
}
</style>
