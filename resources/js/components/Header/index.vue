<template>
    <header class="header">
        <v-card flat tile>
            <v-container>
                <v-toolbar flat>
                    <v-toolbar-title>
                        <a href="/">
                            <h2>WepForce<span>Shop</span></h2>
                        </a>
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn large light link href="/checkout">
                        Cart
                    </v-btn>
                </v-toolbar>
            </v-container>
        </v-card>
    </header>
</template>

<script>

export default {
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables';
@import '../../../sass/common/_fonts';

header.header {
    position: absolute;
    background-color: transparent !important;
    width: 100%;
    z-index: 1030;
    webkit-transition: all 0.5s ease-out;
    -moz-transition: all 0.5s ease-out;
    -o-transition: all 0.5s ease-out;
    transition: all 0.5s ease-out;

    &.dark {
        background-color: map-get($theme-colors, dark) !important;
    }

    div.v-card {
        background-color: transparent !important;

        header.v-sheet {
            background-color: transparent !important;

            div.v-toolbar__content {
                background-color: transparent !important;

                div.v-toolbar__title {
                    a {
                        text-decoration: none;
                    }

                    h2 {
                        font-size: 2.25rem;
                        line-height: 1.2;
                        color: map-get($theme-colors, white);
                        font-weight: bold;
                        font-family: $font-header;

                        span {
                            color: map-get($theme-colors, primary);
                        }
                    }
                }

                a.v-btn {
                    background-color: transparent !important;
                    border-radius: 50%;
                    color: map-get($theme-colors, white);
                    border: 2px solid map-get($theme-colors, primary);
                    font-family: $font-header;
                    font-size: 0.6rem;
                    min-width: 44px !important;
                    padding: 0;
                    webkit-transition: all 0.5s ease-out;
                    -moz-transition: all 0.5s ease-out;
                    -o-transition: all 0.5s ease-out;
                    transition: all 0.5s ease-out;
                }
            }
        }
    }
}
</style>
