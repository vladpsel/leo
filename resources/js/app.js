import './bootstrap';
import 'vue-sonner/style.css';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy-js';
import Root from "./Root.vue";

createInertiaApp({
    resolve: name => import(`./Pages/${name}.vue`),
    setup({el, App, props, plugin}) {
        const app = createApp(Root, {App, props})
        app.use(plugin)
        app.use(ZiggyVue)
        app.mount(el)
    },
}).then();
