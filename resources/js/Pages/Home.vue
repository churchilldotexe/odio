<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import ProductCategoryGrid from '@/Components/Products/ProductCategoryGrid.vue';
import ButtonLink from '@/Components/ButtonLink.vue';

</script>

<template>
    <MainLayout title="Home">
        <div class="text-center grid gap-y-30 pb-30 ">

            <section class="relative w-full h-[600px] flex flex-col justify-center items-center gap-4 ">

                <img class="-z-10 absolute size-full object-center object-cover "
                    src="/assets/home/mobile/image-header.jpg" alt="Black HeadPhone" />

                <h1 class="text-white/50 text-sm tracking-[0.625em] ">NEW PRODUCT</h1>
                <h2 class="text-4xl text-white">XX99 MARK II HEADPHONES</h2>
                <p class="text-white/75 py-2 px-6 font-medium">Experience natural, lifelike audio and exceptional build
                    quality made
                    for
                    the
                    passionate music enthusiast
                </p>

                <ButtonLink href="/" />
            </section>

            <section class=" text-center gap-16 flex flex-col px-6">
                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-headphones.png"
                    title="Headphones" href="#" />

                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-speakers.png"
                    title="Speakers" href="#" />

                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-earphones.png"
                    title="Earphones" href="#" />
            </section>

            <section class="grid gap-6 px-6">
                <section
                    class="rounded-lg py-14 px-6 flex flex-col relative items-center overflow-hidden justify-center gap-6  bg-coral isolate">
                    <div class="grid place-items-center ">
                        <img class="absolute scale-[1.70] [grid-area:1/1] "
                            src="/assets/home/desktop/pattern-circles.svg" role="decoration" />
                        <img class=" w-2/3 [grid-area:1/1] " src="/assets/home/mobile/image-speaker-zx9.png"
                            alt="black and white speaker">
                    </div>
                    <h3 class="mt-2 uppercase font-bold text-white text-4xl max-w-[10ch]">zx9 speaker</h3>
                    <p class="text-white/75 font-medium">Upgrade to premium speakers that are phenomenally built to
                        deliver truly
                        remarkable sound.</p>

                    <ButtonLink class="bg-black" asLink href="#" />
                </section>

                <section class="grid items-center">
                    <img class="[grid-area:1/1] rounded-lg " src="/assets/home/mobile/image-speaker-zx7.jpg">
                    <div class="[grid-area:1/1] justify-self-start pl-6  space-y-8 ">
                        <h3 class="uppercase text-2.5-xl font-bold">zx7 speaker</h3>
                        <ButtonLink href="#" class="ml-0 border border-black bg-transparent text-black" />
                    </div>
                </section>

                <section class="w-full flex flex-col gap-6 relative">
                    <img class="rounded-lg " src="/assets/home/mobile/image-earphones-yx1.jpg" role="presentation">

                    <div class="py-10 px-6 bg-gray-100 flex flex-col gap-8 items-start justify-center">
                        <h3 class="uppercase text-2.5-xl font-bold">yx1 earphone</h3>

                        <ButtonLink href="#" class="ml-0 bg-transparent text-black border border-black" />
                    </div>
                </section>
            </section>
        </div>
    </MainLayout>
</template>
