
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');

 import InstantSearch from 'vue-instantsearch'
 import { createFromAlgoliaCredentials } from 'vue-instantsearch';
 import VueSweetalert2 from 'vue-sweetalert2';
 import VueTyperPlugin from 'vue-typer';
 Vue.use(VueTyperPlugin);

 import Slick from 'vue-slick';

 import VModal from 'vue-js-modal'
 Vue.use(VModal, { dynamic: true })

 import { library } from '@fortawesome/fontawesome-svg-core'
 import { faSearch } from '@fortawesome/pro-regular-svg-icons/faSearch'
 import { faTimes } from '@fortawesome/pro-regular-svg-icons/faTimes'
 import { faSync } from '@fortawesome/pro-regular-svg-icons/faSync'
 import { faShoppingCart } from '@fortawesome/pro-regular-svg-icons/faShoppingCart'
 import { faMousePointer } from '@fortawesome/pro-regular-svg-icons/faMousePointer'
 import { faSquare } from '@fortawesome/pro-regular-svg-icons/faSquare'
 import { faCheckSquare } from '@fortawesome/pro-regular-svg-icons/faCheckSquare'
 import { faAngleRight } from '@fortawesome/pro-regular-svg-icons/faAngleRight'
 import { faCheck } from '@fortawesome/pro-regular-svg-icons/faCheck'
 import { faBars } from '@fortawesome/pro-regular-svg-icons/faBars'

 import { faFacebookSquare } from '@fortawesome/free-brands-svg-icons/faFacebookSquare'
 import { faLinkedin } from '@fortawesome/free-brands-svg-icons/faLinkedin'
 import { faYoutubeSquare } from '@fortawesome/free-brands-svg-icons/faYoutubeSquare'

 import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

 import {Tabs, Tab} from 'vue-tabs-component';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.use(InstantSearch);
 Vue.use(VueSweetalert2);

 const searchStore = createFromAlgoliaCredentials('9PJ4YRKD8R', '70da05b28f4fcec86d4d4197851214af');
 searchStore.indexName = 'sanika_products';

 Vue.component('example-component', require('./components/ExampleComponent.vue'));
 var CartComponent = require('./components/CartComponent.vue');
 var ContactComponent = require('./components/ContactComponent.vue');
 var LeadComponent = require('./components/LeadComponent.vue');
 Vue.component('tabs', Tabs);
 Vue.component('tab', Tab);

 const home = new Vue({
 	el: '#app',
 	data: {
 		slickOptions: {
            gallery:{
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                infinite: true,
                arrows: true,
                fade: true,
            },
	 		clients:{
	 			slidesToShow: 6,
	 			slidesToScroll: 1,
	 			infinite: true,
	 			dots: false,
	 			arrows: true,
	 			autoplay: true,
	 			responsive: [
		 			{
		 				breakpoint: 1024,
		 				settings: {
		 					slidesToShow: 6,
		 					slidesToScroll: 1,
		 					infinite: true,
		 				}
		 			},
		 			{
		 				breakpoint: 768,
		 				settings: {
		 					slidesToShow: 3,
		 					slidesToScroll: 1,
		 					infinite: true,
		 				}
		 			},
	 			]
	 		},
	 		casestudypreview:{
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.casestudynav'
	 		},
	 		casestudynav:{
	 			slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                asNavFor: '.casestudypreview',
                dots: false,
                centerMode: true,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 576,
                        settings: {
                            arrows: false,
                        }
                    }
                ]
	 		},
 		},
 		showMenu: false,
 		searchStore,
 		icons:{
 			search: faSearch,
 			times: faTimes,
 			cart: faShoppingCart,
 			mouse: faMousePointer,
 			loading: faSync,
 			faSquare: faSquare,
 			faCheckSquare: faCheckSquare,
 			faAngleRight: faAngleRight,
 			faCheck: faCheck,
 			faBars: faBars,
 			faFacebookSquare: faFacebookSquare,
 			faLinkedin: faLinkedin,
 			faYoutubeSquare: faYoutubeSquare,
 		},
 		typer:{
 			text: ["Leaking Roof","Rising Damp","Concrete Cracking","Leaking Reservoir","Leaking Tie-holes"],
 			suffle: true,
 			show: true,
 		},
 		showAskQuestion: false,
 		product: {
 			sku: window.product ? window.product.sku : false,
 			id: window.product ? window.product.id : false,
 			name: window.product ? window.product.name : false,
 			price: window.product ? window.product.price : false,
 			display_price: false,
 			price_install: window.product ? window.product.price_install : false,
 			display_price_install: false,
 			path: window.product ? window.product.path : false,
 			strapline: window.product ? window.product.strapline : false,
 			qty: 1,
 			install: false,
 		},
 		cart: window.cart ? window.cart : {items:{},total:0,display_total: 'R0,00'},
 		busyAdding: false,
 		busySaving: false,
 		wizard: {
 			same: false,
 			basic: {
 				'fname': window.checkout && window.checkout.basic && window.checkout.basic.fname ? window.checkout.basic.fname: '',
 				'lname': window.checkout && window.checkout.basic && window.checkout.basic.lname ? window.checkout.basic.lname: '',
 				'email': window.checkout && window.checkout.basic && window.checkout.basic.email ? window.checkout.basic.email: '',
 				'telephone': window.checkout && window.checkout.basic && window.checkout.basic.telephone ? window.checkout.basic.telephone: '',
 				'mobile': window.checkout && window.checkout.basic && window.checkout.basic.mobile ? window.checkout.basic.mobile: '',
 				'company': window.checkout && window.checkout.basic && window.checkout.basic.company ? window.checkout.basic.company: '',
 				'vat': window.checkout && window.checkout.basic && window.checkout.basic.vat ? window.checkout.basic.vat: '',
 				'password': '',
 				'repeatpass': '',
 			},
 			billing: {
 				'building': window.checkout && window.checkout.billing && window.checkout.billing.building ? window.checkout.billing.building: '',
 				'address1': window.checkout && window.checkout.billing && window.checkout.billing.address1 ? window.checkout.billing.address1: '',
 				'address2': window.checkout && window.checkout.billing && window.checkout.billing.address2 ? window.checkout.billing.address2: '',
 				'address3': window.checkout && window.checkout.billing && window.checkout.billing.address3 ? window.checkout.billing.address3: '',
 				'city': window.checkout && window.checkout.billing && window.checkout.billing.city ? window.checkout.billing.city: '',
 				'province': window.checkout && window.checkout.billing && window.checkout.billing.province ? window.checkout.billing.province: '',
 				'postal': window.checkout && window.checkout.billing && window.checkout.billing.postal ? window.checkout.billing.postal: '',
 			},
 			delivery: {
 				'building': window.checkout && window.checkout.delivery && window.checkout.delivery.building ? window.checkout.delivery.building: '',
 				'address1': window.checkout && window.checkout.delivery && window.checkout.delivery.address1 ? window.checkout.delivery.address1: '',
 				'address2': window.checkout && window.checkout.delivery && window.checkout.delivery.address2 ? window.checkout.delivery.address2: '',
 				'address3': window.checkout && window.checkout.delivery && window.checkout.delivery.address3 ? window.checkout.delivery.address3: '',
 				'city': window.checkout && window.checkout.delivery && window.checkout.delivery.city ? window.checkout.delivery.city: '',
 				'province': window.checkout && window.checkout.delivery && window.checkout.delivery.province ? window.checkout.delivery.province: '',
 				'postal': window.checkout && window.checkout.delivery && window.checkout.delivery.postal ? window.checkout.delivery.postal: '',
 			},
 			currentStep:1,
 			steps: {
 				1: {
 					required: {
 						'fname': {
 							min: 1
 						},
 						'lname': {
 							min: 1
 						},
 						'email': {
 							type: 'email'
 						},
 						'telephone': {
 							type: 'tel'
 						},
 						'password': {
 							type: 'tel',
 							min: 6
 						},
 						'repeatpass': {
 							equals: 'password'
 						},
 					},
 					complete: false,
 					errors: {
 						'fname':false,
 						'lname':false,
 						'email':false,
 						'telephone':false,
 						'password':false,
 						'repeatpass':false,
 					},
 				},
 				2: {
 					required: {
 						'billing_address1': {
 							min: 9
 						},
 						'billing_address2': {
 							min: 3
 						},
 						'billing_city': {
 							min: 5
 						},
 						'billing_province': {
 							min: 5
 						},
 						'billing_postal': {
 							min: 3
 						}
 					},
 					complete: false,
 					errors: {
 						'billing_address1': false,
 						'billing_address2': false,
 						'billing_city': false,
 						'billing_province': false,
 						'billing_postal': false,
 					},
 				},
 				3: {
 					required: {
 						'delivery_address1': {
 							min: 9
 						},
 						'delivery_address2': {
 							min: 3
 						},
 						'delivery_city': {
 							min: 5
 						},
 						'delivery_province': {
 							min: 5
 						},
 						'delivery_postal': {
 							min: 3
 						}
 					},
 					complete: false,
 					errors: {
 						'delivery_address1': false,
 						'delivery_address2': false,
 						'delivery_city': false,
 						'delivery_province': false,
 						'delivery_postal': false,
 					},
 				},
 			},
 			buttonText: 'Next',
 			complete: false,
 		},
 		currentTypedString: 'Leaking Roof',
 	},
 	computed: {
 		mobileMenu: function(){
 			return document.documentElement.clientWidth <= 576;
 		}
 	},
 	components: {
 		FontAwesomeIcon,
 		CartComponent,
 		ContactComponent,
 		LeadComponent,
 		Slick
 	},
 	methods: {
 		clearCart: function(){
 			this.cart = {items:{},total:0,display_total: 'R0,00'};
 		},
 		addToCart: function(){
 			var that = this;
 			that.busyAdding = true;
 			axios.post('/api/cart', that.product)
 			.then(function (response) {
 				setTimeout(function(){
 					that.cart = response.data.cart;
 					that.busyAdding = false;
 				},2000);
 			})
 			.catch(function (error) {
 				console.log(error);
 			});
 		},
 		showGalleryImage: function(url, title){
 			this.$modal.show(
 			{
 				template: `
 				<div>
 				<img :src="img" class="block w-full" />
 				<span class="block text-center">{{ name }}</span>
 				</div>
 				`,
 				props: ['img','name']
 			},
 			{
 				img: url,
 				name: title,
 			},
 			{
 				'min-width':200,
 				'min-height':200,
 				adaptive:true,
 				reset:true,
 				width:"60%",
 				height:"auto"
 			}
 			);
 		},
 		typeComplete: function(typedString){
 			this.currentTypedString = typedString;
 		},
 		focusSearchBox: function(){
 			var that = this;
 			this.typer.show =! this.typer.show;
 			this.$nextTick()
 			.then(function () {
 				document.querySelector('input[name="q"]').focus();
 				document.querySelector('input[name="q"]').value = that.currentTypedString;
 			});
 		},
 		submitSearch: function(){
 			var that = this;
 			if(!this.typer.show){
 				document.getElementById('typerSearchForm').submit();
 			}else{
 				this.typer.show = false;
 				this.$nextTick()
 				.then(function () {
 					console.log(that.currentTypedString);
 					document.querySelector('input[name="q"]').value = that.currentTypedString;
 					document.getElementById('typerSearchForm').submit();
 				});
 			}
 		},
 		validate: function(step,id){
 			var el = document.getElementById(id);
 			var curStep = this.wizard.steps[step];
 			var validation = curStep.required[id];

 			var needsValidation = curStep.required[id]
 			if(needsValidation && el){
 				this.wizard.steps[step].errors[id] = false;

 				if(el.value.trim() == ''){
 					this.wizard.steps[step].errors[id] = true;
 				}
 				var min = validation.min ? validation.min : 1;
 				var max = validation.max ? validation.max : false;
 				if(el.value.trim().length < min){
 					this.wizard.steps[step].errors[id] = true;
 				}
 				if(max!==false && el.value.trim().length > max){
 					this.wizard.steps[step].errors[id] = true;
 				}
 				var equals = validation.equals ? validation.equals : false;
 				if(equals && el.value.trim() !== document.getElementById(equals).value.trim()){
 					this.wizard.steps[step].errors[id] = true;
 				}
 			}
 		},
 		checkStep: function(step){
 			for (var required in this.wizard.steps[step].required) {
 				this.validate(step, required);
 			}
 			var noErrors = true;
 			for (var error in this.wizard.steps[step].errors) {
 				noErrors = !this.wizard.steps[step].errors[error];
 			}
 			if(noErrors){
 				this.saveCheckout(step);
 			}
 		},
 		setSame: function(event){
 			if(event.target.checked){
 				var that = this;
 				this.wizard.delivery = this.wizard.billing;
 			}else{
 				this.wizard.delivery = {'building': '', 'address1': '', 'address2': '', 'city': '', 'province': '', 'postal': '' };
 			}
 		},
 		saveCheckout: function(step){
 			var that = this;
 			that.busySaving = true;
 			axios.post('/api/checkout', that.wizard)
 			.then(function (response) {
 				setTimeout(function(){
 					that.wizard.currentStep = Number(step+1);
 					that.busySaving = false;
 					if(step === 3){
 						that.wizard.complete = true;
 						return;
 					}
 				},500);
 			})
 			.catch(function (error) {
 				console.log(error);
 			});
 		},

 		next() {
 			this.$refs.slick.next();
 		},

 		prev() {
 			this.$refs.slick.prev();
 		},

 		reInit() {
            // Helpful if you have to deal with v-for to update dynamic lists
            this.$nextTick(() => {
            	this.$refs.slick.reSlick();
            });
        },

        // Events listeners
        handleAfterChange(event, slick, currentSlide) {
        	console.log('handleAfterChange', event, slick, currentSlide);
        },
        handleBeforeChange(event, slick, currentSlide, nextSlide) {
        	console.log('handleBeforeChange', event, slick, currentSlide, nextSlide);
        },
        handleBreakpoint(event, slick, breakpoint) {
        	console.log('handleBreakpoint', event, slick, breakpoint);
        },
        handleDestroy(event, slick) {
        	console.log('handleDestroy', event, slick);
        },
        handleEdge(event, slick, direction) {
        	console.log('handleEdge', event, slick, direction);
        },
        handleInit(event, slick) {
        	console.log('handleInit', event, slick);
        },
        handleReInit(event, slick) {
        	console.log('handleReInit', event, slick);
        },
        handleSetPosition(event, slick) {
        	console.log('handleSetPosition', event, slick);
        },
        handleSwipe(event, slick, direction) {
        	console.log('handleSwipe', event, slick, direction);
        },
        handleLazyLoaded(event, slick, image, imageSource) {
        	console.log('handleLazyLoaded', event, slick, image, imageSource);
        },
        handleLazeLoadError(event, slick, image, imageSource) {
        	console.log('handleLazeLoadError', event, slick, image, imageSource);
        },
    }
});
