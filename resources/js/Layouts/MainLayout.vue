<script setup lang="ts">
import Footer from '@/Components/Footer/index.vue'
import Nav from '@/Components/Nav/index.vue'
import { Head, usePage } from '@inertiajs/vue3'

defineProps<{
  title: string
}>()

const currentPath = usePage().url
</script>

<template>
  <Head :title="title" />

  <div class="relative flex min-h-screen flex-col font-manrope">
    <header
      class="top-0 z-10 w-full md:px-6"
      :class="[currentPath !== '/' ? 'sticky' : 'fixed']"
    >
      <Nav />
    </header>

    <main class="size-full flex-1">
      <slot />
    </main>

    <Footer />
  </div>
</template>
