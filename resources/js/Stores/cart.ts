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

let sessionSyncTimeout: ReturnType<typeof setTimeout> | null = null;

export const useCartStore = defineStore('cart', () => {
    const cart = reactive<Cart[]>([]);
    const prevCart = reactive<Cart[]>([]);


    const cloneCart = (cartValue: Cart[]) => {
        return prevCart.splice(0, 1, ...cartValue);
    };

    const { pause: cartWatchPause, resume: cartWatchResume } = watch(
        cart,
        (newCart) => {
            if (sessionSyncTimeout) {
                clearTimeout(sessionSyncTimeout);
            }

            sessionSyncTimeout = setTimeout(() => {
                router.post(
                    '/cart',
                    { cart: newCart },
                    {
                        // undo the cart
                        onError: () => cart.splice(0, 1, ...prevCart),
                        preserveState: true,
                        preserveScroll: true,
                    }
                );
            }, 500);
        },
        { deep: true }
    );

    onMounted(() => {
        const page = usePage();
        const laravelSession = page.props.session as Session;

        if (laravelSession.cart?.length > 0) {
            cartWatchPause();

            cart.length = 0;
            laravelSession.cart.forEach((sessCart) => cart.push(sessCart));

            cartWatchResume();
        }
    });

    const addToCart = (item: Cart) => {
        cloneCart(cart);

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
    };

    const updateCartItem = (itemId: number, quantity: number) => {
        cloneCart(cart);

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

        return { oldQuantity: quantity };
    };

    const undoCart = () => {
        cart.splice(0, 1, ...prevCart);
    };

    const deleteCartItem = (id: number) => {
        cloneCart(cart);
        const cartIndex = cart.findIndex((cartItem) => cartItem.id === id);

        if (cartIndex !== -1) {
            cart.splice(cartIndex, 1);
        }
    };

    const clearCart = () => {
        cart.length = 0;
        router.delete('/cart', { onError: () => cart.splice(0, 1, ...prevCart) });
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
        prevCart,
        addToCart,
        updateCartItem,
        undoCart,
        deleteCartItem,
        initialTotal,
        finalTotal,
        clearCart,
        isCartEmpty,
    };
});
