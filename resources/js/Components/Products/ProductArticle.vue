<script setup lang="ts">
import Image from '../Image.vue';
</script>

<template>
    <article class="grid max-w-screen-xl gap-10 px-6 md:gap-16 md:px-10 lg:grid-cols-2 lg:gap-30 xl:px-0">
        <Image img-src-mobile="/assets/shared/mobile/image-best-gear.jpg"
            img-src-tablet="/assets/shared/tablet/image-best-gear.jpg"
            img-src-desktop="/assets/shared/desktop/image-best-gear.jpg" alt="a guy with a headset"
            class="size-full rounded-lg" />

        <div class="space-y-8 md:px-14 lg:place-self-center">
            <h3
                class="mx-auto text-balance text-center text-2.5-xl font-bold uppercase md:text-pretty md:text-4xl lg:order-1 lg:max-w-none lg:text-balance lg:text-left">
                Bringing you the <strong class="text-coral">best</strong> audio gear
            </h3>

            <p class="font-medium text-black/50 md:text-center lg:text-left">
                Located at the heart of New York City, Audiophile is the premier store
                for high end headphones, earphones, speakers, and audio accessories. We
                have a large showroom and luxury demonstration rooms available for you
                to browse and experience a wide range of our products. Stop by our store
                to meet some of the fantastic people who make Audiophile the best place
                to buy your portable audio equipment.
            </p>
        </div>
    </article>
</template>
