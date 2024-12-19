<script setup lang="ts">
import { ref } from 'vue';
import CartModal from './CartModal.vue';
import CartIcon from '../Nav/CartIcon.vue';
import OrderCounter from '../OrderCounter.vue';

const isModalOpen = ref(false)

</script>

<template>
    <button @click="isModalOpen = true" class=" md:ml-auto lg:ml-0" aria-label="open cart">
        <CartIcon class="fill-current text-gray-500 hocus-visible:stroke-coral " />
    </button>

    <CartModal class="rounded-lg " v-model:show-modal="isModalOpen">

        <!-- <button class="p-1 text-coral" @click="isModalOpen = false">&times;</button> -->
        <section class=" grid gap-8 px-7 py-8 ">
            <div class="flex items-center justify-between gap-4 ">
                <h2 class="text-lg font-bold uppercase">Cart (3)</h2>
                <button class="font-medium text-black/50 underline">Remove all</button>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <img class="aspect-square rounded-lg"
                    src="/assets/product-zx9-speaker/mobile/image-category-page-preview.jpg" alt="cart order preview">
                <div class="flex flex-col self-center ">
                    <p class="font-bold uppercase">xx99 mk II</p>
                    <p class="text-sm font-bold uppercase text-black/50">$ 2,999</p>
                </div>
                <OrderCounter class="h-fit self-center " />
            </div>
            <div class="flex items-center justify-between">
                <p class="font-medium text-black/50">TOTAL</p>
                <p class="text-lg font-bold">$ 5,396</p>
            </div>
            <button class="w-full bg-coral py-4 text-sm font-bold text-white">Checkout</button>
        </section>
    </CartModal>
</template>
