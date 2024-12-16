<script setup lang="ts">
import ProductCategoryGrid from './ProductCategoryGrid.vue';
</script>

<template>
  <section class="flex w-full max-w-screen-xl flex-col items-center gap-16 px-6 text-center md:flex-row md:justify-between md:gap-[.6rem] md:px-10 lg:gap-8 xl:px-0">
    <ProductCategoryGrid
      img-src="/assets/shared/desktop/image-category-thumbnail-headphones.png"
      title="Headphones"
      href="#"
    />

    <ProductCategoryGrid
      img-src="/assets/shared/desktop/image-category-thumbnail-speakers.png"
      title="Speakers"
      href="#"
    />

    <ProductCategoryGrid
      img-src="/assets/shared/desktop/image-category-thumbnail-earphones.png"
      title="Earphones"
      href="#"
    />
  </section>
</template>
