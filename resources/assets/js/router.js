import VueRouter from 'vue-router';

import SiteLayout from './components/site/Main';
import Home from './components/site/Home';

const routes = [
    {
        path: '/',
        component: SiteLayout,
        children: [
            {
                path: '',
                name: 'site.home',
                component: Home,
            },
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
