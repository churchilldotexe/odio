<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import BurgerIcon from './BurgerIcon.vue';
import CartIcon from './CartIcon.vue';
import ApplicationLogo from '../Icon/ApplicationLogo.vue';
import { usePage } from '@inertiajs/vue3'
import { useScroll } from '@/Composables/useScroll';
import { computed, ref, watch } from 'vue';

const currentPath = usePage().url
const { y } = useScroll()
const scrolledDown = ref<boolean>(false);

const navBg = computed(() => {
    return currentPath !== '/' ? 'bg-black' : 'bg-[#191919]'
})

watch(y, (newY, oldY) => {

    if (oldY > newY) {
        scrolledDown.value = false;
    } else {
        scrolledDown.value = true;
    }
});


</script>

<template>
    <nav :class='[
        "px-6 py-8 gap-11 border-b border-neutral-600 flex items-center justify-between max-w-screen-xl mx-auto relative transition-transform origin-top ",
        scrolledDown ? " scale-y-0" : "scale-y-100",
        "bg-transparent",
        y === 0 ? "bg:transparent" : navBg,

        "md:justify-start md:px-0 lg:justify-between",
        `before:lg:content-[" "] before:lg:-z-10 before:lg:scale-x-[2] before:lg:size-full before:lg:absolute `,
        currentPath !== `/` ? "before:bg-black" : "before:bg-[#191919]"
    ]'>
        <!-- TODO: should be checkbox -->
        <Link href="/" class="lg:hidden">
        <BurgerIcon class="fill-current text-gray-500" />
        </Link>

        <Link href="/" class="">
        <ApplicationLogo class="fill-current text-gray-500" />
        </Link>

        <ul
            class="hidden absolute -translate-x-1/2 left-1/2 text-white uppercase font-bold text-sm lg:flex items-center justify-between gap-8 ">
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/" class="">
                home
                </Link>
            </li>
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/" class="">
                headphone
                </Link>
            </li>
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/" class="">
                speakers
                </Link>
            </li>
            <li class=" transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/" class="">
                earphones
                </Link>
            </li>
        </ul>

        <Link href="#" class="md:ml-auto lg:ml-0">
        <CartIcon class="fill-current text-gray-500" />
        </Link>
    </nav>

</template>
