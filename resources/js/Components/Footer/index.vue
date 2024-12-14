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

    <footer class="space-y-30 md:space-y-24 bg-black">

        <section :class='[
            "text-center grid place-items-center justify-center gap-12 pb-10 max-w-screen-xl mx-auto ",
            "md:place-items-start md:px-10 md:gap-8 xl:px-0 lg:grid-cols-2 lg:relative "]'>

            <div class="h-1 w-[6.5rem] bg-coral mb-7 " />

            <ApplicationLogo class="col-start-1 " />

            <nav :class='[
                "flex flex-col gap-4 ",
                "md:flex-row lg:place-self-end lg:gap-9 "]' aria-label="footer navigation">

                <Link
                    class="uppercase text-sm font-bold text-white transition-colors duration-300 hocus-visible:text-coral "
                    href="#">home</Link>
                <Link
                    class="uppercase text-sm font-bold text-white transition-colors duration-300 hocus-visible:text-coral "
                    href="#">headphones</Link>
                <Link
                    class="uppercase text-sm font-bold text-white transition-colors duration-300 hocus-visible:text-coral "
                    href="#">speaker</Link>
                <Link
                    class="uppercase text-sm font-bold text-white transition-colors duration-300 hocus-visible:text-coral "
                    href="#">earphones</Link>
            </nav>

            <p class="text-white/50 px-6 text-center font-medium  md:text-left md:px-0">
                Audiophile is an all in one stop to fulfill your audio needs. We're a small team of music lovers and
                sound specialists who are devoted to helping you get the most out of personal audio. Come and visit
                our demo facility - we’re open 7 days a week.
            </p>

            <div :class='[
                " w-full flex flex-col items-center justify-center gap-12 ",
                "md:flex-row md:justify-between md:pt-12 lg:col-span-2 "]'>

                <p class="text-white/50 px-6 text-center font-bold md:px-0">Copyright {{ curentYear }}. All Rights
                    Reserved
                </p>

                <div
                    class="flex justify-center items-center gap-4 lg:absolute lg:right-0 lg:top-[60%] lg:-translate-y-[40%] lg:px-10 xl:px-0">

                    <Link href="#">
                    <FacebookIcon />
                    </Link>

                    <Link href="#">
                    <TwitterIcon />
                    </Link>

                    <Link href="#">
                    <InstagramIcon />
                    </Link>
                </div>
            </div>
        </section>

    </footer>

</template>
