<script setup lang="ts">
import BackLink from '@/Components/BackLink.vue';
import Input from '@/Components/Order/Input.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import SummaryRow from '@/Components/Order/SummaryRow.vue';
import CODIcon from '@/Components/Order/CODIcon.vue';
import OrderConfirmation from '@/Components/Order/OrderConfirmation.vue';
import OrderOverview from '@/Components/Order/OrderOverview.vue';
import { useCartStore } from '@/Stores/cart';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const cartStore = useCartStore()

type Form = {
    name: string | null
    email: string | null
    phone: string | null
    address: string | null
    zipCode: number | null
    city: string | null
    country: string | null
    paymentMethod: 'e-money' | 'cod'
    eNumber: number | null
    ePin: number | null
}

const form = useForm<Form>({
    name: null,
    phone: null,
    email: null,
    country: null,
    city: null,
    address: null,
    zipCode: null,
    paymentMethod: 'e-money',
    eNumber: null,
    ePin: null,
})

const showConfirmation = ref(false)

const submit = () => {
    form.post('/checkout', {
        onSuccess: () => {
            form.reset()
            showConfirmation.value = true
        }
    })


}


</script>

<template>
    <MainLayout title="Checkout Page">
        <BackLink />

        <!-- <div class="mx-auto grid max-w-screen-xl gap-8 px-6 pb-24 pt-6 md:pb-28 lg:grid-cols-[1fr,auto] lg:px-0 "> -->
        <form class="mx-auto grid max-w-screen-xl gap-8 px-6 pb-24 pt-6 md:pb-28 lg:grid-cols-[1fr,auto] lg:px-0 "
            @submit.prevent="submit">

            <section class=" grid gap-8 rounded-lg bg-white p-6 md:gap-10 md:p-8 lg:px-12 lg:pb-12 lg:pt-14 ">
                <h1 class="text-2.5-xl font-bold uppercase md:text-3xl">Checkout</h1>
                <fieldset class="pb-3">
                    <legend class="pb-4 text-sm font-bold uppercase text-coral">billing details</legend>

                    <div class="grid gap-6 md:grid-cols-2 md:gap-x-4">

                        <Input name="name" type="name" v-model:model-value="form.name" placeholder="Alexie Ward"
                            label="name" :error="form.errors.name" />

                        <Input name="email" type="email" v-model:model-value="form.email" placeholder="alexia@email.com"
                            label="email address" :error="form.errors.email" />

                        <Input name="phone" type="phone" v-model:model-value="form.phone" placeholder="+1 202-555-0136"
                            label="Phone number" :error="form.errors.phone" />
                    </div>
                </fieldset>

                <fieldset class="pb-5">
                    <legend class="pb-4 text-sm font-bold uppercase text-coral">shipping info</legend>

                    <div class="grid gap-6 md:grid-cols-2 md:gap-x-4">

                        <Input class="md:col-span-2" name="address" type="text" v-model:model-value="form.address"
                            placeholder="1137 williams avenue" label="Your address" :error="form.errors.address" />

                        <Input name="zip-code" type="number" v-model:model-value.number="form.zipCode"
                            placeholder="10001" label="ZIP code" :error="form.errors.zipCode" />

                        <Input name="city" type="text" v-model:model-value="form.city" placeholder="New York"
                            label="City" :error="form.errors.city" />

                        <Input name="country" type="text" v-model:model-value="form.country" placeholder="United States"
                            label="Country" :error="form.errors.country" />

                    </div>
                </fieldset>

                <fieldset>
                    <legend class="pb-4 text-sm font-bold uppercase text-coral">Payment Details</legend>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="relative grid gap-4 md:col-span-2 md:grid-cols-2 ">
                            <div class="flex items-center justify-between">
                                <p class="text-xs font-bold capitalize">payment method</p>
                                <p v-if="form.errors.paymentMethod"
                                    class=" static py-1 text-xs font-medium text-red-600 md:absolute md:left-0 md:top-1/2">
                                    {{ form.errors.paymentMethod }}</p>
                            </div>

                            <label for="e-money"
                                class="relative flex cursor-pointer items-center gap-2 rounded-lg border border-[#cfcfcf] p-4 hocus-visible:border-coral">
                                <input id="e-money" name="payment-method" class="peer/emoney hidden" value="e-money"
                                    v-model="form.paymentMethod" type="radio" />
                                <div
                                    :class="[
                                        ' grid size-5 cursor-pointer place-items-center rounded-full border border-[#cfcfcf] bg-transparent ',

                                        `before:size-2 before:rounded-full before:content-[''] before:[grid-area:1/1] before:peer-checked/emoney:bg-coral`]" />

                                <span class="text-xs font-bold capitalize ">Payment Method</span>
                            </label>

                            <label for="cod"
                                class="relative flex cursor-pointer items-center gap-2 rounded-lg border border-[#cfcfcf] p-4 peer-checked/cod:border-coral  hocus-visible:border-coral md:col-start-2 md:col-end-2">
                                <input id="cod" name="payment-method" class="peer/cod hidden" value="cod"
                                    v-model="form.paymentMethod" type="radio" />
                                <div
                                    :class="[
                                        ' grid size-5 cursor-pointer place-items-center rounded-full border border-[#cfcfcf] bg-transparent ',

                                        `before:size-2 before:rounded-full before:content-[''] before:[grid-area:1/1] before:peer-checked/cod:bg-coral`]" />

                                <span class="text-xs font-bold capitalize ">Cash On Delivery</span>
                            </label>
                        </div>

                        <div v-if="form.paymentMethod === 'cod'" class="grid grid-cols-[auto,1fr] gap-8 md:col-span-2">
                            <CODIcon class="place-self-center" />
                            <p class="font-medium text-black/50">The ‘Cash on Delivery’ option enables you to pay in
                                cash when our delivery courier
                                arrives at your residence. Just make sure your address is correct so that your order
                                will not be cancelled.</p>
                        </div>

                        <div v-else class="contents">
                            <Input name="e-number" type="number" v-model:model-value.number="form.eNumber"
                                placeholder="238521993" label="e-Money Number" label-class="normal-case"
                                :error="form.errors.eNumber" />

                            <Input name="e-pin" type="number" v-model:model-value.number="form.ePin" placeholder="6891"
                                label="e-Money Pin" label-class="normal-case" :error="form.errors.ePin" />
                        </div>
                    </div>
                </fieldset>
            </section>


            <section class=" grid gap-8 rounded-lg bg-white p-6 md:p-8 lg:place-self-start"
                v-if="cartStore.cart.length > 0">

                <h2 class="text-lg font-bold uppercase">Summary</h2>
                <div class="grid gap-6">

                    <OrderOverview v-for="item in cartStore.cart" :key="item.id" :item="item">
                        <p class=" self-start justify-self-end pt-2 font-bold text-black/50">x{{ item.quantity }}
                        </p>
                    </OrderOverview>

                </div>

                <div>
                    <SummaryRow label="total" :value="5396" />
                    <SummaryRow label="shipping" :value="50" />
                    <SummaryRow label="vat(included)" :value="1079" />
                    <SummaryRow class="pt-6" label="grand total" :value="5446" value-class="text-coral" />
                </div>

                <!-- TODO: this will popout the thank you component -->
                <!-- @click="showConfirmation = true" -->
                <button type="submit"
                    class=" h-fit w-full bg-coral px-8 py-4 text-xs font-bold uppercase text-white transition-colors duration-300 hocus-visible:bg-coral-light lg:ml-0 ">
                    Continue & pay
                </button>
                <OrderConfirmation v-model:show-modal="showConfirmation" />

            </section>
        </form>
        <!-- </div> -->
    </MainLayout>
</template>
