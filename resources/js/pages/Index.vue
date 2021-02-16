<template>
  <div class="team">
    <h1 class="subheading grey--text">Team</h1>

    <v-container class="my-5">
        <v-row>
        <v-col
          cols="12"
        >
          <v-text-field
          v-model="q"
            label="Recherche"
            placeholder="Placeholder"
            filled
          ></v-text-field>
        </v-col>
        </v-row>
        <v-row>
             <v-radio-group v-for="interet in interets" :key="interet.id"
                 row
                 v-model="cat"
             >
                 <v-radio
                    :label="interet.nom"
                    :value="interet.nom"
                ></v-radio>

            </v-radio-group>
        </v-row>

      <v-row  class="d-flex flex-wrap">
        <v-flex xs12 sm6 md4 lg3 v-for="adherent in getSearchedAdherents" :key="adherent.id">
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
              <div class="grey--text"> @{{ adherent.pseudo }}</div>
               <v-chip
               right
               small
                class="ma-4"
                color="primary"
                >
                Membre depuis {{ format(adherent.date_adhesion) }}
                </v-chip>
            </v-card-text>

          </v-card>
        </v-flex>
      </v-row>

    </v-container>

  </div>
</template>

<script>
import {formatDistance } from 'date-fns'
import { fr } from 'date-fns/locale'

export default {
  data() {
    return {
      adherents: [],
      interets:[],
      q:'',
      cat:null,
    }
  },
  methods:{
      fetchAdherents() {
                axios.get('/api/adherents')
                .then(response =>
                     this.adherents = response.data
                // console.log(response.data)
                )


                .catch(errors => console.log(errors))
            },
            fetchInterets() {
                axios.get('/api/interets')
                .then(response => this.interets = response.data)
                .catch(errors => console.log(errors))
            },
            format(date){
                return formatDistance(new Date(date), new Date() , { locale: fr });
            },

  },
  computed:{
    getSearchedAdherents() {
         return this.adherents.filter(
                   adherent => {
                       if (this.q){
                           console.log('recherche par mot clé');
                            this.cat = null;
                           return adherent.prenom.toLowerCase().includes(this.q.toLowerCase());
                       } else if(this.cat){
                        return adherent.interets.filter(interet =>{
                            return interet.nom ===this.cat;
                        }).length > 0;
                        } return true;
                       });
                   },
},
 mounted(){
    this.fetchAdherents();
    this.fetchInterets();

}
}
</script>
