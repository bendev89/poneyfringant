<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="8">
        <v-card class="elevation-12">
          <v-row>
            <v-col cols="12" md="3" class="indigo darken-4">
              <v-card-text class="white--text mt-12">
                <h1 class="text-center display-1">Hello, Friend!</h1>
                <h5 class="text-center">
                  Enter your personal details and start journay with us
                </h5>
              </v-card-text>
              <div class="text-center">
                <v-btn rounded outlined dark to="/login">CONNEXION</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="9">
              <v-card-text class="mt-4">
                <v-form>
                  <v-row dense>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                      v-model="user.Prenom"
                      :rules="[rules.required]"
                        cols="12"
                        md="6"
                        filled
                        label="Prénom"
                        prepend-inner-icon="mdi-clipboard-account"
                        color="indigo darken-4"

                      >
                      </v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                      v-model="user.Nom"
                      :rules="[rules.required]"
                        cols="12"
                        md="6"
                        filled
                        label="Nom"
                        prepend-inner-icon="mdi-clipboard-account"
                        color="indigo darken-4"

                      >
                      </v-text-field>
                    </v-col>
                  </v-row>
                  <v-row dense>
                  <v-col cols="12" sm="6">
                      <v-text-field
                      dense
                      v-model="user.Telephone"
                      :rules="[rules.required, rules.min]"
                      filled
                        name="input-10-2"
                        label="Téléphone"
                        prepend-inner-icon="mdi-lock-outline"
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6">
                      <v-text-field
                      dense
                      v-model="user.NumAdherent"
                     :rules="[rules.required]"
                      filled
                        name="input-10-2"
                        prepend-inner-icon="mdi-lock-outline"
                        label="Numéro d'adherent"
                      ></v-text-field>
                    </v-col>
                    </v-row>
                    <v-row dense>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                        v-model="user.CodePostal"
                        :rules="[rules.required]"
                        filled
                        label="Code postal"
                        prepend-inner-icon="mdi-map-marker-outline"
                        color="indigo darken-4"

                      >
                      </v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                      v-model="user.Ville"
                      :rules="[rules.required]"

                        filled
                        label="Ville"
                        prepend-inner-icon="mdi-map-marker-outline"
                        color="indigo darken-4"

                      >
                      </v-text-field>
                    </v-col>
                    </v-row>
                    <v-row dense>
                    <v-col cols="12" md="6">
                  <v-text-field
                  dense
                  v-model="user.Adresse"
                  :rules="[rules.required]"
                    cols="12"
                    md="6"
                    filled
                    label="Adresse"
                    prepend-inner-icon="mdi-map-marker-outline"
                    color="indigo darken-4"

                  ></v-text-field>
                    </v-col>
                    <v-col>
                  <v-text-field
                  dense
                  v-model="user.dateAdhesion"
                  :rules="[rules.required]"
                    cols="12"
                    md="6"
                    filled
                    label="Date d'adhesion"
                    prepend-inner-icon="mdi-calendar-range"
                    color="indigo darken-4"

                  ></v-text-field>
                    </v-col>
                    </v-row>
                <v-row dense>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                        v-model="user.Pseudo"
                        :rules="[rules.required]"
                        filled
                        label="Pseudo"
                        prepend-inner-icon="mdi-clipboard-account"
                        color="indigo darken-4"

                      >
                      </v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                        v-model="user.Email"
                        :rules="[rules.required, rules.email]"
                        filled
                        label="Email"
                        prepend-inner-icon="mdi-at"
                        color="indigo darken-4"

                         @input="$v.user.Email.$touch()"
                        @blur="$v.user.Email.$touch()"

                      >
                      </v-text-field>
                    </v-col>
                </v-row>
                <v-row dense>
                    <v-col cols="12" md="6" >
                      <v-text-field
                      dense
                      v-model="user.Mdp"
                      :rules="[rules.required, rules.min]"
                      filled
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show1 ? 'text' : 'password'"
                        name="input-10-2"
                        label="Mot de passe"
                        prepend-inner-icon="mdi-lock-outline"
                        @click:append="show1 = !show1"
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                      v-model="user.MdpConfirm"
                     :rules="[rules.confirmPassword]"
                      filled
                        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show2 ? 'text' : 'password'"
                        name="input-10-2"
                        prepend-inner-icon="mdi-lock-outline"
                        label="Confirmation du mot de passe"
                        @click:append="show2 = !show2"
                      ></v-text-field>
                    </v-col>
                </v-row>

                </v-form>
              </v-card-text>
              <div class="text-center mt-3">
                <v-btn rounded color="indigo darken-4" dark>INSCRIPTION</v-btn>
              </div>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
// import { sameAs } from "vuelidate/lib/validators";
export default {
  data() {
    return {
        show1: false,
        show2: false,
        user: {
                    Prenom: "",
                    Nom: "",
                    Telephone:"",
                    NumAdherent:"",
                    CodePostal:"",
                    Ville: "",
                    Adresse:"",
                    Pseudo:"",
                    Email:"",
                    Mdp:"",
                    MdpConfirm:""

                },

        rules: {
          required: value => !!value || 'Obligatoire.',
          email: value => {
            const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return pattern.test(value) || "L'email n'est pas valide."
          },
          confirmPassword: value => {
            return (value === this.user.Mdp) || 'Passwords must match'
          }



        },
    }
  },


}

</script>
