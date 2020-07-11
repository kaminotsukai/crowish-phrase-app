
import Vue from 'vue'
import VueRouter from 'vue-router'

import PhraseList from '../page/phrase/list'
import PhraseRegister from '../page/phrase/register'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: PhraseList,
        name: 'phrase-list'
    },
    {
        path: '/phrase/register',
        component: PhraseRegister,
        name: 'phrase-register'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})


export default router