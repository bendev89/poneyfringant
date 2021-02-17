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
                      v-model="user.prenom"
                      name="prenom"
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
                      v-model="user.nom"
                      name="nom"
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
                      v-model="user.telephone"
                      :rules="[rules.required, rules.min]"
                      filled
                        name="telephone"
                        label="Téléphone"
                        prepend-inner-icon="mdi-lock-outline"
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6">
                      <v-text-field
                      dense
                      v-model="user.numero_adherent"
                     :rules="[rules.required]"
                      filled
                        name="numero_adherent"
                        prepend-inner-icon="mdi-lock-outline"
                        label="Numéro d'adherent"
                      ></v-text-field>
                    </v-col>
                    </v-row>
                    <v-row dense>
                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                        v-model="user.code_postal"
                        name="code_postal"
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
                      v-model="user.ville"
                      name="ville"
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
                  v-model="user.adresse"
                  name="adresse"
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
                  v-model="user.date_adhesion"
                  name="date_adhesion"
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
                        v-model="user.pseudo"
                        name="pseudo"
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
                        v-model="user.email"
                        name="email"
                        :rules="[rules.required, rules.email]"
                        filled
                        label="Email"
                        prepend-inner-icon="mdi-at"
                        color="indigo darken-4"

                      >
                      </v-text-field>
                    </v-col>
                </v-row>
                <v-row dense>
                    <v-col cols="12" md="6" >
                      <v-text-field
                      dense
                      v-model="user.password"
                      name="password"
                      :rules="[rules.required, rules.min]"
                      filled
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show1 ? 'text' : 'password'"
                        label="Mot de passe"
                        prepend-inner-icon="mdi-lock-outline"
                        @click:append="show1 = !show1"
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                      <v-text-field
                      dense
                      v-model="user.password_confirmation"
                     :rules="[rules.confirmPassword]"
                      filled
                        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show2 ? 'text' : 'password'"
                        name="password_confirmation"
                        prepend-inner-icon="mdi-lock-outline"
                        label="Confirmation du mot de passe"
                        @click:append="show2 = !show2"
                      ></v-text-field>
                    </v-col>
                </v-row>

                </v-form>
              </v-card-text>
              <div class="text-center mt-3">
                <v-btn rounded color="indigo darken-4" dark
                    type="submit"
                    :disabled="loading"
                    @click.prevent="register"
                >INSCRIPTION</v-btn>
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
import { logIn } from "../auth";

export default {
  data() {
    return {
        show1: false,
        show2: false,
        loading: false,
        user: {
                    prenom: "",
                    nom: "",
                    date_adhesion:"",
                    telephone:"",
                    numero_adherent:"",
                    code_postal:"",
                    ville: "",
                    adresse:"",
                    pseudo:"",
                    email:"",
                    password:"",
                    password_confirmation:""

                },

        rules: {
          required: value => !!value || 'Obligatoire.',
          email: value => {
            const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return pattern.test(value) || "L'email n'est pas valide."
          },
          confirmPassword: value => {
            return value === this.user.password || 'Passwords must match'
          }



        },
    }
  },
  methods: {
    async register() {
      this.loading = true;
      this.errors = null;
      try {
        const response = await axios.post("/register", this.user);
        if (201 == response.status) {
          logIn();
          this.$store.dispatch("loadUser");
          this.$router.push({ name: "index" });
        }
      } catch (error) {
        // this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;

    }
}
}

</script>
