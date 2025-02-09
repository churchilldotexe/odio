<script setup lang="ts">
import { onUnmounted, ref, watch } from 'vue';
import CheckIcon from './CheckIcon.vue';
import OrderOverview from './OrderOverview.vue';
import ButtonLink from '../ButtonLink.vue';
import { useCartStore } from '@/Stores/cart';
import { transformToCurrency } from '@/Lib/utils/currency';

const cartStore = useCartStore()

const { showModal = false } = defineProps<{
    showModal: boolean
}>()

const emit = defineEmits<{ 'update:showModal': [value: boolean] }>()

const dialogRef = ref<HTMLDialogElement | null>(null)

const handleCloseModal = () => {
    emit('update:showModal', false)
}

watch(() => showModal, (modal) => {
    return modal ? dialogRef.value?.showModal() : setTimeout(() => { dialogRef.value?.close() }, 200)
})


// order is already confirm
onUnmounted(() => {
    cartStore.clearCart()
})

</script>

<template>
    <Transition class="" enter-from-class="opacity-0" enter-to-class="opacity-100"
        enter-active-class="transition-opacity  duration-200 [transition-behavior:allow-discrete]"
        leave-active-class="transition-opacity  duration-200 [transition-behavior:allow-discrete]"
        leave-from-class="opacity-100" leave-to-class="opacity-0">
        <dialog class="rounded-lg  backdrop:bg-black/40 " ref="dialogRef" v-show="showModal"
            @click.self="handleCloseModal" @close="handleCloseModal">
            <section class=" grid w-full max-w-screen-sm gap-6 p-6 md:gap-8 md:p-12">
                <CheckIcon />
                <div class="space-y-4">
                    <h3 class=" text-2xl font-bold uppercase md:text-3xl">
                        thank you
                        <br />
                        for your order
                    </h3>
                    <p class="font-medium text-black/50">You will receive an email confirmation shortly.</p>
                </div>
                <div class="grid md:grid-cols-[1fr,.8fr]">
                    <div class="grid gap-6 rounded-t-lg bg-[#f1f1f1] p-6 md:w-full ">
                        <OrderOverview :item="cartStore.cart[0]" class="place-self-center ">
                            <p class=" self-start justify-self-end pt-2 font-bold text-black/50">x1</p>
                        </OrderOverview>

                        <template v-if="cartStore.cart.length > 1">
                            <hr class="border border-black/[0.08]" />
                            <p class="text-center text-xs font-bold text-black/50">and {{ cartStore.cart.length - 1 }}
                                other
                                item(s)</p>
                        </template>
                    </div>

                    <div
                        class="grid gap-2 rounded-b-lg bg-black p-6 md:w-full md:rounded-r-lg md:rounded-bl-none md:py-10">
                        <p class="font-medium uppercase text-white/50 md:self-end">grand total</p>
                        <p class="text-lg font-bold text-white ">{{ transformToCurrency(cartStore.finalTotal) }}</p>
                    </div>

                </div>
                <ButtonLink class="mt-3 h-fit w-full text-center" href="/">back to home
                </ButtonLink>
            </section>
        </dialog>

    </Transition>
</template>
