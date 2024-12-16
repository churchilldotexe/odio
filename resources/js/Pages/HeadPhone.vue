<script setup lang="ts">
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import SectionHeader from '@/Components/Products/SectionHeader.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
  <MainLayout title="Speakers">
    <SectionHeader>headphones </SectionHeader>

    <section class="mx-auto grid size-full max-w-screen-2xl justify-items-center gap-30 pb-30 pt-16 md:py-30">
      <!-- TODO: for desktop view it has reverse order prop ..
                        when mapping the reverse prop is for the odd index(e.g. 1,3,5) -->

      <ProductShow
        is-new
        img-src-mobile="/assets/shared/desktop/image-xx99-mark-two-headphones.jpg"
        img-src-tablet="/assets/shared/mobile/image-xx99-mark-two-headphones.jpg"
        img-src-desktop="/assets/shared/desktop/image-xx99-mark-two-headphones.jpg"
        title="XX99 mark II headphones"
        summary="The new XX99 Mark II headphones is the pinnacle of pristine audio. It redefines your premium headphone experience by reproducing the balanced depth and precision of studio-quality sound."
      />

      <ProductShow
        reverse
        img-src-mobile="/assets/shared/desktop/image-xx99-mark-one-headphones.jpg"
        img-src-tablet="/assets/shared/mobile/image-xx99-mark-one-headphones.jpg"
        img-src-desktop="/assets/shared/desktop/image-xx99-mark-one-headphones.jpg"
        title="XX99 Mark I Headphones"
        summary="As the gold standard for headphones, the classic XX99 Mark I offers detailed and accurate audio reproduction for audiophiles, mixing engineers, and music aficionados alike in studios and on the go."
      />

      <ProductShow
        img-src-mobile="/assets/shared/desktop/image-xx59-headphones.jpg"
        img-src-tablet="/assets/shared/mobile/image-xx59-headphones.jpg"
        img-src-desktop="/assets/shared/desktop/image-xx59-headphones.jpg"
        title="XX59 Headphones"
        summary="Enjoy your audio almost anywhere and customize it to your specific tastes with the XX59 headphones. The stylish yet durable versatile wireless headset is a brilliant companion at home or on the move."
      />

      <ProductNav class="pt-14" />

      <ProductArticle />
    </section>
  </MainLayout>
</template>
