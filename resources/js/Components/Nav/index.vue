<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import BurgerIcon from './BurgerIcon.vue';
import CartIcon from './CartIcon.vue';
import ApplicationLogo from './ApplicationLogo.vue';

</script>

<template>
    <nav class="px-6 py-8 border-b border-neutral-600 flex items-center justify-between ">
        <Link href="/">
        <BurgerIcon class="fill-current text-gray-500" />
        </Link>

        <Link href="#" class="">
        <ApplicationLogo class="fill-current text-gray-500" />
        </Link>

        <Link href="#">
        <CartIcon class="fill-current text-gray-500" />
        </Link>
    </nav>

</template>
