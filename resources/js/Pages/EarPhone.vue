<script setup lang="ts">
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import SectionHeader from '@/Components/SectionHeader.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <MainLayout title="Speakers">

        <SectionHeader>Earphones</SectionHeader>

        <section class="grid justify-items-center size-full max-w-screen-2xl mx-auto gap-30 pt-16 pb-30">

            <ProductShow is-new img-src-mobile="/assets/product-yx1-earphones/mobile/image-category-page-preview.jpg"
                title="YX1 WIRELESS EARPHONES"
                summary="Tailor your listening experience with bespoke dynamic drivers from the new YX1 Wireless Earphones. Enjoy incredible high-fidelity sound even in noisy environments with its active noise cancellation feature." />

            <ProductNav />

            <ProductArticle />

        </section>
    </MainLayout>
</template>
