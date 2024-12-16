<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';

withDefaults(

  defineProps<{
    isNew?: boolean;
  }>(),
  { isNew: true } // change later
);
</script>

<template>
  <!-- TODO: change this make this dynamic (earphone) -->
  <MainLayout title="earphone Details">
    <!-- TODO: go back to its parent (e.g. /earphone or history stack) -->

    <!-- <div class=" grid justify-items-center gap-30 pb-30 text-center md:gap-24 md:pb-24 lg:gap-30 lg:pb-30"> -->
    <div class="grid justify-items-center px-6">
      <Link href="/" class="font-medium capitalize text-black/50">
        go back
      </Link>

      <section>
        <img src="/assets/product-zx9-speaker/mobile/image-product.jpg" alt="black speaker with white woofer">

        <p v-show="isNew" class="text-sm tracking-[0.625em] text-coral">
          NEW PRODUCT
        </p>
      </section>
    </div>
  </MainLayout>
</template>
