<script setup lang="ts">
import { computed } from 'vue';
import OrderCounter from '@/Components/Order/OrderCounter.vue';
import { Cart } from '@/Stores/cart';
import { transformToCurrency } from '@/Lib/utils/currency';

const props = defineProps<{
    item: Cart
    updateQuantity?: ({ id, quantity }: { id: number, quantity: number }) => void
    deleteItem?: (id: number) => void
}>()

const orderCount = computed({
    get: () => props.item.quantity,

    set: (newValue) => {
        const difference = newValue - props.item.quantity

        // will only be used if slot is not define
        if (props.updateQuantity) {
            props.updateQuantity({ quantity: difference, id: props.item.id })
        }
        if (newValue <= 0) {
            if (props.deleteItem) {
                props.deleteItem(props.item.id)
            }
            console.log(newValue, 'cart counter diff');

        }

    }
})


</script>

<template>
    <div class="grid grid-cols-[auto,1fr,1fr] gap-4">
        <img class="aspect-square max-w-16 rounded-lg" :src="item.imgUrl" alt="cart order preview">
        <div class="flex flex-col justify-center gap-1 self-stretch ">
            <p class="font-bold uppercase">{{ item.name }}</p>
            <p class=" text-sm font-bold uppercase text-black/50">{{ transformToCurrency(item.price) }}</p>
        </div>
        <slot>
            <OrderCounter v-model:order-count="orderCount" class=" h-min w-fit self-center justify-self-end " />
        </slot>
    </div>

</template>
