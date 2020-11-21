require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
// import { InertiaProgress } from '@inertiajs/progress'

// InertiaProgress.init()
Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
        isRoute(...routes) {
            return routes.some(route => this.route().current(route));
        }
    },
});
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

Vue.component('Pagination', () =>
    import ('@/Jetstream/Pagination'));
Vue.component('Icon', () =>
    import ('@/Jetstream/Icon'));

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
    mounted() {
        window.addEventListener('popstate', () => {
            this.$page.popstate = true
        })
    }
}).$mount(app);