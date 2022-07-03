require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import { Head } from "@inertiajs/inertia-vue3";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import VueApexCharts from "vue3-apexcharts";
import { Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import PrimeVue from "primevue/config";
import { Skeletor } from "vue-skeletor";
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

InertiaProgress.init({});

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`).default,
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.config.globalProperties.$route = route;
        app.use(plugin).mixin({ methods: { route } }).mixin({
            components: {
                VueApexCharts,
                Link,
                Head,
                Skeletor,
            },
        });
        app.use(ToastPlugin);
        app.use(PrimeVue);
        app.mount(el);
    },
});

// const app = createApp({});
// app.use(PrimeVue);

// //Created Custom Components
// app.component("add-cart-button", AddToCartButton);
// app.component("basket", vueBasket);
// app.component("test", test);

// // Prime Vue components
// app.component("Dialog", Dialog);
// app.component("prime-button", Button);
// app.mount("#app");

// const nav = createApp({
//     data() {
//         return {
//             shared: shared,
//         }
//     },
// });
// nav.component("basket", vueBasket);
// nav.mount("#nav");
