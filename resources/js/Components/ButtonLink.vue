<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { twMerge } from 'tailwind-merge';

defineOptions({ inheritAttrs: false });

defineProps<{
    href: string;
}>();
</script>

<template>
    <Link :href="href"
        :class="twMerge(` w-fit bg-coral px-8 py-4 text-xs font-bold uppercase text-white transition-colors duration-300 hocus-visible:bg-coral-light lg:ml-0 ${$attrs.class} `)">
    <slot>see product</slot>
    </Link>
</template>
