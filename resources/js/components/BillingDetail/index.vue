<template>
    <section class="billing-detail">
        <v-form v-model="valid">
            <v-container>
                <v-row>
                    <v-col>
                        <h2>Billing <span>details</span></h2>
                        <hr>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="12" md="6">
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
                                        :counter="10"
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

                    </v-col>
                    <v-col cols="12" md="6">
                        <v-row>
                            <v-col cols="12">
                                <v-textarea
                                    name="notes"
                                    v-model="notes"
                                    label="Order notes (optional)"></v-textarea>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-container>
        </v-form>
    </section>
</template>

<script>
    export default {
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
    }
</style>
