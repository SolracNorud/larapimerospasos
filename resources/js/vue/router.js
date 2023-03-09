import { createRouter, createWebHistory} from "vue-router"

import List from "./components/List.vue";
import Save from "./components/Save.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { name: "List", path: "/vue", component: List },
        { name: "Save", path: "/vue/save/:slug?", component: Save },
    ]
})

export default router;



