
import Vue from 'vue'
import VueRouter from 'vue-router'

import PhraseList from '../page/phrase/list'
import PhraseSave from '../page/phrase/save'
import PhraseDetail from '../page/phrase/detail'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: PhraseList,
        name: 'phrase-list'
    },
    {
        path: '/phrase/register',
        component: PhraseSave,
        name: 'phrase-register'
    },
    {
        path: '/phrase/:id/detail',
        component: PhraseDetail,
        name: 'phrase-detail'
    },
    {
        path: '/phrase/:id/update',
        component: PhraseSave,
        name: 'phrase-update'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})


export default router