import { createApp } from 'vue'
import { createStore } from 'vuex'
import App from './App.vue'
import  "bootstrap/dist/css/bootstrap.min.css"
import  "bootstrap/dist/js/bootstrap.min.js"
import  "bootstrap/dist/js/bootstrap.bundle.min"
import clients from "@/store/modules/clients";
import AddModal from "@/components/AddModal";

import router from "@/router";

const store = createStore({
    state () {
        return {
            count: 0
        }
    },
    modules: {
        clients,
        modal: AddModal
    }
})

const app = createApp(App)
app.use(router)
app.use(store)
app.mount('#app')