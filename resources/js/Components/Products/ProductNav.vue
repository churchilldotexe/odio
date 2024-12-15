<script setup lang="ts">
import ProductCategoryGrid from './ProductCategoryGrid.vue';
</script>

<template>
    <section :class='[" text-center gap-16 flex flex-col px-6 max-w-screen-xl items-center w-full ",
        "md:flex-row md:gap-[.6rem] md:justify-between md:px-10 xl:px-0 lg:gap-8 "
    ]'>
        <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-headphones.png" title="Headphones"
            href="#" />

        <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-speakers.png" title="Speakers"
            href="#" />

        <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-earphones.png" title="Earphones"
            href="#" />
    </section>
</template>
