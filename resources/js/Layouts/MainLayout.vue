<script setup lang="ts">
import Nav from '@/Components/Nav/index.vue';

defineProps<{
    title: string
}>()


</script>

<template>

    <Head :title="title" />

    <div class="flex min-h-screen flex-col items-center bg-gray-100  sm:justify-center sm:pt-0 dark:bg-gray-900">
        <header class="w-full">
            <Nav />
        </header>

        <main
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
            <slot />
        </main>
    </div>
</template>
