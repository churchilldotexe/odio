<script setup lang="ts">
import ProductArticle from '@/Components/Products/ProductArticle.vue'
import ProductNav from '@/Components/Products/ProductNav.vue'
import ProductShow from '@/Components/Products/ProductShow.vue'
import SectionHeader from '@/Components/Products/SectionHeader.vue'
import MainLayout from '@/Layouts/MainLayout.vue'
</script>

<template>
  <MainLayout title="Speakers">
    <SectionHeader>Speakers</SectionHeader>

    <section
      class="mx-auto grid size-full max-w-screen-2xl justify-items-center gap-30 pb-30 pt-16"
    >
      <!-- <img src="/public/assets/shared/mobile/image-zx7-speaker.jpg" alt=""> -->

      <ProductShow
        is-new
        img-src-mobile="/assets/shared/tablet/image-zx9-speaker.jpg"
        img-src-tablet="/assets/shared/tablet/image-zx9-speaker.jpg"
        img-src-desktop="/assets/shared/desktop/image-zx9-speaker.jpg"
        title="ZX9 speaker"
        summary="Upgrade your sound system with the all new ZX9 active speaker. It’s a bookshelf speaker system that offers truly wireless connectivity -- creating new possibilities for more pleasing and practical audio setups."
      />

      <ProductShow
        img-src-mobile="/assets/shared/tablet/image-zx7-speaker.jpg"
        img-src-tablet="/assets/shared/tablet/image-zx7-speaker.jpg"
        img-src-desktop="/assets/shared/desktop/image-zx7-speaker.jpg"
        title="ZX7 SPEAKER"
        summary="Stream high quality sound wirelessly with minimal loss. The ZX7 bookshelf speaker uses high-end audiophile components that represents the top of the line powered speakers for home or studio use."
      />

      <ProductShow
        img-src-mobile="/assets/shared/desktop/image-xx59-headphones.jpg"
        img-src-tablet="/assets/shared/tablet/image-xx59-headphones.jpg"
        img-src-desktop="/assets/shared/mobile/image-xx59-headphones.jpg"
        title="XX59 Headphones"
        summary="Enjoy your audio almost anywhere and customize it to your specific tastes with the XX59 headphones. The stylish yet durable versatile wireless headset is a brilliant companion at home or on the move."
      />

      <ProductNav />

      <ProductArticle />
    </section>
  </MainLayout>
</template>
