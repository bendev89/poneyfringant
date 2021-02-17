<template>
    <v-container pa-5>
        <v-card elevation="4" class=" text-center mx-auto mt-4 pa-4">
             <h1>{{adherent.prenom}} {{adherent.nom}}</h1>
             <v-row>
            <v-col sm="12" md="4">
                <v-avatar
                size="120"
                color="brown"
              >
                <img :src="`https://eu.ui-avatars.com/api/?name=${adherent.prenom}+${adherent.nom}`">
              </v-avatar>

            </v-col>
            <v-col sm="12" md="8" class="text-left">
                <v-list-item>Pseudo : {{adherent.pseudo}} </v-list-item>
                <v-list-item>Email : {{adherent.email}} </v-list-item>
                <v-list-item>Numéro d'adhérent : {{adherent.numero_adherent}} </v-list-item>
                <v-list-item>Adresse : {{adherent.adresse}}, {{adherent.code_postal}} {{adherent.ville}} </v-list-item>


            </v-col>
            </v-row>

        </v-card>
        <v-card elevation="4" class=" text-center mx-auto mt-4 pa-4">
             <h1>Les centres d'interets</h1>
             <v-row>

            </v-row>

        </v-card>

    </v-container>

</template>

<script>
export default {
    data() {
    return {
      adherent: [

      ],
    };
    },

    mounted(){
        axios.get(`/api/adherents/${this.$route.params.id}`)
            .then(response =>(this.adherent = response.data));

    }

}
</script>

<style scoped>
.v-main__wrap{
    background-color: lightgray;
}

</style>
