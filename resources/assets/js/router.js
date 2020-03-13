import VueRouter from 'vue-router';

// site components
import SiteLayout from './components/site/Layout';
import Home from './components/site/Home';
import Weather from './components/site/Weather';

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
            {
                path: 'weather',
                name: 'site.weather',
                component: Weather,
            },
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
