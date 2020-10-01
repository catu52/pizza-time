<template>
    <div>
        <div class="row" v-for="(row, index) in productRows" :key="index">
            <div class="col-sm-4 mb-4" v-for="product in row" :key="product.id">
                <Product :product="product" track-by="id" />
            </div>
        </div>
    </div>
</template>

<script>
    import Product from './Product'
    import { mapActions, mapState } from 'vuex'
    import chunk from 'chunk'

    export default {
        name: 'ProductList',
        components: { Product },
        computed: mapState({
            productRows: state => chunk(state.products, 3)
        }),
        methods: mapActions([
            'loadProducts'
        ]),
        created() {
            this.loadProducts()
        }
    }
</script>
