<script setup lang="ts">
import { inject, Ref } from 'vue';
import CartIcon from '../Nav/CartIcon.vue';
import { cartModal } from '@/keys';
import ButtonLink from '../ButtonLink.vue';
import OrderedOverview from '@/Components/Order/OrderOverview.vue';
import SummaryRow from './SummaryRow.vue';
import NavModal from '../Nav/NavModal.vue';
import { useCartStore } from '@/Stores/cart';

const cartStore = useCartStore();

const { isModalOpen, handleModalToggle } = inject(cartModal) as {
    isModalOpen: Ref<boolean, boolean>;
    handleModalToggle: () => void;
}

const updateCartItem = ({ id, quantity }: { id: number, quantity: number }) => { cartStore.updateCartItem(id, quantity) }

</script>

<template>

    <button @click="handleModalToggle" aria-label="open cart" class="relative md:ml-auto lg:ml-0">
        <CartIcon class="fill-current text-gray-500  hocus-visible:stroke-coral"
            :class="[isModalOpen ? 'stroke-coral' : '']" />
        <span v-if="cartStore.cart.length > 0"
            class="absolute right-1/2 top-1/2 grid size-5 place-items-center rounded-full bg-coral text-xs font-bold text-white ">{{
                cartStore.cart.length }}</span>
    </button>

    <NavModal v-model:toggle-modal="isModalOpen">
        <section id="cart-modal" v-show="isModalOpen"
            class="absolute right-0 top-full m-7 grid max-w-md gap-8 rounded-lg bg-white px-7 py-8 md:mr-0">
            <div v-if="cartStore.isCartEmpty" class="contents">

                <div class="flex items-center justify-between gap-4 ">
                    <h2 class="text-lg font-bold uppercase">Cart ({{ cartStore.cart.length }})</h2>
                    <button @click="cartStore.clearCart" class="font-medium text-black/50 underline">Remove all</button>
                </div>

                <!-- TODO: try to do an undo feature when the item is removed. have a timed button that will show the undo button for a little while (try doing a popup for this ) a popup component that you can call where you can pass the oldCart data to have an option to undo the data  -->
                <OrderedOverview v-for="item in cartStore.cart" :key="item.id" :item="item"
                    :update-quantity="updateCartItem" :delete-item="cartStore.deleteCartItem" />
                <SummaryRow label="TOTAL" :value="cartStore.initialTotal" />
                <ButtonLink href="/checkout" class="w-full text-center text-sm">Checkout</ButtonLink>

            </div>

            <div v-else>
                <h2 class="text-lg font-bold uppercase">Cart Empty</h2>
            </div>
        </section>
    </NavModal>


</template>
