<template>
    <section class="billing-detail">
        <v-form @submit="onSubmit" v-model="valid">
            <v-container>
                <v-row>
                    <v-col cols="12" md="6">
                        <v-row>
                            <v-col>
                                <h2>Billing <span>details</span></h2>
                                <hr>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" md="6">
                              <v-text-field
                                v-model="firstname"
                                :rules="nameRules"
                                :counter="10"
                                label="First name"
                                required></v-text-field>
                            </v-col>

                            <v-col cols="12" md="6">
                              <v-text-field
                                v-model="lastname"
                                :rules="nameRules"
                                :counter="10"
                                label="Last name"
                                required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col cols="12" md="6">
                              <v-text-field
                                v-model="address"
                                label="Street address"
                                required></v-text-field>
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="zipcode"
                                    label="Postcode / ZIP"
                                    required></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col cols="12" md="6">
                              <v-text-field
                                v-model="city"
                                label="Town / City"
                                required></v-text-field>
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="state"
                                    label="State"
                                    required></v-text-field>
                            </v-col>
                          </v-row>

                        <v-row>
                            <v-col cols="12" md="12">
                                <v-text-field
                                    v-model="country"
                                    label="Country"
                                    required></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="email"
                                    :rules="emailRules"
                                    label="E-mail"
                                    required></v-text-field>
                            </v-col>
                            <v-col cols="12" md="6">
                                    <v-text-field
                                        v-model="phone"
                                        label="Phone"
                                        required></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12">
                                <v-textarea
                                    name="notes"
                                    v-model="notes"
                                    label="Order notes (optional)"></v-textarea>
                            </v-col>
                        </v-row>

                    </v-col>
                    <v-col cols="12" md="6">
                        <CartTable/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <v-btn
                            type="submit"
                            block
                            dark>Place Order</v-btn>
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
        </v-form>
    </section>
</template>

<script>
    import {
        billingMethods,
        billingComputed
    } from '../../store/helper';
    import swal from 'sweetalert';
    import CartTable from '../../components/CartTable';

    export default {
        components: {
            CartTable,
        },
        data: () => ({
            valid: false,
            firstname: '',
            lastname: '',
            country: '',
            address: '',
            city: '',
            state: '',
            zipcode: '',
            phone: '',
            notes: '',
            nameRules: [
                v => !!v || 'Name is required',
                v => v.length <= 10 || 'Name must be less than 10 characters',
            ],
            email: '',
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+/.test(v) || 'E-mail must be valid',
            ],
        }),
        methods: {
            ...billingMethods,
            onSubmit(evt) {
                evt.preventDefault();

                if ( this.valid ) {
                    this.addBillingData({
                        firstname: this.firstname,
                        lastname: this.lastname,
                        country: this.country,
                        address: this.address,
                        city: this.city,
                        state: this.state,
                        zipcode: this.zipcode,
                        phone: this.phone,
                        notes: this.notes,
                    });
                }
                else {
                    swal("Oops!", "Please, complete de Billing Form", "warning");
                }
            }
        },
        computed: {
            ...billingComputed,
        },
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';
    @import '../../../sass/common/_fonts';

    section.billing-detail {
        padding-top: 9rem;

        h2 {
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
