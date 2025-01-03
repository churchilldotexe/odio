import { defineStore } from 'pinia';
import { computed, reactive } from 'vue';

export interface Cart {
    id: number;
    name: string;
    imgUrl: string;
    quantity: number;
    price: number;
}

export const useCartStore = defineStore('cart', () => {
    const cart = reactive<Cart[]>([]);

    const addToCart = (item: Cart) => {
        const existingItemIndex = cart.findIndex(
            (cartItem) => cartItem.id === item.id
        );

        if (existingItemIndex !== -1) {
            cart.splice(existingItemIndex, 1, {
                ...cart[existingItemIndex],
                quantity: cart[existingItemIndex].quantity + item.quantity,
            });
            console.log('updatedCart', cart); //this logs the latest update meaning it is working
        } else {
            cart.push({ ...item });
        }
    };

    const updateCartItem = (itemId: number, quantity: number) => {
        const existingItemIndex = cart.findIndex(
            (cartItem) => cartItem.id === itemId
        );

        if (existingItemIndex !== -1) {
            const newQuantity = cart[existingItemIndex].quantity + quantity;

            cart[existingItemIndex] = {
                ...cart[existingItemIndex],
                quantity: newQuantity,
            };

            return newQuantity;
        }

        return quantity;
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
