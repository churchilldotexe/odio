<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import BurgerIcon from './BurgerIcon.vue';
import CartIcon from './CartIcon.vue';
import ApplicationLogo from '../Icon/ApplicationLogo.vue';

</script>

<template>
    <nav class="px-6 py-8 gap-11 border-b border-neutral-600 flex items-center justify-between md:justify-start ">
        <Link href="/">
        <BurgerIcon class="fill-current text-gray-500" />
        </Link>

        <Link href="#" class="">
        <ApplicationLogo class="fill-current text-gray-500" />
        </Link>

        <Link href="#" class="md:ml-auto">
        <CartIcon class="fill-current text-gray-500" />
        </Link>
    </nav>

</template>
