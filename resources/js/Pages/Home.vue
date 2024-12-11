<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <MainLayout title="Home">
        <section class="pt-28 text-center">
            <img class="-z-10 fixed top-0 object-cover object-center" src="/assets/home/mobile/image-header.jpg"
                alt="Black HeadPhone" />

            <article class="space-y-4 ">
                <h1 class="text-white/50 text-sm ">NEW PRODUCT</h1>
                <h2 class="text-4xl text-white">XX99 MARK II HEADPHONES</h2>
                <p class="text-white/75 py-2 px-4">Experience natural, lifelike audio and exceptional build quality made
                    for
                    the
                    passionate music enthusiast
                </p>

                <div class="text-white bg-[#d87d4A]  w-fit mx-auto py-4 px-8 font-bold text-xs">
                    <Link href="#">SEE PRODUCT</Link>
                </div>
            </article>
        </section>
    </MainLayout>
</template>
