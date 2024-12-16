<script setup lang="ts">
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import SectionHeader from '@/Components/Products/SectionHeader.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
  <MainLayout title="Speakers">
    <SectionHeader>Earphones</SectionHeader>

    <section class="mx-auto grid size-full max-w-screen-2xl justify-items-center gap-30 pb-30 pt-16">
      <ProductShow
        is-new
        img-src-mobile="/assets/product-yx1-earphones/mobile/image-category-page-preview.jpg"
        img-src-tablet="/assets/product-yx1-earphones/tablet/image-category-page-preview.jpg"
        img-src-desktop="/assets/product-yx1-earphones/desktop/image-category-page-preview.jpg"
        title="YX1 WIRELESS EARPHONES"
        summary="Tailor your listening experience with bespoke dynamic drivers from the new YX1 Wireless Earphones. Enjoy incredible high-fidelity sound even in noisy environments with its active noise cancellation feature."
      />

      <ProductNav />

      <ProductArticle />
    </section>
  </MainLayout>
</template>
