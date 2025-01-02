<script setup lang="ts">
import { ref, watch } from 'vue';
import OrderCounter from '@/Components/Order/OrderCounter.vue';

const props = defineProps<{
    itemId: number
    itemImgUrl: string
    itemName: string
    itemPrice: number
    itemQuantity: number
    updateQuantity: ({ id, quantity }: { id: number, quantity: number }) => void
}>()

const orderCount = ref(props.itemQuantity)

watch(orderCount, (newCount) => {
    props.updateQuantity({ id: props.itemId, quantity: newCount })
})

</script>

<template>
    <div class="grid grid-cols-[auto,1fr,1fr] gap-4">
        <img class="aspect-square max-w-16 rounded-lg" :src="itemImgUrl" alt="cart order preview">
        <div class="flex flex-col justify-center gap-1 self-stretch ">
            <p class="font-bold uppercase">{{ itemName }}</p>
            <p class=" text-sm font-bold uppercase text-black/50">{{ itemPrice }}</p>
        </div>
        <slot>
            <OrderCounter v-model:order-count="orderCount" class=" h-min w-fit self-center justify-self-end " />
        </slot>
    </div>

</template>
