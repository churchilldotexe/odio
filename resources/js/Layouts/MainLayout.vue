<script setup lang="ts">
import Nav from '@/Components/Nav/index.vue';
import { Head } from '@inertiajs/vue3';
import Footer from "@/Components/Footer/index.vue"

defineProps<{
    title: string
}>()


</script>

<template>

    <Head :title="title" />

    <div class="relative font-manrope min-h-screen">
        <header class="w-full fixed top-0 z-10 md:px-6">
            <Nav />
        </header>

        <main class="size-full">
            <slot />
        </main>

        <Footer />
    </div>
</template>
