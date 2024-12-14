<script setup lang="ts">
import ArrowIcon from '@/Components/Icon/ArrowIcon.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    imgSrc: string
    title: string
    href: string
}>()

</script>

<template>
    <section class="bg-gray-100 w-full pb-6 pt-[5.5rem] relative rounded-lg ">
        <img class="w-1/2 md:w-2/3 max-w-44 mx-auto absolute top-0 -translate-y-1/3 -translate-x-1/2 left-1/2"
            :src="imgSrc" :alt="`${title} Product Category`" />

        <div class="space-y-4">
            <h3 class="uppercase font-bold">{{ title }}</h3>
            <Link :href="href"
                class=" w-fit mx-auto uppercase text-sm flex text-black/50 gap-2 items-center justify-center font-bold hocus-visible:text-coral">
            shop
            <span>
                <ArrowIcon />
            </span>
            </Link>
        </div>
    </section>
</template>
