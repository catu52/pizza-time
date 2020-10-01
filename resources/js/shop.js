import Vue from 'vue';
import Vuex from 'vuex';
import chunk from 'chunk';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        products: [],
        shoppingCart: {
            added: [],
            total: 0
        }
    },
    getters: {
        products: state => {
            return state.products;
        },
        cartProducts: state => {
            return state.shoppingCart.added.map(({ id, quantity }) => {
                const product =
                    state
                    .products
                    .find(product => product.id === id)

                return {
                    ...product,
                    quantity
                }
            });
        },
        itemsQuantity: (state, getters) => {
            return getters.cartProducts.reduce((quantity, item) => {
                return quantity + item.quantity;
            }, 0)
        },
        total: (state, getters) => {
            return getters.cartProducts.reduce((total, item) => {
                const sum = total + item.price * item.quantity;
                state.shoppingCart.total = sum;
                return sum;
            }, 0)
        }
    },
    mutations: {
        SET_PRODUCTS(state, products){
            state.products = products;
        },
        ADD_TO_CART(state, productId){
            const record = state.shoppingCart.added.find(product => product.id === productId)

            if (!record) {
                state.shoppingCart.added.push({
                    id: productId,
                    quantity: 1
                })
            } else {
                record.quantity++
            }
        },
        REMOVE_FROM_CART (state, item) {
            const index = state.shoppingCart.added.findIndex(added => added.id === item.id)
            state.shoppingCart.added.splice(index, 1)
        }
    },
    actions: {
        loadProducts({ commit }) {
            axios
                .get('/api/pizza')
                .then(response => response.data)
                .then(products => {
                    console.log(products);
                commit('SET_PRODUCTS', products)
            });
        },
        addToCart({commit}, product) {
            commit('ADD_TO_CART', product.id)
        },
        removeFromCart({ commit }, product) {
            commit('REMOVE_FROM_CART', product)
        }
    },
});