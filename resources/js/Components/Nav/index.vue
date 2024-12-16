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
    if (currentPath !== '/') {
        return "bg-black"
    }

    return y.value === 0 ? "bg:transparent" : "bg-[#191919]"

})

watch(y, (newY, oldY) => {

    if (newY !== oldY) {
        scrolledDown.value = oldY < newY;
    }

});


</script>

<template>
    <nav :class='[
        "px-6 py-8 gap-11 flex items-center justify-between max-w-screen-xl mx-auto relative transition-transform origin-top ",
        scrolledDown ? " scale-y-0" : "scale-y-100",
        navBg,

        "md:justify-start md:px-0 lg:justify-between",

        `before:content-[""] before:hidden before:md:block before:-z-10 before:md:scale-x-[2] before:md:size-full before:md:absolute `,
        currentPath !== `/` ? "before:bg-black" : "before:bg-[#191919]",

        `after:content-[""] after:absolute after:-z-10 after:inset-0 after:border-b after:border-neutral-600 `

    ]'>
        <!-- TODO: should be checkbox -->
        <Link href="/" class="lg:hidden" aria-label="open menu">
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
                <Link href="/headphone" class="">
                headphone
                </Link>
            </li>
            <li class="transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/speaker" class="">
                speakers
                </Link>
            </li>
            <li class=" transition-colors duration-300 hocus-visible:text-coral">
                <Link href="/earphone" class="">
                earphones
                </Link>
            </li>
        </ul>

        <Link href="#" class="md:ml-auto lg:ml-0" aria-label="open cart">
        <CartIcon class="fill-current text-gray-500" />
        </Link>
    </nav>

</template>
