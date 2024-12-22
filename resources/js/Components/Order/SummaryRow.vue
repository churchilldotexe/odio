<script setup lang="ts">
import { twMerge } from 'tailwind-merge';


defineProps<{
    label: string
    value: string
    valueClass?: string
}>()



</script>
<template>
    <div class="flex items-center justify-between">
        <p class="font-medium uppercase text-black/50">{{ label }}</p>
        <p :class="[twMerge(`text-lg font-bold ${valueClass}`)]">${{ value }}</p>
    </div>
</template>
