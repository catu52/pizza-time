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
      items: 'cartProducts'
  }),
    components: {
      ShoppingCartItem,
      ShoppingCartSummary
  },
  methods: {
      buy () {
        window.alert("You've bought it :)")
        window.location.reload()
    }
}
}
</script>
