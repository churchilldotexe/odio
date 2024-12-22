<script setup lang="ts">
import { useScroll } from '@/Composables/useScroll';
import { usePage } from '@inertiajs/vue3';
import { computed, provide, ref, watch } from 'vue';
import Nav from '@/Components/Nav/Nav.vue';
import { modal } from '@/keys';

const isModalOpen = ref<boolean>(false)

const handleModalToggle = () => {
    isModalOpen.value = !isModalOpen.value
}

provide(modal, { isModalOpen, handleModalToggle })
const currentPath = usePage().url;
const scrolledDown = ref<boolean>(false);
const { y } = useScroll();

watch(y, (newY, oldY) => {
    if (newY !== oldY && !isModalOpen.value) {
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
        (scrolledDown && !isModalOpen) ? 'fixed scale-y-0' : `${position} scale-y-100`,
        navBg]" :inert="scrolledDown && !isModalOpen">

        <Nav />
    </header>
</template>
