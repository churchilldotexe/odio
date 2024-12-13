<script setup lang="ts">

import FacebookIcon from '@/Components/Footer/FacebookIcon.vue';
import InstagramIcon from '@/Components/Footer/InstagramIcon.vue';
import TwitterIcon from '@/Components/Footer/TwitterIcon.vue';
import ApplicationLogo from '@/Components/Icon/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const curentYear = computed(() => (new Date().getFullYear()))
</script>

<template>

    <footer class="space-y-30 md:space-y-24 ">
        <section class="px-6 space-y-10 space-y-16 md:px-10">
            <img class="rounded-lg w-full md:hidden" src="/assets/shared/mobile/image-best-gear.jpg"
                alt="a guy with a headset">
            <img class="hidden rounded-lg w-full md:block" src="/assets/shared/tablet/image-best-gear.jpg"
                alt="a guy with a headset">
            <div class="space-y-8 md:px-14">
                <h3
                    class="uppercase font-bold text-2.5-xl text-center max-w-[15ch] mx-auto md:text-4xl md:max-w-[20ch]  ">
                    Bringing
                    you
                    the <strong class=" text-coral">best</strong> audio
                    gear</h3>

                <p class="font-medium text-black/50 md:text-center">Located at the heart of New York City, Audiophile is
                    the
                    premier store for
                    high end headphones,
                    earphones, speakers, and audio accessories. We have a large showroom and luxury
                    demonstration
                    rooms available for you to browse and experience a wide range of our products. Stop by our
                    store
                    to meet some of the fantastic people who make Audiophile the best place to buy your portable
                    audio equipment.</p>
            </div>
        </section>

        <section
            class="bg-black text-center flex flex-col justify-center items-center gap-12 pb-10 md:items-start md:px-10 md:gap-8 ">
            <div class="h-1 w-[6.5rem] bg-coral mb-7 " />

            <ApplicationLogo />

            <nav class="flex flex-col gap-4 md:flex-row " aria-label="footer navigation">
                <Link class="uppercase text-sm font-bold text-white" href="#">home</Link>
                <Link class="uppercase text-sm font-bold text-white" href="#">headphones</Link>
                <Link class="uppercase text-sm font-bold text-white" href="#">speaker</Link>
                <Link class="uppercase text-sm font-bold text-white" href="#">earphones</Link>
            </nav>

            <p class="text-white/50 px-6 text-center font-medium  md:text-left md:px-0 ">
                Audiophile is an all in one stop to fulfill your audio needs. We're a small team of music lovers and
                sound specialists who are devoted to helping you get the most out of personal audio. Come and visit
                our demo facility - we’re open 7 days a week.
            </p>

            <div
                class="w-full flex flex-col items-center justify-center gap-12 md:flex-row md:justify-between md:pt-12">
                <p class="text-white/50 px-6 text-center font-bold md:px-0">Copyright {{ curentYear }}. All Rights
                    Reserved
                </p>

                <div class="flex justify-center items-center gap-4">
                    <FacebookIcon />
                    <TwitterIcon />
                    <InstagramIcon />
                </div>
            </div>
        </section>
    </footer>

</template>
