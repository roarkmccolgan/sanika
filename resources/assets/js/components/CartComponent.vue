<template>
    <button class="bg-teal text-white whitespace-no-wrap font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-teal-dark hover:border-teal rounded">
        <font-awesome-icon :icon="icons.cart"></font-awesome-icon>
        <span class="hidden sm:inline-block text-sm">Your Cart</span>
    </button>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
    import faShoppingCart from '@fortawesome/fontawesome-pro-regular/faShoppingCart'
    export default {
        props: ['cart'],
        data: function() {
            return {
                items: this.cart ? this.cart : [],
                icons:{
                    cart: faShoppingCart,
                }
            };
        },
        components:{
            FontAwesomeIcon
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
