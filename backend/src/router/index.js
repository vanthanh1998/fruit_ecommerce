import {createRouter, createWebHistory} from "vue-router";
import Home from "../views/Home.vue"
import Login from "../views/Login.vue"

const routes = [
    {
        path: '/home',
        name: 'home',
        component : Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
