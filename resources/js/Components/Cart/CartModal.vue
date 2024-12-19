<script setup lang="ts">
import { ref, watch } from 'vue';

const { showModal } = defineProps<{
    showModal: boolean
}>()

const emit = defineEmits<{ 'update:showModal': [value: boolean] }>()

const dialogRef = ref<HTMLDialogElement | null>(null)

const handleCloseModal = () => {
    emit('update:showModal', false)
}

watch(() => showModal, (modal) => {
    return modal ? dialogRef.value?.showModal() : dialogRef.value?.close()
})

</script>

<template>
    <Transition class=" transition-opacity duration-700 [transition-behavior:allow-discrete]"
        enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition duration-500"
        leave-from-class="opacity-100" leave-to-class="opacity-0">
        <dialog ref="dialogRef" v-show="showModal" @click.self="handleCloseModal" @close="handleCloseModal">
            <slot />
        </dialog>

    </Transition>
</template>
