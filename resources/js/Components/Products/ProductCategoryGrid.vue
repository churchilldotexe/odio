<script setup lang="ts">
import ArrowIcon from '@/Components/Icon/ArrowIcon.vue'
import { Link } from '@inertiajs/vue3'

defineProps<{
  imgSrc: string
  title: string
  href: string
}>()
</script>

<template>
  <section class="relative w-full rounded-lg bg-gray-100 pb-6 pt-[5.5rem]">
    <img
      class="absolute left-1/2 top-0 mx-auto w-1/2 max-w-44 -translate-x-1/2 -translate-y-1/3 md:w-2/3"
      :src="imgSrc"
      :alt="`${title} Product Category`"
    >

    <div class="space-y-4">
      <h3 class="font-bold uppercase">
        {{ title }}
      </h3>
      <Link
        :href="href"
        class="mx-auto flex w-fit items-center justify-center gap-2 text-sm font-bold uppercase text-black/50 transition-colors duration-300 hocus-visible:text-coral"
      >
        shop
        <span>
          <ArrowIcon />
        </span>
      </Link>
    </div>
  </section>
</template>
