import {createRouter, createWebHistory} from 'vue-router'
import HelloWorld from "@/components/HelloWorld.vue";
import ClientList from "@/views/ClientList";
import ProductList from "@/views/ProductList";
import OrderList from "@/views/OrderList";
import CategoryList from "@/views/CategoryList";
import UpdateModal from "@/components/UpdateModal";

const routes = [
    { path: '/clients', component: ClientList },
    { path: '/products', component: ProductList },
    { path: '/orders', component: OrderList },
    { path: '/categories', component: CategoryList },
    { path: '/', component: HelloWorld },
    {
        path: '/other-page/:clientId', name: 'UpdateModal',component: UpdateModal
    }
]


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
export default router