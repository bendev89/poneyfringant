require("./bootstrap");

import Vue from "vue";
import Vuetify from "../plugins/vuetify";
import App from "./App.vue";
import VueRouter from "vue-router";
import storeDefinition from "./store/index";
import Login from "./pages/Login.vue";
import Register from "./pages/Register.vue";
import Index from "./pages/Index.vue";
import Profilform from "./pages/Profilform.vue";
import Profil from "./pages/Profil.vue";
import { isLoggedIn, logOut } from "./auth";

import Vuex from "vuex";

Vue.use(Vuex);
Vue.use(VueRouter);

const store = new Vuex.Store(storeDefinition);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "index",
            component: Index,
            meta: { requiresAuth: true }
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
            component: Profilform,
            meta: { requiresAuth: true }
        },
        {
            path: "/profil/:id",
            name: "profil",
            component: Profil,
            meta: { requiresAuth: true }
        }
    ]
});
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!isLoggedIn()) {
            next({
                path: "/login",
                query: { redirect: to.fullPath }
            });
        } else {
            next();
        }
    } else {
        next(); // make sure to always call next()!
    }
});
window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (401 === error.response.status) {
            store.dispatch("logout");
        }

        return Promise.reject(error);
    }
);

const app = new Vue({
    vuetify: Vuetify,
    el: "#app",
    components: { App },
    async beforeCreate() {
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");
    },
    router,
    store
});
