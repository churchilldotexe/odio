<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';
import CartIcon from '../Nav/CartIcon.vue';
import OrderCounter from '../OrderCounter.vue';

const detailsRef = ref<HTMLDetailsElement | null>(null)
const abortController = new AbortController()

onMounted(() => {
    document.addEventListener('click', (e) => {
        const target = e.target
        if (target === detailsRef.value) {
            console.log('foo')
        }

    }, { signal: abortController.signal })
})

onUnmounted(() => {
    abortController.abort()
})
</script>

<!-- TODO:
    - [] do a div instead of details and the logic is using v-show(to persist the state) & transition
    - [x] for backdrop: teleport it in the main layouts (div) and set the z-index lower than TheHeader but higher than everybody else
    - [] for closing the modal attach the following:
        - esc keydown that will trigger closing when modal is ON
        - clicking outside the modal will close the modal (vshow-off to preserve state)
        - clicking checkout will redirect to checkout page and close the modal
    - [] will disable the scrolling when modal is open
-->



<template>
    <button aria-label="open cart" class=" md:ml-auto lg:ml-0">
        <CartIcon class="fill-current text-gray-500 hocus-visible:stroke-coral " />
    </button>

    <!-- attach absolutely with nav parent  -->
    <section class="absolute right-0 top-full m-7 grid max-w-md gap-8 rounded-lg bg-white px-7 py-8 md:mr-0">
        <div class="flex items-center justify-between gap-4 ">
            <h2 class="text-lg font-bold uppercase">Cart (3)</h2>
            <button class="font-medium text-black/50 underline">Remove all</button>
        </div>

        <div class="grid grid-cols-[.5fr,1fr,1fr] gap-4">
            <img class="aspect-square rounded-lg"
                src="/assets/product-zx9-speaker/mobile/image-category-page-preview.jpg" alt="cart order preview">
            <div class="flex flex-col justify-center gap-1 self-stretch ">
                <p class="font-bold uppercase">xx99 mk II</p>
                <p class=" text-sm font-bold uppercase text-black/50">$ 2,999</p>
            </div>
            <OrderCounter class=" h-min w-fit self-center justify-self-end " />
        </div>
        <div class="flex items-center justify-between">
            <p class="font-medium text-black/50">TOTAL</p>
            <p class="text-lg font-bold">$ 5,396</p>
        </div>
        <button class="w-full bg-coral py-4 text-sm font-bold text-white">Checkout</button>
    </section>

    <!-- act as a backdrop, have lower z-index with nav but higher than everybody else because header have higher stacking context than other -->
    <div role="backdrop" class="fixed inset-0 -z-10 h-dvh w-full bg-black/40" />
</template>
