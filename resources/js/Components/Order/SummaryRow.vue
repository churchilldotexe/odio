<script setup lang="ts">
import { transformToCurrency } from '@/Lib/utils/currency';
import { twMerge } from 'tailwind-merge';

defineProps<{
    label: string
    value: number
    valueClass?: string
}>()




</script>
<template>
    <div class="flex items-center justify-between">
        <p class="font-medium uppercase text-black/50">{{ label }}</p>
        <p :class="[twMerge(`text-lg font-bold ${valueClass}`)]">{{ transformToCurrency(value) }}</p>
    </div>
</template>
