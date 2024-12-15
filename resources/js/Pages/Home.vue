<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import ProductCategoryGrid from '@/Components/Products/ProductCategoryGrid.vue';
import ButtonLink from '@/Components/ButtonLink.vue';
import ProductArticle from '@/Components/Products/ProductArticle.vue';

</script>

<template>
    <MainLayout title="Home">
        <div class="text-center grid justify-items-center gap-30 pb-30 md:gap-24 md:pb-24 lg:gap-30 lg:pb-30 ">

            <section class="relative w-full h-[600px] grid place-items-center gap-4 md:h-[729px] ">

                <div class="hidden -z-10 absolute size-full bg-[#191919] lg:block " role="decoration" />
                <img class="-z-10 absolute size-full object-center object-cover lg:hidden "
                    src="/assets/home/tablet/image-header.jpg" alt="Black HeadPhone" />
                <img class="hidden -z-10 absolute size-full object-center object-cover max-w-screen-2xl lg:block "
                    src="/assets/home/desktop/image-hero.jpg" alt="Black HeadPhone" />

                <div
                    :class='["w-full flex flex-col justify-center max-w-sm mx-auto items-center gap-4 ", "md:max-w-md md:gap-6 lg:max-w-screen-xl lg:items-start lg:px-6 xl:px-0 "]'>

                    <h1 class="text-white/50 text-sm tracking-[0.625em]">NEW PRODUCT</h1>
                    <h2 :class='["text-4xl text-white ", "md:text-[3.5rem] md:leading-none lg:w-1/2 lg:text-left"]'>
                        XX99 MARK II
                        HEADPHONES</h2>
                    <p :class='["text-white/75 py-2 px-6 font-medium ", "md:pb-4 lg:px-0 lg:text-left lg:w-1/3 "]'>
                        Experience
                        natural,
                        lifelike audio
                        and
                        exceptional
                        build
                        quality made
                        for
                        the
                        passionate music enthusiast
                    </p>
                    <ButtonLink href="/foo"
                        class=" hocus-visible:bg-coral-light lg:ml-0 transition-colors duration-300" />
                </div>

            </section>

            <section :class='[" text-center gap-16 flex flex-col px-6 max-w-screen-xl items-center w-full ",
                "md:flex-row md:gap-[.6rem] md:justify-between md:px-10 xl:px-0 lg:gap-8 "
            ]'>
                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-headphones.png"
                    title="Headphones" href="#" />

                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-speakers.png"
                    title="Speakers" href="#" />

                <ProductCategoryGrid img-src="/assets/shared/desktop/image-category-thumbnail-earphones.png"
                    title="Earphones" href="#" />
            </section>

            <section :class='[" grid gap-6 px-6 max-w-screen-xl ", "md:gap-8 md:px-10 xl:px-0 lg:gap-12 lg:pt-12 "]'>
                <section
                    :class='[
                        " rounded-lg py-14 px-6 grid content-center relative overflow-hidden gap-6 bg-coral isolate", "md:gap-16 md:py-[3.3rem] lg:grid-cols-2 "]'>
                    <div class="grid place-items-center ">

                        <img :class='["absolute scale-[1.70] [grid-area:1/1] -z-10  ",
                            "md:max-w-lg md:scale-[1.9] lg:scale-150 lg:top-0"]'
                            src="/assets/home/desktop/pattern-circles.svg" role="decoration" />

                        <img :class='[" w-[60%] [grid-area:1/1] max-w-56 ",
                            "md:max-w-48 lg:absolute lg:-bottom-2 lg:max-w-72 "]'
                            src="/assets/home/mobile/image-speaker-zx9.png" alt="black and white speaker">
                    </div>

                    <div
                        class="flex flex-col relative items-center justify-center gap-6 max-w-[349px] mx-auto lg:items-start lg:text-left">
                        <h3 :class='["mt-2 uppercase font-bold text-white text-4xl max-w-[10ch] ",
                            "md:leading-none md:text-[3.5rem] "]'>
                            zx9 speaker
                        </h3>
                        <p class="text-white/75 font-medium md:pb-4">Upgrade to premium speakers that are phenomenally
                            built to
                            deliver truly
                            remarkable sound.</p>

                        <ButtonLink
                            class="bg-black md:my-4 hocus-visible:text-white hocus-visible:bg-[#4c4c4c] transition-colors duration-300"
                            asLink href="#" />
                    </div>
                </section>

                <section class="grid items-center  ">
                    <img class=" [grid-area:1/1] rounded-lg w-full md:hidden "
                        src="/assets/home/mobile/image-speaker-zx7.jpg">

                    <img class="hidden md:block [grid-area:1/1] rounded-lg w-full lg:hidden"
                        src="/assets/home/tablet/image-speaker-zx7.jpg">

                    <img class="hidden lg:block [grid-area:1/1] rounded-lg w-full"
                        src="/assets/home/desktop/image-speaker-zx7.jpg">

                    <div class="[grid-area:1/1] justify-self-start pl-6 space-y-8 md:pl-16">
                        <h3 class="uppercase text-2.5-xl font-bold">zx7 speaker</h3>
                        <ButtonLink href="#"
                            class="ml-0 border border-black bg-transparent text-black hocus-visible:text-white hocus-visible:bg-black transition-colors duration-300" />
                    </div>
                </section>

                <section :class='["w-full relative grid gap-6 ", "md:grid-cols-2 md:gap-3 lg:gap-8"]'>
                    <img class=" rounded-lg size-full md:hidden lg:block "
                        src="/assets/home/mobile/image-earphones-yx1.jpg" role="presentation">
                    <img class="hidden md:block rounded-lg size-full lg:hidden"
                        src="/assets/home/tablet/image-earphones-yx1.jpg" role="presentation">

                    <div
                        class="rounded-lg py-10 px-6 bg-gray-100 flex flex-col gap-8 items-start justify-center md:items-center lg:items-start lg:px-24 ">

                        <h3 class="uppercase text-2.5-xl font-bold ">yx1 earphone</h3>

                        <ButtonLink href="#"
                            class="ml-0 bg-transparent text-black border border-black hocus-visible:text-white hocus-visible:bg-black transition-colors duration-300" />

                    </div>
                </section>
            </section>

            <ProductArticle class="lg:py-20 " />
        </div>
    </MainLayout>
</template>
