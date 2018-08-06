<template>
	<div class="mt-6">
		<div class="p-2 sm:p-0">
			<h1 class="mb-2">Contact Us</h1>
			<p>
				Please feel free to contact us using the details below for any information you require.
			</p>
		</div>
        <div class="flex mt-6 text-base flex-wrap sm:-mx-2">
            <div class="p-2 flex-1">
                <div class="border flex-1">
                    <h3 class="font-medium mb-4 text-white bg-grey-darker p-2">Sales Enquiries</h3>
                    <div class="p-4">
                        <strong>Sandor Dowling</strong><br/>
                        <a class="text-sanika-secondary" href="tel:+27829225586">+27 (0)82 922-5586</a><br/>
                    </div>
                </div>
            </div>
            <div class="p-2 flex-1">
                <div class="border">
                    <h3 class="font-medium mb-4 text-white bg-grey-darker p-2">Technical Enquiries</h3>
                    <div class="p-4">
                        <strong>Colte Smit</strong><br/>
                        <a class="text-sanika-secondary" href="tel:+27829285788">+27 (0)82 928-5788</a><br/>
                    </div>
                </div>
            </div>
            <div class="p-2 flex-1">
                <div class="border">
                    <h3 class="font-medium mb-4 text-white bg-grey-darker p-2">Management Enquiries</h3>
                    <div class="p-4">
                        <strong>Tanika McColgan</strong><br/>
                        <a class="text-sanika-secondary" href="tel:+27837934504">+27 (0)83 793-4504</a><br/>
                    </div>
                </div>
            </div>
        </div>
		<div class="flex mt-2 text-base items-stretch flex-wrap sm">
			<div class="w-full sm:px-2 sm:w-1/2">
				<div class="px-4 py-2 border border-red bg-red-lightest text-red-light mb-2" v-show="submitError">
					There was an error sending the message, please try again
				</div>
				<transition name="fade" mode="out-in">
				<div class="px-4 py-2 border border-green bg-green-lightest text-green-darker" v-if="complete && !submitError">
					Your message has been sent, a representative will respond as soon as possible.
				</div>
				<form class="h-full" action="/contact" method="POST" id="contactForm" v-else>
					<div class="h-full bg-white p-4">
						<div class="-mx-3 md:flex md:flex-wrap mb-6">
							<div class="md:w-1/2 px-3 mb-6 md:mb-0">
								<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
									Full Name
								</label>
								<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.fullname}" id="fullname" name="fullname" type="text" placeholder="" @blur="validate('fullname')">
								<p class="text-red text-xs italic mt-2" v-show="errors.fullname">Please provide your full name.</p>
							</div>
							<div class="md:w-1/2 px-3">
                                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                                    Email
                                </label>
                                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.email}" id="email" name="email" type="text" placeholder="" @blur="validate('email')">
                                <p class="text-red text-xs italic mt-2" v-show="errors.email">Please enter a valid email address.</p>
                            </div>
                            <div class="md:w-1/2 px-3 md:mt-6">
								<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-telephone">
									Contact Number
								</label>
								<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.telephone}" id="telephone" name="telephone" type="text" placeholder="" @blur="validate('telephone')">
								<p class="text-red text-xs italic mt-2" v-show="errors.telephone">Provice a telephone number.</p>
							</div>
							<div class="md:w-1/2 px-3 md:mt-6">
								<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
									Subject
								</label>
								<div class="relative">
									<select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="subject" name="subject">
										<option value="General Enquiry">General Enquiry</option>
										<option value="Technical Enquiry">Technical Enquiry</option>
										<option value="Complaint">Complaint</option>
									</select>
									<div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
										<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
									</div>
								</div>
							</div>
						</div>
						<div class="-mx-3 md:flex mb-6">
							<div class="md:w-full px-3">
								<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
									Messsage
								</label>
								<textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" :class="{'border-red': errors.message}" name="message" id="message" @blur="validate('message')">
									
								</textarea>
								<p class="text-red text-xs italic mt-2" v-show="errors.message">Please write us a message.</p>
							</div>
						</div>
						<div class="-mx-3 md:flex md:justify-end mb-2">
							<div class="md:w-1/3 px-3 mb-6 md:mb-0 text-right">

								<button class="appearance-none border font-bold text-white bg-grey-darker hover:bg-sanika-secondary py-2 px-4 rounded" @click.prevent="checkForm">
									<transition name="component-bounce" mode="out-in">
										<font-awesome-icon :icon="busy ? icons.loading : icons.send" class="fa-lg" :class="busy ? 'fa-spin' : ''" v-bind:key="busy"></font-awesome-icon>
									</transition>
									Send
								</button>
							</div>
						</div>
					</div>
				</form>
				</transition>
			</div>
			<div class="w-full sm:px-2 sm:w-1/2">
				<div class="bg-white border-t border-b sm:border">
                    <h3 class="p-2 border-b font-medium mb-2 text-white bg-grey-darker">Head Office Johannesburg Contact Details</h3>
                    <div class="flex p-4">
                        <div class="w-1/2 mr-1">
                            <span class="block text-sm font-bold text-grey-darker roman mb-2">Call</span>
                            <a class="text-sanika-secondary" href="tel:+27114253061">+27 (0)11 425 3061</a><br/>
                            <span class="block text-sm font-bold text-grey-darker roman mt-2">Fax</span>
                            <a class="text-sanika-secondary" href="tel:+270114256383">+27 (0)86 575 5851</a><br/>
                            <span class="block text-sm font-bold text-grey-darker roman mt-2">Email</span>
                            <a class="text-sanika-secondary" href="mailto:info@sanika.co.za" title="email sanika">info@sanika.co.za</a>
                        </div>
                        <div class="w-1/2 ml-1">
                            <address class="leading-normal">
                                <span class="block text-sm font-bold text-grey-darker roman mb-2">Visit Us</span>
                                <a class="text-sanika-secondary" target="_blank" href="https://goo.gl/maps/dLvyTtBvbe12">
                                    7 Hills Street<br/>
                                    Rynfield<br/>
                                    Benoni<br/>
                                    Gauteng<br/>
                                    South Africa
                                </a>
                            </address>
                        </div>
                    </div>                          
                </div>
                <div class="mt-4 bg-white border-t border-b sm:border">
                    <h3 class="p-2 border-b font-medium mb-2 text-white bg-grey-darker">Cape Town Contact Details</h3>
                    <div class="flex p-4">
                        <div class="w-1/2 mr-1">
                            <span class="block text-sm font-bold text-grey-darker roman mb-2">Call</span>
                            <a class="text-sanika-secondary" href="tel:+27114253061">+27 (0)82 928 5788</a><br/>
                            <span class="block text-sm font-bold text-grey-darker roman mt-2">Email</span>
                            <a class="text-sanika-secondary" href="mailto:colte@sanika.co.za" title="email sanika">colte@sanika.co.za</a>
                        </div>
                        <div class="w-1/2 ml-1">
                            <address class="leading-normal">
                                <span class="block text-sm font-bold text-grey-darker roman mb-2">Visit Us</span>
                                <a class="text-sanika-secondary" target="_blank" href="https://goo.gl/maps/Mcv8besxXMn">
                                    Unit 29B<br/>
                                    Prestige Business Park<br/>
                                    Democracy Way<br/>
                                    Monague Gardens<br/>
                                    Cape Town<br/>
                                    South Africa
                                </a>
                            </address>
                        </div>
                    </div>                          
                </div>
                <div class="mt-4 bg-white border-t border-b sm:border">
					<h3 class="p-2 border-b font-medium mb-2 text-white bg-grey-darker">Durban Contact Details</h3>
                    <div class="flex p-4">
                        <div class="w-full">
                            <span class="block text-sm font-bold text-grey-darker roman mb-2">Call</span>
                            <a class="text-sanika-secondary" href="tel:+27114253061">+27 (0)82 922 5586</a><br/>
                            <span class="block text-sm font-bold text-grey-darker roman mt-2">Email</span>
                            <a class="text-sanika-secondary" href="mailto:sandor@sanika.co.za" title="email sanika">sandor@sanika.co.za</a>
                        </div>
                    </div>        					
				</div>
			</div>
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
    props: [],
    data: function() {
        return {
            icons:{
            	loading: faSync,
            	send: faEnvelope,
            },
            fields: [
            	'fullname',
                'email',
                'email',
                'telephone',
                'message'
            ],
            required: {
                'fullname': {
                    min: 1
                },
                'email': {
                    min: 3,
                    email: 	/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                },
                'telephone': {
                    min: 1
                },
                'message': {
                    min: 1
                },
            },
            busy: false,
            complete: false,
            errors: {
                'fullname':false,
                'email':false,
                'telephone':false,
                'message':false,
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
                var sanika = needsValidation.sanika ? needsValidation.sanika : false;
                if(el.value.trim().length < min){
                    this.errors[id] = true;
                }
                if(sanika!==false && el.value.trim().length > sanika){
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
            axios.post('/contact', Qs.stringify(data))
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
