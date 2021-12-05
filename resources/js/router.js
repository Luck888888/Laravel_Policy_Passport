import Vue from 'vue'
import VueRouter from "vue-router";

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/visitors',
            component: () => import('./components/Visitor/Index'),
            name: 'visitor.index'
        },

        {
            path: '/visitors/create',
            component: () => import('./components/Visitor/Create'),
            name: 'visitor.create'
        },

        {
            path: '/visitors/:id/edit',
            component: () => import('./components/Visitor/Edit'),
            name: 'visitor.edit'
        },

        {
            path: '/visitors/show',
            component: () => import('./components/Visitor/Show'),
            name: 'visitor.show'
        },
    ]
})
