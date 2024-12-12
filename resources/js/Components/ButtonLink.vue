<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { twMerge } from 'tailwind-merge';

</script>


<template>
    <div :class="twMerge(` text-white bg-coral w-fit mx-auto py-4 px-8 font-bold text-xs ${$attrs.class}`)">
        <component class="uppercase" :is="$attrs.href ? Link : 'button'">
            <slot>see product</slot>
        </component>
    </div>
</template>
