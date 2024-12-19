<script setup lang="ts">import ButtonLink from '@/Components/ButtonLink.vue'; import Image from '@/Components/Image.vue';
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import ProductShow from '@/Components/Products/ProductShow.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const orderAmnt = ref(1)

const increment = () => {
    orderAmnt.value++
}

const decrement = () => {
    if (orderAmnt.value > 0) {
        orderAmnt.value--
    }
}

</script>

<template>
    <!-- TODO: change this make this dynamic (earphone) -->
    <MainLayout title="earphone Details">
        <!-- TODO: go back to its parent (e.g. /earphone or history stack) -->
        <div
            class="mx-auto max-w-screen-xl px-6 pt-6 font-medium capitalize text-black/50 hocus-visible:text-black md:pt-8 lg:pt-20 xl:px-0">
            <Link href="/">
            go back
            </Link>
        </div>
        <div class="mx-auto grid max-w-screen-xl gap-30 pb-30 pt-6 lg:gap-40 lg:pb-40 lg:pt-14 ">
            <section class="grid gap-[5.5rem] px-6 xl:px-0">
                <!-- TODO:  extract this make it dynamic (compound component) -->
                <ProductShow is-new title="ZX9 SPEAKER"
                    img-src-mobile="/assets/product-zx9-speaker/mobile/image-product.jpg"
                    img-src-tablet="/assets/product-zx9-speaker/tablet/image-product.jpg"
                    img-src-desktop="/assets/product-zx9-speaker/desktop/image-product.jpg"
                    summary="Upgrade your sound system with the all new ZX9 active speaker. It’s a bookshelf speaker system that offers truly wireless connectivity -- creating new possibilities for more pleasing and practical audio setups."
                    class="px-0 md:grid md:grid-cols-2 md:gap-16 md:px-0 lg:gap-30 lg:px-0"
                    inner-class="text-left self-center text-left md:px-0 ">

                    <p class="text-lg font-bold md:pb-8 md:pt-6 ">$4,500</p>

                    <div class=" grid grid-cols-[auto,1fr] gap-4 ">
                        <div class="grid h-full w-fit max-w-30 grid-cols-3 ">
                            <button
                                class=" bg-gray-100 text-sm font-bold text-black/25 disabled:cursor-not-allowed hocus-visible:text-coral hocus-visible:disabled:text-black/25"
                                @click="decrement" :disabled="orderAmnt <= 0">
                                &minus;
                            </button>
                            <input
                                class=" pointer-events-none appearance-none border-none bg-gray-100 text-center text-sm font-bold"
                                type="number" min="0" placeholder="0" v-model="orderAmnt" readonly>
                            <button
                                class=" bg-gray-100 text-sm font-bold text-black/25 disabled:cursor-not-allowed hocus-visible:text-coral "
                                @click="increment">
                                &plus;
                            </button>
                        </div>

                        <ButtonLink class="" href="#">Add to cart</ButtonLink>
                    </div>
                </ProductShow>

                <div class="contents lg:grid lg:grid-cols-2 lg:gap-32">

                    <section class="flex flex-col gap-6 lg:gap-8">
                        <h3 class="text-2xl font-bold uppercase md:text-3xl ">Features</h3>
                        <p class="font-medium text-black/50">
                            Featuring a genuine leather head strap and premium earcups, these headphones deliver
                            superior
                            comfort for those who like to enjoy endless listening. It includes intuitive controls
                            designed
                            for
                            any situation. Whether you’re taking a business call or just in your own personal space, the
                            auto
                            on/off and pause features ensure that you’ll never miss a beat.
                            <br>
                            <br>
                            The advanced Active Noise Cancellation with built-in equalizer allow you to experience your
                            audio
                            world on your terms. It lets you enjoy your audio in peace, but quickly interact with your
                            surroundings when you need to. Combined with Bluetooth 5. 0 compliant connectivity and 17
                            hour
                            battery life, the XX99 Mark II headphones gives you superior sound, cutting-edge technology,
                            and
                            a
                            modern design aesthetic.
                        </p>
                    </section>

                    <section
                        class="grid max-w-screen-sm gap-6 md:grid-cols-2 lg:grid-cols-1 lg:grid-rows-[auto,1fr] lg:gap-8">
                        <h3 class="text-2xl font-bold uppercase md:text-3xl">In the box</h3>
                        <ul class="grid auto-rows-min gap-2">
                            <li class="flex items-center gap-6 ">
                                <p class="font-bold text-coral ">1x</p>
                                <p class="font-medium capitalize text-black/50">Headphone unit</p>
                            </li>

                            <li class="flex items-center gap-6 ">
                                <p class="font-bold text-coral ">2x</p>
                                <p class="font-medium capitalize text-black/50">Replacement Earcups</p>
                            </li>
                            <li class="flex items-center gap-6">
                                <p class="font-bold text-coral ">1x</p>
                                <p class="font-medium capitalize text-black/50">User Manual</p>
                            </li>
                            <li class="flex items-center gap-6">
                                <p class="font-bold text-coral ">1x</p>
                                <p class="font-medium capitalize text-black/50">3.5mm 5m Audio Cable</p>
                            </li>
                            <li class="flex items-center gap-6">
                                <p class="font-bold text-coral ">1x</p>
                                <p class="font-medium capitalize text-black/50">Travel Bag</p>
                            </li>
                        </ul>
                    </section>

                </div>
                <!-- FIX: masonry -->
                <div class="columns-2 space-y-5 bg-red-100">

                    <Image img-src-mobile="/assets/product-zx9-speaker/mobile/image-gallery-1.jpg"
                        img-src-tablet="/assets/product-zx9-speaker/tablet/image-gallery-1.jpg"
                        img-src-desktop="/assets/product-zx9-speaker/desktop/image-gallery-1.jpg"
                        class=" rounded-lg object-cover object-center" alt="closed up speaker" />

                    <Image img-src-mobile="/assets/product-zx9-speaker/mobile/image-gallery-2.jpg"
                        img-src-tablet="/assets/product-zx9-speaker/tablet/image-gallery-2.jpg"
                        img-src-desktop="/assets/product-zx9-speaker/desktop/image-gallery-2.jpg"
                        alt="flowers books speaker" class=" rounded-lg object-cover object-center" />

                    <Image img-src-mobile="/assets/product-zx9-speaker/mobile/image-gallery-3.jpg"
                        img-src-tablet="/assets/product-zx9-speaker/tablet/image-gallery-3.jpg"
                        img-src-desktop="/assets/product-zx9-speaker/desktop/image-gallery-3.jpg"
                        class=" rounded-lg object-cover object-center" alt="two speakers" />


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


<style>
/* Remove spinners in Webkit browsers */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Remove spinner in Firefox */
input[type="number"] {
    -moz-appearance: textfield;
    appearance: textfield;
}
</style>
