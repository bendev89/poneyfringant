require("./bootstrap");

import Vue from "vue";
import Vuetify from "../plugins/vuetify";
import App from "./App.vue";
import VueRouter from "vue-router";
import Login from "./pages/Login.vue";
import Register from "./pages/Register.vue";
import Index from "./pages/Index.vue";
import Profilform from "./pages/Profilform.vue";
import Profil from "./pages/Profil.vue";
Vue.use(VueRouter);
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "index",
            component: Index
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/profilform",
            name: "profilform",
            component: Profilform
        },
        {
            path: "/profil/:id",
            name: "profil",
            component: Profil
        }
    ]
});

const app = new Vue({
    vuetify: Vuetify,
    el: "#app",
    components: { App },
    router
});
