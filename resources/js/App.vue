<template>
  <v-app id="inspire">


    <v-app-bar app color="indigo darken-4"
    flat>

      <v-toolbar-title class="white--text">Poney Fringant

      </v-toolbar-title>
    </v-app-bar>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
  export default {
    data: () => ({ }),
  }
</script>
