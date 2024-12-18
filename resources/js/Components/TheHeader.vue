<script setup lang="ts">
import { useScroll } from '@/Composables/useScroll';
import { usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Nav from '@/Components/Nav/index.vue';

const currentPath = usePage().url;

const { y } = useScroll();

const scrolledDown = ref<boolean>(false);
watch(y, (newY, oldY) => {
    if (newY !== oldY) {
        scrolledDown.value = oldY < newY;
    }
});

const navBg = computed(() => {
    if (currentPath !== '/') {
        return 'bg-black';
    }

    return y.value === 0 ? 'bg:transparent' : 'bg-[#191919]';
});

const position = computed(() => {

    return currentPath !== '/' ? 'sticky' : 'fixed'
})

</script>
<template>
    <header class="top-0 z-10 w-full origin-top  transition-transform md:px-6 lg:px-0" :class="[
        scrolledDown ? 'fixed scale-y-0' : `${position} scale-y-100`,
        navBg]" :inert="scrolledDown">
        <Nav />
    </header>
</template>
