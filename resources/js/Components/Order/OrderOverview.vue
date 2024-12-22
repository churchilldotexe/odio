<script setup lang="ts">
import { ref } from 'vue';
import OrderCounter from '@/Components/Order/OrderCounter.vue';

// TODO:  sync with pinia
const orderCount = ref(1)

</script>

<template>
    <div class="grid grid-cols-[auto,1fr,1fr] gap-4">
        <img class="aspect-square max-w-16 rounded-lg"
            src="/assets/product-zx9-speaker/mobile/image-category-page-preview.jpg" alt="cart order preview">
        <div class="flex flex-col justify-center gap-1 self-stretch ">
            <p class="font-bold uppercase">xx99 mk II</p>
            <p class=" text-sm font-bold uppercase text-black/50">$ 2,999</p>
        </div>
        <slot>
            <OrderCounter v-model:order-count="orderCount" class=" h-min w-fit self-center justify-self-end " />
        </slot>
    </div>

</template>
