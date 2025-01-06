import { defineStore } from 'pinia';
import { computed, onMounted, reactive, watch } from 'vue';
import { router, usePage } from '@inertiajs/vue3';

export interface Cart {
    id: number;
    name: string;
    imgUrl: string;
    quantity: number;
    price: number;
}

interface Session {
    cart: Cart[];
}

// const sessionSyncTimeout: ReturnType<typeof setTimeout> | null = null;

export const useCartStore = defineStore('cart', () => {
    const cart = reactive<Cart[]>([]);

    watch(
        cart,
        (newCart, oldCart) => {
            router.post(
                '/cart',
                { cart: newCart },
                {
                    onError: () => cart.splice(0, 1, ...oldCart),
                    preserveState: true,
                    preserveScroll: true,
                }
            );
        },
        { deep: true }
    );

    onMounted(() => {
        const page = usePage();
        const laravelSession = page.props.session as Session;

        if (laravelSession.cart?.length > 0) {
            cart.length = 0;
            laravelSession.cart.forEach((sessCart) => cart.push(sessCart));
        }
    });

    const addToCart = (item: Cart) => {
        const oldCart = cart;
        const existingItemIndex = cart.findIndex(
            (cartItem) => cartItem.id === item.id
        );

        if (existingItemIndex !== -1) {
            cart.splice(existingItemIndex, 1, {
                ...cart[existingItemIndex],
                quantity: cart[existingItemIndex].quantity + item.quantity,
            });
        } else {
            cart.push({ ...item });
        }

        const undoCart = () => {
            cart.splice(0, 1, ...oldCart);
        };

        return { oldCart, undoCart };
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
        router.delete('/cart');
    };

    const isCartEmpty = computed(() => {
        return cart.length > 0;
    });

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
        isCartEmpty,
    };
});
