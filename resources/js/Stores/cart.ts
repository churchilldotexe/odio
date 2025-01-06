import { defineStore } from 'pinia';
import { computed, onMounted, reactive, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import axios, { AxiosError } from 'axios';

export interface Cart {
  id: number;
  name: string;
  imgUrl: string;
  quantity: number;
  price: number;
}

interface Session {
  cart: Cart[] | null;
}

let sessionSyncTimeout: ReturnType<typeof setTimeout> | null = null;

export const useCartStore = defineStore('cart', () => {
  const cart = reactive<Cart[]>([]);

  const syncCartWithSession = (cartData: Cart[]) => {
    if (sessionSyncTimeout) clearTimeout(sessionSyncTimeout);

    sessionSyncTimeout = setTimeout(async () => {
      try {
        await axios.post('/cart', { cart: cartData });
      } catch (error) {
        const axiosError = error as AxiosError;

        if (axiosError.response) {
          console.error('Server error:', {
            status: axiosError.response.status,
            data: axiosError.response.data,
            message: axiosError.message,
          });
        } else if (axiosError.request) {
          console.error('No response received', axiosError.request);
        } else {
          console.error('Request setup error', (error as Error).message);
        }
      }
    }, 500);
  };

  watch(
    cart,
    (newCart) => {
      syncCartWithSession(newCart); // NOTE: might need to spread
    },
    { deep: true }
  );

  onMounted(() => {
    const page = usePage();
    const laravelSession = page.props.session as Session;

    if (laravelSession.cart) {
      console.log('syncing with session');
      cart.length = 0;
      laravelSession.cart.forEach((sessCart) => cart.push(sessCart));
    }
    console.log('no session ');
  });

  const addToCart = (item: Cart) => {
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
    try {
      axios.delete('/api/cart');
    } catch (error) {
      console.error('unable to delete cart session', error);
    }
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
