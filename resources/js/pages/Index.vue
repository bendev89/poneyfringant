<template>
  <div class="team">
    <h1 class="subheading grey--text">Team</h1>

    <v-container class="my-5">
        <v-row>
        <v-col
          cols="12"
        >
          <v-text-field
            label="Recherche"
            placeholder="Placeholder"
            filled
          ></v-text-field>
        </v-col>
        </v-row>

      <v-row  class="d-flex flex-wrap">
        <v-flex xs12 sm6 md4 lg3 v-for="adherent in adherents" :key="adherent.id">
          <v-card class="text-center ma-3 " :to="{name:'profil', params:{id: adherent.id}}">
              <v-responsive class="pt-4" >
                  <v-avatar>
                    <img
                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                        alt="John"
                    >
                 </v-avatar>

              </v-responsive>
              <v-card-text>
              <div class="subheading">{{ adherent.prenom }} {{ adherent.nom }}</div>
              <div class="grey--text">{{ adherent.pseudo }}</div>
            </v-card-text>

          </v-card>
        </v-flex>
      </v-row>

    </v-container>

  </div>
</template>

<script>
export default {
  data() {
    return {
      adherents: [

      ],
    }
  },
  methods:{
      fetchAdherents() {
                axios.get('/api/adherents')
                .then(response =>
                     this.adherents = response.data)


                .catch(errors => console.log(errors))
            },

  },
  mounted(){
    this.fetchAdherents();

}
}
</script>
