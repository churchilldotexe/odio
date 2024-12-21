<script setup lang="ts">
import { ref } from 'vue';


const orderAmnt = ref<number>(1)

const increment = () => {
    orderAmnt.value++
}

const decrement = () => {
    if (orderAmnt.value > 0) {
        orderAmnt.value--
    }
}
</script>
<template>
    <div class="grid h-full w-fit max-w-32 grid-cols-[.75fr,1fr,.75fr] ">
        <button
            class=" bg-gray-100 text-sm font-bold text-black/25 disabled:cursor-not-allowed hocus-visible:text-coral hocus-visible:disabled:text-black/25"
            @click="decrement" :disabled="orderAmnt <= 0">
            &minus;
        </button>
        <input class="pointer-events-none w-full appearance-none border-none bg-gray-100 text-center text-sm font-bold"
            type="number" min="0" v-model="orderAmnt" readonly>
        <button
            class=" bg-gray-100 text-sm font-bold text-black/25 disabled:cursor-not-allowed hocus-visible:text-coral "
            @click="increment">
            &plus;
        </button>
    </div>
</template>

<style>
/* Remove spinners in Webkit browsers */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Remove spinner in Firefox */
input[type="number"] {
    -moz-appearance: textfield;
    appearance: textfield;
}
</style>
