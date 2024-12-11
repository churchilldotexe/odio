<script setup lang="ts">
import Nav from '@/Components/Nav/index.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    title: string
}>()


</script>

<template>

    <Head :title="title" />

    <div class="flex min-h-screen flex-col items-center sm:justify-center sm:pt-0 ">
        <header class="w-full">
            <Nav />
        </header>

        <main class=" flex-1 size-full overflow-hidden sm:max-w-md sm:rounded-lg  ">
            <slot />
        </main>
    </div>
</template>
