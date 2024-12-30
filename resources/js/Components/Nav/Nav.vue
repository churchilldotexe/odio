<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import ApplicationLogo from '../Icon/ApplicationLogo.vue';
import BurgerIcon from './BurgerIcon.vue';
import Cart from '../Order/Cart.vue';
import { navModal } from '@/keys';
import { inject, Ref } from 'vue';


const { handleModalToggle } = inject(navModal) as {
    isModalOpen: Ref<boolean, boolean>;
    handleModalToggle: () => void;
}

const currentPath = usePage().url

const links = [
    { path: '/', name: 'home' },
    { path: '/products/headphones', name: 'headphone' },
    { path: '/products/speakers', name: 'speaker' },
    { path: '/products/earphones', name: 'earphone' }
]

</script>

<template>
    <nav :class='[
        "relative mx-auto flex max-w-screen-xl items-center justify-between gap-11 border-b border-neutral-600 px-6 py-8 ",
        "md:justify-start md:px-0 lg:justify-between",
    ]'>
        <button @click="handleModalToggle" popovertarget="top-nav-bar" class="lg:hidden" aria-label="open menu">
            <BurgerIcon class="fill-current text-gray-500" />
        </button>

        <Link href="/" class="">
        <ApplicationLogo class="fill-current text-gray-500" />
        </Link>

        <ul
            class="absolute left-1/2 hidden -translate-x-1/2 items-center justify-between gap-8 text-sm font-bold uppercase text-white lg:flex">

            <li class="transition-colors duration-300 hocus-visible:text-coral"
                :class="[currentPath === link.path && 'text-coral']" v-for="link in links" :key="link.path">
                <Link :href="link.path" class="">
                {{ link.name }}
                </Link>
            </li>
        </ul>

        <Cart />
    </nav>
</template>
