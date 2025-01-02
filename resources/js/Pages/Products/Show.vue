<script setup lang="ts">
import BackLink from '@/Components/BackLink.vue';
import ButtonLink from '@/Components/ButtonLink.vue';
import Image from '@/Components/Image.vue';
import OrderCounter from '@/Components/Order/OrderCounter.vue';
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { BaseProduct, GalleryImages, ProductImages, ProductInclusion } from '@/Lib/Types/products';
import { useCartStore } from '@/Stores/cart';
import { ref } from 'vue';


interface ShowProduct extends BaseProduct {
    product_images: ProductImages;
    gallery_images: GalleryImages
    product_inclusions: ProductInclusion[]
}

const props = defineProps<{
    product: ShowProduct
}>()

const cartStore = useCartStore()

const featureText = props.product.features.split('\n')

const orderCount = ref(1);

const addToCart = () => {
    cartStore.addToCart({
        id: props.product.id,
        name: props.product.name,
        price: props.product.price,
        quantity: orderCount.value,
        imgUrl: props.product.product_images.category.mobile
    })

    orderCount.value = 1
}
</script>

<template>
    <!-- TODO: change this make this dynamic (earphone) -->
    <MainLayout title="earphone Details">
        <!-- TODO: go back to its parent (e.g. /earphone or history stack) -->
        <BackLink />

        <div class="mx-auto grid max-w-screen-xl gap-30 pb-30 pt-6 lg:gap-40 lg:pb-40 lg:pt-14 ">
            <section class="grid gap-[5.5rem] px-6 xl:px-0">
                <!-- TODO:  extract this make it dynamic (compound component) -->

                <ProductShow :is-new="product.new" :title="product.name" :img-sources="product.product_images['main']"
                    :summary="product.description"
                    class="px-0 md:grid md:grid-cols-2 md:gap-16 md:px-0 lg:gap-30 lg:px-0"
                    inner-class="text-left self-center text-left md:px-0 ">

                    <p class="text-lg font-bold md:pb-8 md:pt-6 ">$ {{ product.price }}</p>

                    <div class="grid grid-cols-[auto,1fr] gap-4 ">
                        <OrderCounter v-model:order-count="orderCount" />

                        <!-- FIX:  will send event to add cart to pinia or something-->
                        <button @click="addToCart"
                            class=" w-fit bg-coral px-8 py-4 text-xs font-bold uppercase text-white transition-colors duration-300 hocus-visible:bg-coral-light lg:ml-0">Add
                            to Cart</button>
                    </div>
                </ProductShow>

                <div class="contents lg:grid lg:grid-cols-2 lg:gap-32">

                    <section class="flex flex-col gap-6 lg:gap-8">
                        <h3 class="text-2xl font-bold uppercase md:text-3xl ">Features</h3>

                        <div class="space-y-6 font-medium text-black/50 lg:space-y-8">
                            <p v-for="(feature, index) in featureText" :key="`${index}${feature}`">{{ feature }}</p>
                        </div>
                    </section>


                    <section
                        class="grid max-w-screen-sm gap-6 md:grid-cols-2 lg:grid-cols-1 lg:grid-rows-[auto,1fr] lg:gap-8">

                        <h3 class="text-2xl font-bold uppercase md:text-3xl">In the box</h3>

                        <ul class="grid auto-rows-min gap-2">
                            <li v-for="inclusion in product.product_inclusions" :key="inclusion.id"
                                class="flex items-center gap-6 ">
                                <p class="font-bold text-coral ">{{ inclusion.quantity }}x</p>
                                <p class="font-medium capitalize text-black/50">{{ inclusion.item_name }}</p>
                            </li>

                        </ul>
                    </section>

                </div>

                <div class="grid gap-5 md:block md:columns-2 md:space-y-5">
                    <div class="size-full break-inside-avoid">
                        <Image :img-src-mobile="product.gallery_images.first.mobile"
                            :img-src-tablet="product.gallery_images.first.tablet"
                            :img-src-desktop="product.gallery_images.first.desktop"
                            :alt="`the first item for gallery view of ${product.name}`"
                            class="size-full rounded-lg object-cover object-center " />
                    </div>

                    <div class="size-full break-inside-avoid">
                        <Image :img-src-mobile="product.gallery_images.second.mobile"
                            :img-src-tablet="product.gallery_images.second.tablet"
                            :img-src-desktop="product.gallery_images.second.desktop"
                            :alt="`the second item for gallery view of ${product.name}`"
                            class="size-full rounded-lg object-cover object-center " />
                    </div>

                    <div class=" size-full break-inside-avoid">
                        <Image :img-src-mobile="product.gallery_images.third.mobile"
                            :img-src-tablet="product.gallery_images.third.tablet"
                            :img-src-desktop="product.gallery_images.third.desktop"
                            :alt="`the third item for gallery view of ${product.name}`"
                            class="size-full rounded-lg object-cover object-center " />
                    </div>

                </div>

            </section>

            <article class="grid gap-10 px-6 text-center xl:px-0 ">
                <h3 class="text-2xl font-bold uppercase lg:text-3xl">You may also like</h3>
                <ul class="grid gap-14 md:grid-cols-3 md:gap-3 lg:gap-8">
                    <li class="flex flex-col items-center gap-8">
                        <Image img-src-mobile="/assets/shared/mobile/image-zx7-speaker.jpg"
                            img-src-tablet="/assets/shared/tablet/image-zx7-speaker.jpg"
                            img-src-desktop="/assets/shared/desktop/image-zx7-speaker.jpg" alt="black speaker"
                            class="rounded-lg md:pb-2 " />
                        <h4 class="text-2xl font-bold uppercase">zx7 speaker</h4>
                        <ButtonLink href="#" />
                    </li>

                    <li class="flex flex-col items-center gap-8">
                        <Image img-src-mobile="/assets/shared/mobile/image-xx99-mark-one-headphones.jpg"
                            img-src-tablet="/assets/shared/tablet/image-xx99-mark-one-headphones.jpg"
                            img-src-desktop="/assets/shared/desktop/image-xx99-mark-one-headphones.jpg"
                            alt="black speaker" class="rounded-lg md:pb-2  " />
                        <h4 class="text-2xl font-bold uppercase">xx99 mark I</h4>
                        <ButtonLink href="#" />
                    </li>

                    <li class="flex flex-col items-center gap-8">
                        <Image img-src-mobile="/assets/shared/mobile/image-xx59-headphones.jpg"
                            img-src-tablet="/assets/shared/tablet/image-xx59-headphones.jpg"
                            img-src-desktop="/assets/shared/desktop/image-xx59-headphones.jpg" alt="black speaker"
                            class="rounded-lg md:pb-2 " />
                        <h4 class="text-2xl font-bold uppercase">xx59</h4>
                        <ButtonLink href="#" />
                    </li>
                </ul>
            </article>

            <ProductNav class="pt-14" />

            <ProductArticle />
        </div>
    </MainLayout>
</template>
