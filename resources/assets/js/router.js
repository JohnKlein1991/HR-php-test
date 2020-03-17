import VueRouter from 'vue-router';

// site components
import SiteLayout from './components/site/Layout';
import Home from './components/site/Home';
import Weather from './components/site/Weather';
// orders components
import OrdersList from './components/site/order/List';
import OrdersEdit from './components/site/order/Edit';
import OrdersLayout from './components/site/order/Layout';

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
            {
                path: 'order',
                component: OrdersLayout,
                children: [
                    {
                        path: 'list',
                        name: 'site.order.list',
                        component: OrdersList,
                    },
                    {
                        path: 'edit/:id',
                        name: 'site.order.edit',
                        component: OrdersEdit
                    },
                ]
            },
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
