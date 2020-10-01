<template>
    <front-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Our Selections
            </h2>
        </template>

        <div class="py-12">
            <div class="row mt-4">

                <div class="col-sm-9">
                    <ProductList />
                </div>

                <div class="col-sm-3">
                    <ShoppingCart />
                </div>

            </div>
        </div>


    </front-layout>
</template>

<script>
    import Vue from 'vue'
    import FrontLayout from './../Layouts/FrontLayout'
    import ProductList from './Shop/ProductList'
    import ShoppingCart from './Shop/ShoppingCart'

    export default {
        components: {
            FrontLayout,
            ProductList,
            ShoppingCart
        }
    }
</script>
