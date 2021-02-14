<template>
    <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="8">
            <v-card class="elevation-12">
                  <v-row>
                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1
                          class="text-center display-2 indigo--text text--darken-4"
                        >Sign in to Diprella</h1>
                        <h4 class="text-center mt-4">Ensure your email for registration</h4>
                        <v-form>

                          <v-text-field
                                filled
                                label="Email"
                                prepend-icon="mdi-at"
                                color="indigo darken-4"
                                :rules="[rules.required]">
                           </v-text-field>
                           <v-text-field
                                 v-model="password"
                                filled
                                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                :rules="[rules.required, rules.min]"
                                :type="show1 ? 'text' : 'password'"
                                name="input-10-1"
                                label="Mot de passe"
                                prepend-icon="mdi-lock-outline"
                                hint="8 caracères minimum"
                                counter
                                @click:append="show1 = !show1"
                            ></v-text-field>
                        </v-form>
                        <h3 class="text-center mt-4">Mot de passe oublié ?</h3>
                      </v-card-text>
                      <div class="text-center mt-3">
                        <v-btn rounded color="indigo darken-4" dark >CONNEXION</v-btn>
                      </div>
                    </v-col>
                    <v-col cols="12" md="4" class="indigo darken-4">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">Hello, Friend!</h1>
                        <h5
                          class="text-center"
                        >Enter your personal details and start journay with us</h5>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined dark to="/register">INSCRIPTION</v-btn>
                      </div>
                    </v-col>
                  </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
</template>
<script>
  export default {
    data () {
      return {
        show1: false,
        password: '',
        rules: {
          required: value => !!value || 'Obligatoire.',
          min: v => v.length >= 8 || 'Min 8 characters',
          emailMatch: () => (`The email and password you entered don't match`),
        },
      }
    },
  }
</script>
