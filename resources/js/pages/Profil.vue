<template>
    <v-container>
<h1>{{adherent.nom}}</h1>
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

<style>

</style>
