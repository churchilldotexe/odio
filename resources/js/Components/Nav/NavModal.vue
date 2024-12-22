<script setup lang="ts">
import { inject, onMounted, onUnmounted, Ref } from 'vue';
import { cartModal } from '@/keys';

// const { isModalOpen, handleModalToggle } = inject(modal) as {
//     isModalOpen: Ref<boolean, boolean>;
//     handleModalToggle: () => void;
// }

const isModalOpen = defineModel<boolean>('toggleModal', { required: true })

const handleModalToggle = () => {
    isModalOpen.value = !isModalOpen.value
}

const abortController = new AbortController()

onMounted(() => {

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && isModalOpen.value) {
            handleModalToggle()
        }
    }, { signal: abortController.signal })
})

onUnmounted(() => {
    abortController.abort()
})

</script>

<template>


    <!-- attach absolutely with nav parent  -->
    <Transition class="" enter-active-class="transition-transform origin-top duration-200 motion-reduce:transition-none"
        enter-from-class="scale-y-0" enter-to-class="scale-y-100"
        leave-active-class="transition-transform origin-top duration-200 motion-reduce:transition-none"
        leave-to-class="scale-y-0">
        <slot />
    </Transition>

    <!-- act as a backdrop, have lower z-index with nav but higher than everybody else because header have higher stacking context than other -->
    <div @click="handleModalToggle" id="modal-backdrop" role="backdrop" v-if="isModalOpen"
        class="fixed inset-0 -z-10 h-screen w-full bg-black/40" />

</template>
