<template>
	<div class="">
		<div class="p-2">
            <slot>
                <h2>Have a representative contact you to discuss your requrements</h2>
            </slot>
		</div>
		<div class="mt-2 text-base items-stretch">
            <div class="px-4 py-2 border border-red bg-red-lightest text-red-light mb-2" v-show="submitError">
                There was an error sending the message, please try again
            </div>
            <transition name="fade" mode="out-in">
                <div class="px-4 py-2 border border-green bg-green-lightest text-green-darker" v-if="complete && !submitError">
                    Your message has been sent, a representative will respond as soon as possible.
                </div>
                <form class="" action="/contact" method="POST" id="contactForm" v-else>
                    <input id="product_id" name="product_id" type="hidden" :value="productId" />
                    <div class="h-full bg-white p-4 border-t border-b sm:border">
                        <label class="mt-2 block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            First Name
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.first_name}" id="first_name" name="first_name" type="text" placeholder="" @blur="validate('first_name')">
                        <p class="text-red text-xs italic mt-2" v-show="errors.first_name">Please provide your full name.</p>
                        <label class="mt-2 block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                            Last Name
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.last_name}" id="last_name" name="last_name" type="text" placeholder="" @blur="validate('last_name')">
                        <p class="text-red text-xs italic mt-2" v-show="errors.last_name">Please provide your full name.</p>
                        <label class="mt-2 block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                            Email
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.email}" id="email" name="email" type="text" placeholder="" @blur="validate('email')">
                        <p class="text-red text-xs italic mt-2" v-show="errors.email">Please enter a valid email address.</p>
                        <label class="mt-2 block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-telephone">
                            Contact Number
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.telephone}" id="telephone" name="telephone" type="text" placeholder="" @blur="validate('telephone')">
                        <p class="text-red text-xs italic mt-2" v-show="errors.telephone">Provice a telephone number.</p>
                        <button class="mt-6 appearance-none border font-bold text-white bg-grey-darker hover:bg-max-secondary py-2 px-4 rounded" @click.prevent="checkForm">
                            <transition name="component-bounce" mode="out-in">
                                <font-awesome-icon :icon="busy ? icons.loading : icons.send" class="fa-lg" :class="busy ? 'fa-spin' : ''" v-bind:key="busy"></font-awesome-icon>
                            </transition>
                            Send
                        </button>
                    </div>
                </form>
            </transition>
		</div>
	</div>
</template>
<script>
import Qs from 'qs'
window.Qs = Qs;
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSync } from '@fortawesome/pro-regular-svg-icons/faSync'
import { faEnvelope } from '@fortawesome/pro-regular-svg-icons/faEnvelope'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
export default {
    props: ['productId'],
    data: function() {
        return {
            icons:{
            	loading: faSync,
            	send: faEnvelope,
            },
            fields: [
                'product_id',
                'first_name',
            	'last_name',
                'email',
                'telephone',
            ],
            required: {
                'first_name': {
                    min: 1
                },
                'last_name': {
                    min: 1
                },
                'email': {
                    min: 3,
                    email: 	/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                },
                'telephone': {
                    min: 1
                },
            },
            busy: false,
            complete: false,
            errors: {
                'first_name':false,
                'last_name':false,
                'email':false,
                'telephone':false,
            },
            submitError: false,
        };
    },
    components:{
        FontAwesomeIcon
    },
    methods: {
        validate: function(id){
            var el = document.getElementById(id);
            var needsValidation = this.required[id];

            if(needsValidation && el){
                this.errors[id] = false;

                if(el.value.trim() == ''){
                    this.errors[id] = true;
                }
                var min = needsValidation.min ? needsValidation.min : 1;
                var max = needsValidation.max ? needsValidation.max : false;
                if(el.value.trim().length < min){
                    this.errors[id] = true;
                }
                if(max!==false && el.value.trim().length > max){
                    this.errors[id] = true;
                }
                var equals = needsValidation.equals ? needsValidation.equals : false;
                if(equals && el.value.trim() !== document.getElementById(equals).value.trim()){
                    this.errors[id] = true;
                }
                var email = needsValidation.email ? needsValidation.email : false;
                if(email && !email.test(el.value.trim())){
                    this.errors[id] = true;
                }
            }
        },
        checkForm: function(){
            for (var required in this.required) {
                this.validate(required);
            }
            var noErrors = true;
            for (var error in this.errors) {
                noErrors = !this.errors[error];
            }
            if(noErrors){
                this.submitForm();
            }else{
            	console.log(this.errors);
            }
        },
        submitForm: function(){
        	var that = this;
        	var data = {};
        	for (var i = that.fields.length - 1; i >= 0; i--) {
        		data[that.fields[i]] = document.getElementById(that.fields[i]).value;
        	}
            that.busy = true;
            axios.post('/lead', Qs.stringify(data))
            .then(function (response) {
                setTimeout(function(){
                    that.busy = false;
                    that.submitError = false;
                    that.complete = true;
                },500);
            })
            .catch(function (error) {
                console.log(error);
                that.submitError = true;
                that.busy = false;
            });
        }
    },
    created () {
        var that = this;
        /*document.addEventListener('click', function(event){
            that.showCart = false;
        });*/
    },
    destroyed () {
        
    },
    mounted() {
        console.log('Cart Component mounted.')
    }
}
</script>
