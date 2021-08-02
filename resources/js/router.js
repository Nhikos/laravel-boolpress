import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home';
import Blog from './pages/Blog';
import About from './pages/About';
import SinglePost from './pages/SinglePost';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePost
        },
    ]
})

export default router;