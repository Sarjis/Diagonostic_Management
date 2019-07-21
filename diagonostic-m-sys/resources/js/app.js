
require('./bootstrap');
import Vue from 'vue'
import store from './store/index'
import router from './router/index'
import {Form, HasError, AlertError} from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    store,
    router
});
