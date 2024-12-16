<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { twMerge } from 'tailwind-merge';

defineOptions({ inheritAttrs: false })

</script>


<!-- class=""  -->
<template>
    <div>
        <component :class="twMerge(
            `uppercase size-full px-8 py-4 bg-coral text-white w-fit mx-auto font-bold text-xs
                 hocus-visible:bg-coral-light lg:ml-0 transition-colors duration-300
                 ${$attrs.class}`)" :is="$attrs.href ? Link : 'button'" v-bind="$attrs">
            <slot>see product</slot>
        </component>
    </div>
</template>
