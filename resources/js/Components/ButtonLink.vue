<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { twMerge } from 'tailwind-merge';

defineOptions({ inheritAttrs: false })

</script>


<template>
    <div>
        <component
            :class="twMerge(`uppercase size-full px-8 py-4 bg-coral text-white w-fit mx-auto font-bold text-xs ${$attrs.class}`)"
            :is="$attrs.href ? Link : 'button'" v-bind="$attrs">
            <slot>see product</slot>
        </component>
    </div>
</template>
