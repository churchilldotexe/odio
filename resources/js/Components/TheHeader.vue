<script setup lang="ts">
import { useScroll } from '@/Composables/useScroll';
import { usePage } from '@inertiajs/vue3';
import { computed, provide, ref, watch } from 'vue';
import Nav from '@/Components/Nav/Nav.vue';
import { cartModal, navModal } from '@/keys';
import ProductNav from './Products/ProductNav.vue';
import NavModal from './Nav/NavModal.vue';

const toggleNavModal = ref(false)
const isModalOpen = ref<boolean>(false)

const currentPath = usePage().url;
const scrolledDown = ref<boolean>(false);
const { y } = useScroll();

const handleNavModalToggle = () => {
    toggleNavModal.value = !toggleNavModal.value
}

const handleModalToggle = () => {
    isModalOpen.value = !isModalOpen.value
}

provide(navModal, { isModalOpen: toggleNavModal, handleModalToggle: handleNavModalToggle })
provide(cartModal, { isModalOpen, handleModalToggle })


watch(y, (newY, oldY) => {
    if (newY !== oldY && (!isModalOpen.value || !toggleNavModal.value)) {
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
    <header class="top-0 z-10 w-full origin-top  transition-transform md:px-6 xl:px-0" :class="[
        (scrolledDown && !(isModalOpen || toggleNavModal)) ? 'fixed scale-y-0' : `${position} scale-y-100`,
        navBg]" :inert="scrolledDown && !isModalOpen">

        <Nav class="z-30" />
        <NavModal v-model:toggle-modal="toggleNavModal">
            <div v-show="toggleNavModal"
                class="absolute left-0 top-full z-20 grid w-full rounded-b-lg bg-white px-6 py-8 md:px-10 md:pb-16 md:pt-14 lg:hidden">
                <ProductNav class="pt-14 " />
            </div>
        </NavModal>

    </header>
</template>
