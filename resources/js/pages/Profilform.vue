<template>
  <div class="team">
    <h1 class="subheading grey--text">Team</h1>

    <v-container class="my-5">
        <v-form>
            <v-text-field
                v-model="Titre"
               filled
                label="Titre"

                color="indigo darken-4"
                :rules="[rules.required]">
                </v-text-field>
            <v-textarea
                v-model="Description"
                 filled
                name="input-7-4"
                label="Description"
        ></v-textarea>
        <v-file-input
            v-model="avatar"
            filled
            show-size
            :rules="[rules.formatimg]"
            accept="image/png, image/jpeg, image/gif"

            prepend-inner-icon="mdi-camera"
            label="Avatar"
  ></v-file-input>
  <v-select
            v-model="userinterets"
            :items="interets"
            item-color="indigo darken-4"
            filled
            chips
            deletable-chips
            label="Centre d'interets"
            multiple
          ></v-select>
  <v-row>

  </v-row>
  <v-btn
      depressed
      color="indigo darken-4"
      class="white--text"
    >
     Envoyer
    </v-btn>
        </v-form>

    </v-container>

  </div>
</template>

<script>
export default {
  data() {
    return {
        Titre:"",
        Description:"",
        avatar:null,
        userinterets:[],
        interets:["Sport","Musique","Jeux vidéos", "Lecture","Informatique","Sorties",
"Cuisine",
"Aviation",
"Mécanique",
"Licornes",
"Joaillerie",
"Agriculture",
"Cinéma",
"Politique",
"Couture",
"Animaux",
"Science",
"Histoire",
"SVT",
"Physique-Chimie",
"Taxidermie",
"Philatélie"],

      rules: {
          formatimg: value => !value || value.size < 1000000 || 'Taille maximum autorisée 1Mo',
          required: value => !!value || 'Obligatoire.',
      }
    }
  }
}
</script>
