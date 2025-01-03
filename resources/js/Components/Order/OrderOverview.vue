<script setup lang="ts">
import { computed } from 'vue';
import OrderCounter from '@/Components/Order/OrderCounter.vue';
import { Cart } from '@/Stores/cart';

const props = defineProps<{
    item: Cart
    updateQuantity: ({ id, quantity }: { id: number, quantity: number }) => void
}>()

const orderCount = computed({
    get: () => props.item.quantity,

    set: (newValue) => {
        const difference = newValue - props.item.quantity

        props.updateQuantity({ quantity: difference, id: props.item.id })
    }
})


</script>

<template>
    <div class="grid grid-cols-[auto,1fr,1fr] gap-4">
        <img class="aspect-square max-w-16 rounded-lg" :src="item.imgUrl" alt="cart order preview">
        <div class="flex flex-col justify-center gap-1 self-stretch ">
            <p class="font-bold uppercase">{{ item.name }}</p>
            <p class=" text-sm font-bold uppercase text-black/50">$ {{ item.price }}</p>
        </div>
        <slot>
            <OrderCounter v-model:order-count="orderCount" class=" h-min w-fit self-center justify-self-end " />
        </slot>
    </div>

</template>
