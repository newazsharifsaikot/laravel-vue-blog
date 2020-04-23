require('./bootstrap');

window.Vue = require('vue');

//vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index'
const store = new Vuex.Store(
    storeData
)
//filter
import {filter} from './filter'

//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from "./routes";
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'history'
})

//v form
import { Form, HasError, AlertError } from 'vform'

window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//markdown editor
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor);


//sweetalert
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.toast = Toast

//Progressbar
import VueProgressBar from 'vue-progressbar'
const VueProgressBarOptions = {
    color: '#24fa35',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}

Vue.use(VueProgressBar, VueProgressBarOptions)

Vue.component('example', require('./components/ExampleComponent.vue').default);
Vue.component('home', require('./components/admin/HomeComponent').default);
Vue.component('admin-master', require('./components/admin/AdminMasterComponent.vue').default);

Vue.component('front-master', require('./components/frontend/frontRouter.vue').default);





const app = new Vue({
    el: '#app',
    router,
    store

});
