<template>
  <v-app id="inspire">


    <v-app-bar app color="indigo darken-4"
    flat>

      <v-toolbar-title class="white--text">Poney Fringant

      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn v-if="!isLoggedIn" text rounded class="white--text" :to="{name: 'login' }">Connexion</v-btn>
      <v-btn v-if="!isLoggedIn" text rounded class="white--text" :to="{name: 'register' }">Inscription</v-btn>
      <v-menu v-if="isLoggedIn"
        bottom
        min-width="200px"
        rounded
        offset-y
      >
        <template v-slot:activator="{ on }">
          <v-btn
            icon
            x-large
            v-on="on"
          >
            <v-avatar
              color="brown"
              size="48"
            >
              <img :src="`https://eu.ui-avatars.com/api/?name=${user.prenom}+${user.nom}`">
            </v-avatar>
          </v-btn>
        </template>
        <v-card>
          <v-list-item-content class="justify-center">
            <div class="mx-auto text-center">
              <v-avatar
                color="brown"
              >
                <img :src="`https://eu.ui-avatars.com/api/?name=${user.prenom}+${user.nom}`">
              </v-avatar>
              <h3>{{user.prenom}}</h3>
              <p class="caption mt-1">
                {{user.email}}
              </p>
              <v-divider class="my-3"></v-divider>
              <v-btn
                depressed
                rounded
                text
                @click.prevent="logout"
              >
                Déconnexion
              </v-btn>
            </div>
          </v-list-item-content>
        </v-card>
      </v-menu>
    </v-app-bar>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
import {mapState,mapMutations,mapAction } from 'vuex'
  export default {
    data: () => ({ }),
     methods: {
    async logout() {
      try {
        axios.post("/logout");
        this.$store.dispatch("logout");
        this.$router.push({name:'login'});
      } catch (error) {
        this.$store.dispatch("logout");
      }
    },

  },
    computed: {
      ...mapState({
          isLoggedIn:"isLoggedIn",
          user:"user"
      })


  },
  }
</script>
