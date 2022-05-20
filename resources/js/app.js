import Vue from 'vue'
import router from './router.js'
import App from './App.vue'
import vuetify from './plugins/vuetify.js'
import './bootstrap.js'
import store from './store.js'

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    store,
    components: {
        App
    },
});