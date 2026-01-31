import './bootstrap';
import 'vue-sonner/style.css';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy-js';
import Root from "./Root.vue";

const pages = import.meta.glob('./Pages/**/*.vue')

createInertiaApp({
    resolve: name => {
        const page = pages[`./Pages/${name}.vue`]
        if (!page) {
            throw new Error(`Страница не найдена: ${name}`)
        }
        return page()
    },
    setup({el, App, props, plugin}) {
        const app = createApp(Root, {App, props})
        app.use(plugin)
        app.use(ZiggyVue)
        app.mount(el)
    },
}).then();
