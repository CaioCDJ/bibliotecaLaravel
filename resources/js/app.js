import './bootstrap';
import '../css/app.css';
import 'primeicons/primeicons.css'

import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueApexCharts from 'vue3-apexcharts';
// import VueApexCharts from 'vue3-apexcharts';


import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({

    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: '#29d',

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
    // ...
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueApexCharts)
            .mount(el)
    },
})
