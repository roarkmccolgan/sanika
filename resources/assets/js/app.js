
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
import faSearch from '@fortawesome/fontawesome-pro-regular/faSearch'
import faShoppingCart from '@fortawesome/fontawesome-pro-regular/faShoppingCart'
import faMousePointer from '@fortawesome/fontawesome-pro-regular/faMousePointer'

import {Tabs, Tab} from 'vue-tabs-component';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('cart-component', require('./components/CartComponent.vue'));
Vue.component('tabs', Tabs);
Vue.component('tab', Tab);

const home = new Vue({
    el: '#app',
    data: {
        icons:{
            search: faSearch,
            cart: faShoppingCart,
            mouse: faMousePointer,
        }
    },
    components: {
        FontAwesomeIcon,
    }
});
