window.Vue = require('vue');
import App from './admin';
const app = new Vue({
    el:"#root",
    render: h => h(App)
});