<script setup lang="ts">
import Footer from '@/Components/Footer/index.vue';
import TheHeader from '@/Components/TheHeader.vue';
import { Head, } from '@inertiajs/vue3';

defineProps<{
    title: string;
}>();

</script>

<template>

    <Head :title="title" />

    <div class="relative flex min-h-screen flex-col font-manrope">


        <TheHeader />

        <main class="size-full flex-1">
            <slot />
        </main>

        <Footer />
    </div>
</template>
