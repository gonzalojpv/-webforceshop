<template>
    <header>
        <v-card flat tile dark>
            <v-container>
                <v-toolbar>
                    <v-toolbar-title>
                        <h2>WepForce<span>Shop</span></h2>
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
            </v-container>
        </v-card>
    </header>
</template>

<script>

export default {
    data () {
        return {}
    },
    mounted() {
        console.log('header');
    },
}
</script>
<style lang="scss" scoped>
@import '../../../sass/_variables';

header.v-sheet {
    background-color: transparent !important;

    div.v-toolbar__content {
        div.v-toolbar__title {
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
    }
}
</style>
