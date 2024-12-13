<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import ProductCategoryGrid from '@/Components/Products/ProductCategoryGrid.vue';
import ButtonLink from '@/Components/ButtonLink.vue';

</script>

<template>
    <MainLayout title="Home">
        <div class="text-center grid gap-30 pb-30 md:gap-24 md:pb-24">

            <section class="relative w-full h-[600px] md:h-[729px] grid content-center gap-4 ">

                <img class="-z-10 absolute size-full object-center object-cover "
                    src="/assets/home/tablet/image-header.jpg" alt="Black HeadPhone" />
                <img class="hidden -z-10 absolute size-full object-right object-cover "
                    src="/assets/home/desktop/image-hero.jpg" alt="Black HeadPhone" />

                <div class="flex flex-col justify-center max-w-sm md:max-w-md mx-auto items-center gap-4 ">
                    <h1 class="text-white/50 text-sm tracking-[0.625em] ">NEW PRODUCT</h1>
                    <h2 class="text-4xl md:leading-none md:text-[3.5rem] text-white">XX99 MARK II HEADPHONES</h2>
                    <p class="text-white/75 py-2 px-6 font-medium">Experience natural, lifelike audio and exceptional
                        build
                        quality made
                        for
                        the
                        passionate music enthusiast
                    </p>
                </div>

                <ButtonLink href="/" />
            </section>

            <section :class='[" text-center gap-16 flex flex-col px-6 ",
                "md:flex-row md:gap-[.6rem] md:justify-between md:px-10 "
            ]'>
                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-headphones.png"
                    title="Headphones" href="#" />

                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-speakers.png"
                    title="Speakers" href="#" />

                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-earphones.png"
                    title="Earphones" href="#" />
            </section>

            <section class="grid gap-6 px-6 md:gap-8 md:px-10">
                <section
                    :class='["rounded-lg py-14 px-6 grid content-center relative overflow-hidden gap-6 bg-coral isolate", "md:gap-16 md:py-[3.3rem]"]'>
                    <div class="grid place-items-center ">
                        <img :class='["absolute scale-[1.70] [grid-area:1/1] -z-10  ", "md:max-w-lg md:scale-[1.9]"]'
                            src="/assets/home/desktop/pattern-circles.svg" role="decoration" />
                        <img class=" w-[60%] [grid-area:1/1] md:max-w-48  max-w-56 "
                            src="/assets/home/mobile/image-speaker-zx9.png" alt="black and white speaker">
                    </div>
                    <div class="flex flex-col relative items-center justify-center gap-6 max-w-[349px] mx-auto  ">
                        <h3
                            :class='["mt-2 uppercase font-bold text-white text-4xl max-w-[10ch]", "md:leading-none md:text-[3.5rem] "]'>
                            zx9 speaker
                        </h3>
                        <p class="text-white/75 font-medium">Upgrade to premium speakers that are phenomenally built to
                            deliver truly
                            remarkable sound.</p>

                        <ButtonLink class="bg-black md:my-4" asLink href="#" />
                    </div>
                </section>

                <section class="grid items-center  ">
                    <img class="md:hidden [grid-area:1/1] rounded-lg  w-full"
                        src="/assets/home/mobile/image-speaker-zx7.jpg">
                    <img class="hidden md:block [grid-area:1/1] rounded-lg  w-full"
                        src="/assets/home/tablet/image-speaker-zx7.jpg">
                    <div class="[grid-area:1/1] justify-self-start pl-6  space-y-8 md:pl-16">
                        <h3 class="uppercase text-2.5-xl font-bold">zx7 speaker</h3>
                        <ButtonLink href="#" class="ml-0 border border-black bg-transparent text-black" />
                    </div>
                </section>

                <section class="w-full relative grid gap-6 md:grid-cols-2 md:gap-3">
                    <img class="md:hidden rounded-lg size-full " src="/assets/home/mobile/image-earphones-yx1.jpg"
                        role="presentation">
                    <img class="hidden md:block rounded-lg size-full " src="/assets/home/tablet/image-earphones-yx1.jpg"
                        role="presentation">

                    <div
                        class="rounded-lg py-10 px-6 bg-gray-100 flex flex-col gap-8 items-start justify-center md:items-center">
                        <h3 class="uppercase text-2.5-xl font-bold ">yx1 earphone</h3>

                        <ButtonLink href="#" class="ml-0 bg-transparent text-black border border-black" />
                    </div>
                </section>
            </section>
        </div>
    </MainLayout>
</template>
