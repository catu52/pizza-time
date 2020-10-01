<template>
  <div class="media mb-3">
    <div class="mr-2">
      <div class="rounded vue-logo"></div>
    </div>

    <div class="media-body">
      <strong class="d-block">{{item.name}}</strong>
      <span>Quantity: {{item.quantity}} - {{item.price | formatMoney}}</span>
    </div>

    <div class="media-right align-middle">
      <RemoveFromCart :product="item" />
    </div>
  </div>
</template>

<script>
import RemoveFromCart from './RemoveFromCart'

export default {
  name: 'ShoppingCartItem',
  props: {
    item: Object
  },
  components: { RemoveFromCart }
}
</script>

<style scoped>
  .vue-logo {
    height: 50px;
    width: 50px;
    background: url('/img/pizza.jpg') no-repeat center center #ddd;
    background-size: 45%;
  }
</style>
