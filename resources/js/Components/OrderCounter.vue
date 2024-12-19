<script setup lang="ts">
import { ref } from 'vue';


const orderAmnt = ref(1)

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
    <div class="grid h-full w-fit max-w-30 grid-cols-3 ">
        <button
            class=" bg-gray-100 text-sm font-bold text-black/25 disabled:cursor-not-allowed hocus-visible:text-coral hocus-visible:disabled:text-black/25"
            @click="decrement" :disabled="orderAmnt <= 0">
            &minus;
        </button>
        <input class=" pointer-events-none appearance-none border-none bg-gray-100 text-center text-sm font-bold"
            type="number" min="0" placeholder="0" v-model="orderAmnt" readonly>
        <button
            class=" bg-gray-100 text-sm font-bold text-black/25 disabled:cursor-not-allowed hocus-visible:text-coral "
            @click="increment">
            &plus;
        </button>
    </div>
</template>
