<script setup lang="ts">
import ButtonLink from '@/Components/ButtonLink.vue';
import ProductArticle from '@/Components/Products/ProductArticle.vue';
import ProductNav from '@/Components/Products/ProductNav.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <MainLayout title="Home">
        <div class="grid  justify-items-center gap-30 pb-30 text-center md:gap-24 md:pb-24 lg:gap-30 lg:pb-30">
            <section
                class="relative grid h-[600px] w-full place-items-center gap-4 before:absolute before:-z-10 before:hidden before:size-full before:bg-[#191919] before:content-[''] md:h-[729px] before:lg:block">
                <img class="absolute -z-10 size-full object-cover object-center lg:hidden"
                    src="/assets/home/tablet/image-header.jpg" alt="Black HeadPhone">
                <img class="absolute -z-10 hidden size-full max-w-screen-2xl object-cover object-center lg:block"
                    src="/assets/home/desktop/image-hero.jpg" alt="Black HeadPhone">

                <div
                    class="mx-auto flex w-full max-w-sm flex-col items-center justify-center gap-4 md:max-w-md md:gap-6 lg:max-w-screen-xl lg:items-start lg:px-6 xl:px-0">
                    <p class="text-sm tracking-[0.625em] text-white/50">
                        NEW PRODUCT
                    </p>
                    <h1 class="text-4xl text-white md:text-[3.5rem] md:leading-none lg:w-1/2 lg:text-left">
                        XX99 MARK II HEADPHONES
                    </h1>
                    <p class="px-6 py-2 font-medium text-white/75 md:pb-4 lg:w-1/3 lg:px-0 lg:text-left">
                        Experience natural, lifelike audio and exceptional build quality
                        made for the passionate music enthusiast
                    </p>
                    <ButtonLink href="/headphone" />
                </div>
            </section>

            <ProductNav />

            <section class=" grid max-w-screen-xl  gap-6 px-6 md:gap-8 md:px-10 lg:gap-12 lg:pt-12 xl:px-0">
                <section
                    class="relative isolate grid content-center gap-6 overflow-hidden rounded-lg bg-coral px-6 py-14 md:gap-16 md:py-[3.3rem] lg:grid-cols-2">
                    <div class="grid place-items-center">
                        <img class="absolute -z-10 scale-[1.70] [grid-area:1/1] md:max-w-lg md:scale-[1.9] lg:top-0 lg:scale-150"
                            src="/assets/home/desktop/pattern-circles.svg" role="decoration">

                        <img class="w-3/5 max-w-56 [grid-area:1/1] md:max-w-48 lg:absolute lg:-bottom-2 lg:max-w-72"
                            src="/assets/home/mobile/image-speaker-zx9.png" alt="black and white speaker">
                    </div>

                    <div
                        class="relative mx-auto flex max-w-[349px] flex-col items-center justify-center gap-6 lg:items-start lg:text-left">
                        <h3
                            class="mt-2 max-w-[10ch] text-4xl font-bold uppercase text-white md:text-[3.5rem] md:leading-none">
                            zx9 speaker
                        </h3>
                        <p class="font-medium text-white/75 md:pb-4">
                            Upgrade to premium speakers that are phenomenally built to deliver
                            truly remarkable sound.
                        </p>

                        <ButtonLink
                            class="bg-black transition-colors duration-300 hocus-visible:bg-[#4c4c4c] hocus-visible:text-white md:my-4"
                            as-link href="#" />
                    </div>
                </section>

                <section class="grid items-center">

                    <img class="w-full rounded-lg [grid-area:1/1] md:hidden"
                        src="/assets/home/mobile/image-speaker-zx7.jpg">

                    <img class="hidden w-full rounded-lg [grid-area:1/1] md:block lg:hidden"
                        src="/assets/home/tablet/image-speaker-zx7.jpg">

                    <img class="hidden w-full rounded-lg [grid-area:1/1] lg:block"
                        src="/assets/home/desktop/image-speaker-zx7.jpg">

                    <div class="flex flex-col gap-8 justify-self-start pl-6 [grid-area:1/1] md:pl-16">
                        <h3 class="text-2.5-xl font-bold uppercase">
                            zx7 speaker
                        </h3>
                        <ButtonLink href="#"
                            class="ml-0 border border-black bg-transparent text-black transition-colors duration-300 hocus-visible:bg-black hocus-visible:text-white" />
                    </div>
                </section>

                <!-- FIX:   -->
                <section class="relative grid w-full gap-6 md:grid-cols-2 md:gap-3 lg:gap-8">
                    <img class="size-full rounded-lg md:hidden lg:block"
                        src="/assets/home/mobile/image-earphones-yx1.jpg" role="presentation">
                    <img class="hidden size-full rounded-lg md:block lg:hidden"
                        src="/assets/home/tablet/image-earphones-yx1.jpg" role="presentation">

                    <div
                        class="flex flex-col items-start justify-center gap-8 rounded-lg bg-gray-100 px-6 py-10 md:items-center lg:items-start lg:px-24">
                        <h3 class="text-2.5-xl font-bold uppercase">
                            yx1 earphone
                        </h3>

                        <ButtonLink href="#"
                            class=" border border-black  bg-transparent text-black transition-colors duration-300 hocus-visible:bg-black hocus-visible:text-white md:mr-0 " />
                    </div>
                </section>
            </section>

            <ProductArticle class="lg:py-20" />
        </div>
    </MainLayout>
</template>
