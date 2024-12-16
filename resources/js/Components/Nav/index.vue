<script setup lang="ts">
import { useScroll } from '@/Composables/useScroll';
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import ApplicationLogo from '../Icon/ApplicationLogo.vue';
import BurgerIcon from './BurgerIcon.vue';
import CartIcon from './CartIcon.vue';

const currentPath = usePage().url;
const { y } = useScroll();
const scrolledDown = ref<boolean>(false);

const navBg = computed(() => {
  if (currentPath !== '/') {
    return 'bg-black';
  }

  return y.value === 0 ? 'bg:transparent' : 'bg-[#191919]';
});

watch(y, (newY, oldY) => {
  if (newY !== oldY) {
    scrolledDown.value = oldY < newY;
  }
});
</script>

<template>
  <nav
    class="before:content-[ relative mx-auto flex max-w-screen-xl origin-top items-center justify-between gap-11 px-6 py-8 transition-transform before:-z-10 before:hidden after:absolute after:inset-0 after:-z-10 after:border-b after:border-neutral-600 after:content-[''] md:justify-start md:px-0 before:md:absolute before:md:block before:md:size-full before:md:scale-x-[2] lg:justify-between"
    :class="[
      scrolledDown ? 'scale-y-0' : 'scale-y-100',
      navBg,
      currentPath !== `/` ? 'before:bg-black' : 'before:bg-[#191919]',
    ]"
  >
    <!-- TODO: should be checkbox -->
    <Link href="/" class="lg:hidden" aria-label="open menu">
      <BurgerIcon class="fill-current text-gray-500" />
    </Link>

    <Link href="/" class="">
      <ApplicationLogo class="fill-current text-gray-500" />
    </Link>

    <ul class="absolute left-1/2 hidden -translate-x-1/2 items-center justify-between gap-8 text-sm font-bold uppercase text-white lg:flex">
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

    <Link href="#" class="md:ml-auto lg:ml-0" aria-label="open cart">
      <CartIcon class="fill-current text-gray-500" />
    </Link>
  </nav>
</template>
