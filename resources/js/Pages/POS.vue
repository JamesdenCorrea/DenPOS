<script setup>
import { ref } from 'vue';
import { useCartStore } from '@/Stores/cart';

const props = defineProps({
    tenant: Object,
    products: Array,
});

const cart = useCartStore();
const selectedCategory = ref('All');

const categories = ['All', 'Drinks', 'Food']; // For now, hardcoded

const filteredProducts = () => {
    return props.products;
};

function addToCart(product) {
    cart.addItem(product);
}
</script>

<template>
    <div class="flex gap-6 h-screen p-6 bg-gray-100">

        <!-- LEFT: PRODUCT GRID -->
        <div class="flex-1">
            <div class="mb-4 flex gap-2">
                <button v-for="cat in categories" :key="cat"
                    @click="selectedCategory = cat"
                    :class="selectedCategory === cat ? 'bg-blue-500 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-2 rounded-lg border">
                    {{ cat }}
                </button>
            </div>

            <div class="grid grid-cols-3 lg:grid-cols-4 gap-4">
                <button v-for="product in filteredProducts()" :key="product.id"
                    @click="addToCart(product)"
                    class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition text-left">
                    <div class="font-bold text-gray-800">{{ product.name }}</div>
                    <div class="text-sm text-gray-500">₱{{ parseFloat(product.price).toFixed(2) }}</div>
                    <div class="text-xs text-gray-400 mt-2">Stock: {{ product.stock }}</div>
                </button>
            </div>
        </div>

        <!-- RIGHT: CART -->
        <div class="w-96 bg-white rounded-lg shadow flex flex-col">
            <div class="p-4 border-b">
                <h3 class="font-bold text-gray-800">Current Order</h3>
            </div>

            <div class="flex-1 p-4 overflow-y-auto">
                <div v-if="cart.items.length === 0" class="text-center text-gray-400 py-8">
                    <p class="text-sm">No items yet.</p>
                    <p class="text-xs mt-2">Click a product to add it here.</p>
                </div>

                <div v-else class="space-y-3">
                    <div v-for="item in cart.items" :key="item.id"
                        class="flex justify-between items-center border-b pb-2">
                        <div>
                            <div class="font-semibold text-gray-800">{{ item.name }}</div>
                            <div class="text-sm text-gray-500">₱{{ item.price.toFixed(2) }}</div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button @click="cart.decrement(item.id)" class="bg-gray-200 px-2 rounded">-</button>
                            <span class="font-bold">{{ item.quantity }}</span>
                            <button @click="cart.increment(item.id)" class="bg-gray-200 px-2 rounded">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 border-t bg-gray-50">
                <div class="flex justify-between mb-2 text-sm">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-bold">₱{{ cart.subtotal.toFixed(2) }}</span>
                </div>
                <div class="flex justify-between mb-4 text-sm">
                    <span class="text-gray-600">VAT (12%)</span>
                    <span class="font-bold">₱{{ cart.vat.toFixed(2) }}</span>
                </div>
                <div class="flex justify-between mb-4 text-lg border-t pt-2">
                    <span class="font-bold">TOTAL</span>
                    <span class="font-bold text-green-600">₱{{ cart.total.toFixed(2) }}</span>
                </div>
                <button @click="cart.clear()" class="w-full bg-gray-200 text-gray-700 py-2 rounded-lg mb-2">
                    Clear
                </button>
                <button class="w-full bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600">
                    Charge
                </button>
            </div>
        </div>

    </div>
</template>