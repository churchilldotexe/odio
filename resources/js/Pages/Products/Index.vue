<script setup lang="ts">
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import SectionHeader from '@/Components/Products/SectionHeader.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { BaseProduct, ProductImages } from '@/Lib/Types/products';

interface IndexProduct extends BaseProduct {
    product_images: ProductImages;
}

const props = defineProps<{
    products: IndexProduct[]
}>()

console.log(props.products)

</script>

<template>
    <MainLayout :title="`${products[0].category} products`">

        <SectionHeader>{{ products[0].category }} </SectionHeader>

        <section class="mx-auto grid size-full max-w-screen-2xl justify-items-center gap-30 pb-30 pt-16 md:py-30 ">

            <!-- FIX : try to find out a way to prevent an image to cause layout shift -->
            <ProductShow :reverse="index % 2 !== 0" :key="product.id" v-for="( product, index ) in products"
                :href="`/products/${product.category}/${product.id}`" :is-new="product.new"
                :img-sources="product.product_images['main']" :title="product.name" :summary="product.description" />

            <ProductNav class="pt-14" />

            <ProductArticle />
        </section>
    </MainLayout>
</template>
