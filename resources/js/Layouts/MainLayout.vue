<script setup lang="ts">
import Nav from '@/Components/Nav/index.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Footer from "@/Components/Footer/index.vue"

defineProps<{
    title: string
}>()


const currentPath = usePage().url

</script>

<template>

    <Head :title="title" />

    <div class="relative font-manrope min-h-screen flex flex-col ">
        <header class="w-full top-0 z-10 md:px-6" :class='[currentPath !== "/" ? "sticky" : "fixed"]'>
            <Nav />
        </header>

        <main class="size-full flex-1 ">
            <slot />
        </main>

        <Footer />
    </div>
</template>
