import VueRouter from "vue-router";
import HomeComponent from "./components/HomeComponent";
import ListComponent from "./components/ListComponent";
import RedirectComponent from "./components/RedirectComponent";

const routes = [
    {
        path: "/",
        component: HomeComponent,
        name: "home",
    },
    {
        path: "/list",
        component: ListComponent,
        name: "list",
    },
    {
        path: "/:id",
        component: RedirectComponent,
        name: "redirectUrl",
    }
];

const router = new VueRouter({
    routes, //short for `routes: routes`
    mode: "history",
});

export default router;
