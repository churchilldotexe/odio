<script setup lang="ts">
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <MainLayout title="Speakers">

        <SectionHeader>headphones </SectionHeader>

        <section class="grid justify-items-center size-full max-w-screen-2xl mx-auto gap-30 pt-16 pb-30">

            <ProductShow is-new img-src-mobile="/assets/shared/desktop/image-xx99-mark-two-headphones.jpg"
                title="XX99 mark II headphones"
                summary="The new XX99 Mark II headphones is the pinnacle of pristine audio. It redefines your premium headphone experience by reproducing the balanced depth and precision of studio-quality sound." />

            <ProductShow img-src-mobile="/assets/shared/desktop/image-xx99-mark-one-headphones.jpg"
                title="XX99 Mark I Headphones"
                summary="As the gold standard for headphones, the classic XX99 Mark I offers detailed and accurate audio reproduction for audiophiles, mixing engineers, and music aficionados alike in studios and on the go." />


            <ProductShow img-src-mobile="/assets/shared/desktop/image-xx59-headphones.jpg" title="XX59 Headphones"
                summary="Enjoy your audio almost anywhere and customize it to your specific tastes with the XX59 headphones. The stylish yet durable versatile wireless headset is a brilliant companion at home or on the move." />

            <ProductNav />

            <ProductArticle />

        </section>
    </MainLayout>
</template>
