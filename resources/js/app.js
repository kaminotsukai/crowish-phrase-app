require('./bootstrap');
import Vue from 'vue'

//////////////////////////
// Router
import router from './router'

//////////////////////////
// ElementUI
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/ja'
Vue.use(ElementUI, { locale })

Vue.component('App', require('./App.vue').default);


const app = new Vue({
    router,
    el: '#app',
});
