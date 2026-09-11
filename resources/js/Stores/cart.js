import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: [],
    }),

    getters: {
        subtotal: (state) => {
            return state.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        },
        vat() {
            // 12% VAT is already included in the price in the Philippines
            // But if we want to display the VAT portion: subtotal / 1.12 * 0.12
            return this.subtotal * 0.12;
        },
        total() {
            return this.subtotal + this.vat;
        },
    },

    actions: {
        addItem(product) {
            const existing = this.items.find(i => i.id === product.id);
            if (existing) {
                existing.quantity++;
            } else {
                this.items.push({
                    id: product.id,
                    name: product.name,
                    price: parseFloat(product.price),
                    quantity: 1,
                });
            }
        },
        increment(id) {
            const item = this.items.find(i => i.id === id);
            if (item) item.quantity++;
        },
        decrement(id) {
            const item = this.items.find(i => i.id === id);
            if (item) {
                item.quantity--;
                if (item.quantity <= 0) {
                    this.items = this.items.filter(i => i.id !== id);
                }
            }
        },
        clear() {
            this.items = [];
        },
    },
});