import axios from "axios";
import { isLoggedIn, logOut } from "../auth";
export default {
    state: {
        isLoggedIn: false,
        user: {}
    },

    getters: {
        loggedIn(state) {
            return state.isloggedIn;
        }
    },
    // //     user(state) {
    // //         return state.user;
    // //     }
    // // },
    mutations: {
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        },
        setUser(state, payload) {
            state.user = payload;
        }
    },
    actions: {
        loadStoredState(context) {
            context.commit("setLoggedIn", isLoggedIn());
        },
        async loadUser({ commit, dispatch }) {
            if (isLoggedIn()) {
                try {
                    const user = (await axios.get("/api/user")).data;
                    commit("setUser", user);
                    commit("setLoggedIn", true);
                } catch (error) {
                    dispatch(logout);
                }
            }
        },
        logout({ commit }) {
            commit("setUser", {});
            commit("setLoggedIn", false);
            logOut();
        }
    }
};
