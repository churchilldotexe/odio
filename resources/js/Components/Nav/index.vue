<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '../Icon/ApplicationLogo.vue';
import BurgerIcon from './BurgerIcon.vue';
import Cart from '../Cart/Cart.vue';

</script>

<template>
    <nav :class='[
        "relative mx-auto flex max-w-screen-xl items-center justify-between gap-11 border-b border-neutral-600 px-6 py-8 ",
        "md:justify-start md:px-0 lg:justify-between",
    ]'>
        <!-- TODO: should be checkbox -->
        <Link href="#" class="lg:hidden" aria-label="open menu">
        <BurgerIcon class="fill-current text-gray-500" />
        </Link>


        <Link href="/" class="">
        <ApplicationLogo class="fill-current text-gray-500" />
        </Link>

        <ul
            class="absolute left-1/2 hidden -translate-x-1/2 items-center justify-between gap-8 text-sm font-bold uppercase text-white lg:flex">
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/" class="">
                home
                </Link>
            </li>
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/headphone" class="">
                headphone
                </Link>
            </li>
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/speaker" class="">
                speakers
                </Link>
            </li>
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/earphone" class="">
                earphones
                </Link>
            </li>
        </ul>

        <!-- <button @click="isMenuOpen = true" class=" md:ml-auto lg:ml-0" aria-label="open cart"> -->
        <!--     <CartIcon class="fill-current text-gray-500 hocus-visible:stroke-coral " /> -->
        <!-- </button> -->

        <Cart />

    </nav>
</template>
