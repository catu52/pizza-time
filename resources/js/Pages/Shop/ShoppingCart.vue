<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Cart</h3>

            <ShoppingCartItem
            v-for="item in items"
            :item="item"
            :key="item.id" />

            <ShoppingCartSummary />

            <div class="mt-3 text-center">
                <button class="btn btn-success"
                @click="buy">
                Checkout
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import ShoppingCartItem from './ShoppingCartItem'
    import ShoppingCartSummary from './ShoppingCartSummary'
    import { mapGetters } from 'vuex'

    export default {
        name: 'ShoppingCart',
        computed: mapGetters({
            items: 'cartProducts',
            total: 'total'
        }),
        components: {
            ShoppingCartItem,
            ShoppingCartSummary
        },
        methods: {
            buy () {
                let purchase = {
                        name: "Pedro Perez",
                        address: "6124 Boyer Creek",
                        pizzas: [],
                        total: 0
                    };
                let mapped = this.items.map(function(product){
                    return {
                        id: product.id,
                        name: product.name,
                        price: product.price,
                        quantity: product.quantity
                    }
                });
                purchase.total = Math.round((this.total + Number.EPSILON) * 100) / 100;
                purchase.pizzas = mapped;
                console.log(purchase);

                axios
                    .post('api/purchase', purchase)
                    .then(response => response.data)
                    .then(purchase => {
                        window.alert(purchase);
                        window.location.reload();
                    })
            }
        }
    }
</script>
