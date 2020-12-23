import Vue from "vue";

import VueRouter from 'vue-router'
Vue.use(VueRouter)

// 1. Define route components.
// These can be imported from other files
import Index from "./pages/index";
import Login from "./pages/login";
import Register from "./pages/register";

const routes = [
    { path: '/', component: Index },
    { path: '/signin', component: Login },
    { path: '/signup', component: Register },
]

const router = new VueRouter({
    routes,
    /*hashbang:false,
    mode:"history"*/
})

export default router;
