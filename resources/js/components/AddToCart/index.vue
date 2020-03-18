<template>
    <div class="add-to-cart">
        <p class="price">$100.00</p>
        <form>
            <div class="form-group row">
                <label for="" class="col-4 col-form-label">Quantity</label>
                <div class="col-8">
                    <input
                        type="number"
                        step="1"
                        min="1"
                        max="10"
                        value="1"
                        class="quantity"
                        name="quantity"/>
                </div>
            </div>
            <button
                type="submit"
                name="add-to-cart"
                value="12"
                class="single_add_to_cart_button">Add to cart</button>
        </form>
        <div class="product_meta">
            Category: <span>General</span>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    @import '../../../sass/_variables';
    @import '../../../sass/common/_fonts';

    div.add-to-cart {
        p.price {
            font-size: 2.5rem;
            font-weight: 600;
            color: map-get($theme-colors, dark);
        }

        form {
            label {
                font-weight: 700;
                color: map-get($theme-colors, dark);
                font-size: 1.125rem;
            }
            input.quantity {
                border-bottom: 1px solid map-get($theme-colors, dark);
                font-size: 1.125rem;
                text-align: center;
                font-weight: 400;
            }
            button.single_add_to_cart_button {
                margin-top: 1rem;
                border: 1px solid map-get($theme-colors, dark);
                border-radius: 0;
                background-color: map-get($theme-colors, white);
                font-weight: 700;
                text-align: center;
                font-size: 1.125rem;
                padding: .618em 1em;
                position: relative;
                -webkit-transition: all 0.25s ease-out;
                -moz-transition: all 0.25s ease-out;
                -o-transition: all 0.25s ease-out;
                transition: all 0.25s ease-out;
                top: 0;
                font-family: $font-header;

                &:hover {
                    border-color: map-get($theme-colors, primary);
                    background-color: map-get($theme-colors, primary);
                    color: map-get($theme-colors, white);
                    top: -1px;
                }
            }
        }

        .product_meta {
            margin-top: 1.5rem;
            font-size: 1.125rem;
            color: map-get($theme-colors, dark);

            span {
                color: map-get($theme-colors, primary);
            }
        }
    }
</style>
