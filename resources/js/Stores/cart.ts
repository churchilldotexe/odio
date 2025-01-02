import { defineStore } from 'pinia';
import { computed, reactive } from 'vue';

interface Cart {
    id: number;
    name: string;
    imgUrl: string;
    quantity: number;
    price: number;
}

export const useCartStore = defineStore('cart', () => {
    const cart = reactive<Cart[]>([]);

    const addToCart = (item: Cart) => {
        const existingItem = cart.find((cartItem) => cartItem.id === item.id);

        if (existingItem) {
            item.quantity += item.quantity;
        } else {
            cart.push({ ...item });
        }
    };

    const updateCartItem = (itemId: number, quantity: number) => {
        const existingItem = cart.findIndex((cartItem) => cartItem.id === itemId);

        if (existingItem !== -1) {
            cart[existingItem] = {
                ...cart[existingItem],
                quantity,
            };
        }
    };

    const deleteCartItem = (id: number) => {
        const cartIndex = cart.findIndex((cartItem) => cartItem.id === id);

        if (cartIndex !== -1) {
            cart.splice(cartIndex, 1);
        }
    };

    const clearCart = () => {
        cart.length = 0;
    };

    const initialTotal = computed(() => {
        return cart.reduce((total, item) => total + item.price * item.quantity, 0);
    });

    const finalTotal = computed(() => {
        const shippingFee = 50;
        const vatValue = initialTotal.value * 0.2;
        const total = initialTotal.value + shippingFee + vatValue;

        return Math.round(total);
    });

    return {
        cart,
        addToCart,
        updateCartItem,
        deleteCartItem,
        initialTotal,
        finalTotal,
        clearCart,
    };
});
