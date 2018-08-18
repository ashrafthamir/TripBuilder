import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './views/Home'
import Airports from './views/Airports'
import Airport from './views/Airport'
import Airlines from './views/Airlines'
import Trips from './views/Trips'
import Trip from './views/Trip'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/tripbuilder/public/',
            name: 'home',
            component: Home
        },
        {
            path: '/tripbuilder/public/airports',
            name: 'airports',
            component: Airports
        },
        {
            path: '/tripbuilder/public/airport/:id',
            name: 'airport',
            component: Airport
        },
        {
            path: '/tripbuilder/public/airlines',
            name: 'airlines',
            component: Airlines
        },
        {
            path: '/tripbuilder/public/trips',
            name: 'trips',
            component: Trips,
        },
        {
            path: '/tripbuilder/public/trip/:id',
            name: 'trip',
            component: Trip,
        }
    ]
});

export default router
