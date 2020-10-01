<template>
  <ul class="list-group">
    <li class="list-group-item">
      <strong>
        Total ({{itemsQuantity}} {{'item' | pluralize(itemsQuantity) }}): {{total | formatMoney({symbol:"€", format: "%v %s"})}}
      </strong>
    </li>
  </ul>
</template>

<script>
import { mapGetters, mapState } from 'vuex'

export default {
  name: 'ShoppingCartSummary',
  computed: {
    ...mapGetters([
      'itemsQuantity',
      'total'
    ]),
  }
}
</script>
