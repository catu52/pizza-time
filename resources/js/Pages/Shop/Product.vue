<template>
  <div class="card text-center">
    <div class="card-img-top pizza-img"></div>

    <div class="card-body">
      <h5 class="card-title">{{product.name}}</h5>
      <ul>
        <li v-for="ingredient in product.ingredients" class="text-secondary">{{ ingredient.name }} - {{ingredient.price | formatMoney({symbol:"€", format: "%v %s"})}}</li>
      </ul>
      <p class="card-text">{{product.price | formatMoney({symbol:"€", format: "%v %s"})}} </p>
      <AddToCart :product="product" />
    </div>
  </div>
</template>

<script>
import AddToCart from './AddToCart';

export default {
  name: 'Product',
  props: {
    product: Object
  },
  components: { AddToCart }
}
</script>

<style scoped>
  .pizza-img {
    padding-bottom: 75%;
    background: url('/img/pizza.jpg') no-repeat center center #ddd;
    background-size: 40%;
  }
</style>
