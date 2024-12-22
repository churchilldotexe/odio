<script setup lang="ts">
import { inject, Ref } from 'vue';
import CartIcon from '../Nav/CartIcon.vue';
import { cartModal } from '@/keys';
import ButtonLink from '../ButtonLink.vue';
import OrderedOverview from '@/Components/Order/OrderOverview.vue';
import SummaryRow from './SummaryRow.vue';
import NavModal from '../Nav/NavModal.vue';


const { isModalOpen, handleModalToggle } = inject(cartModal) as {
    isModalOpen: Ref<boolean, boolean>;
    handleModalToggle: () => void;
}


</script>

<!-- TODO:
    - [x] do a section instead of details and the logic is using v-show(to persist the state) & transition
    - [x] for backdrop: teleport it in the main layouts (div) and set the z-index lower than TheHeader but higher than everybody else
    - [] for closing the modal attach the following:
        - [x] esc keydown that will trigger closing when modal is ON
        - [x] clicking outside the modal will close the modal (vshow-off to preserve state)
        - [x] clicking checkout will redirect to checkout page and close the modal
    - [x] will disable the hide nav on scroll when modal is open
-->



<template>

    <button @click="handleModalToggle" aria-label="open cart" class="md:ml-auto lg:ml-0">
        <CartIcon class="fill-current text-gray-500 hocus-visible:stroke-coral "
            :class="[isModalOpen ? 'stroke-coral' : '']" />
    </button>

    <NavModal v-model:toggle-modal="isModalOpen">
        <section id="cart-modal" v-show="isModalOpen"
            class="absolute right-0 top-full m-7 grid max-w-md gap-8 rounded-lg bg-white px-7 py-8 md:mr-0">
            <div class="flex items-center justify-between gap-4 ">
                <h2 class="text-lg font-bold uppercase">Cart (3)</h2>
                <button class="font-medium text-black/50 underline">Remove all</button>
            </div>

            <OrderedOverview />
            <SummaryRow label="TOTAL" value="5,396" />
            <ButtonLink href="/checkout" class="w-full text-center text-sm">Checkout</ButtonLink>
        </section>
    </NavModal>


</template>
