<script setup lang="ts">
import BackLink from '@/Components/BackLink.vue';
import OrderedOverview from '@/Components/Order/OrderOverview.vue';
import Input from '@/Components/Order/Input.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from 'vue';
import SummaryRow from '@/Components/Order/SummaryRow.vue';
import ButtonLink from '@/Components/ButtonLink.vue';

const email = ref<string>('')
</script>

<template>
    <MainLayout title="Checkout Page">
        <BackLink />

        <div class="grid gap-8 px-6 pb-24 pt-6 md:pb-28">
            <section class=" grid max-w-screen-xl gap-8 rounded-lg bg-white p-6 md:gap-10 md:p-8 ">
                <h1 class="text-2.5-xl font-bold uppercase md:text-3xl">Checkout</h1>
                <fieldset class="pb-3">
                    <legend class="pb-4 text-sm font-bold uppercase text-coral">billing details</legend>

                    <div class="grid gap-6 md:grid-cols-2 md:gap-x-4">

                        <!-- FIX: do something with the v-model , remove the required if not really needed -->
                        <Input name="name" type="name" v-model:model-value="email" placeholder="Alexie Ward"
                            label="name" />
                        <Input name="email" type="email" v-model:model-value="email" placeholder="alexia@email.com"
                            label="email address" />

                        <Input name="phone" type="phone" v-model:model-value.number="email"
                            placeholder="+1 202-555-0136" label="Phone number" />
                    </div>
                </fieldset>

                <fieldset class="pb-5">
                    <legend class="pb-4 text-sm font-bold uppercase text-coral">shipping info</legend>

                    <div class="grid gap-6 md:grid-cols-2 md:gap-x-4">

                        <!-- FIX: do something with the v-model , remove the required if not really needed -->
                        <Input class="md:col-span-2" name="address" type="text" v-model:model-value="email"
                            placeholder="1137 williams avenue" label="Your address" />
                        <Input name="zip-code" type="number" v-model:model-value="email" placeholder="10001"
                            label="ZIP code" />

                        <Input name="city" type="text" v-model:model-value.number="email" placeholder="New York"
                            label="City" />

                        <Input name="country" type="text" v-model:model-value.number="email" placeholder="United States"
                            label="Country" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="pb-4 text-sm font-bold uppercase text-coral">Payment Details</legend>

                    <div class="grid gap-6 md:grid-cols-2">
                        <!-- TODO: do this two options radio button-->
                        <div class="grid gap-4 md:col-span-2 md:grid-cols-2 ">
                            <p class="text-xs font-bold capitalize">payment method</p>
                            <label for="e-money"
                                class="relative flex items-center gap-2 rounded-lg border border-[#cfcfcf] p-4">
                                <input id="e-money" name="payment-method" class="peer hidden" value="e-money"
                                    type="radio" />
                                <div
                                    :class="[
                                        ' grid size-5 cursor-pointer place-items-center rounded-full border border-[#cfcfcf] bg-transparent ',

                                        `before:size-2 before:rounded-full before:content-[''] before:[grid-area:1/1] before:peer-checked:bg-coral`]" />

                                <span class="text-xs font-bold capitalize ">Payment Method</span>
                            </label>

                            <!-- FIX: make this controlled input using v-model in order to change the border color as per design feature -->
                            <label for="cod"
                                class="relative flex items-center gap-2 rounded-lg border border-[#cfcfcf] p-4  peer-checked:border-coral md:col-start-2 md:col-end-2">
                                <input id="cod" name="payment-method" class="peer hidden" value="e-money"
                                    type="radio" />
                                <div
                                    :class="[
                                        ' grid size-5 cursor-pointer place-items-center rounded-full border border-[#cfcfcf] bg-transparent ',

                                        `before:size-2 before:rounded-full before:content-[''] before:[grid-area:1/1] before:peer-checked:bg-coral`]" />

                                <span class="text-xs font-bold capitalize ">Cash On Delivery</span>
                            </label>

                        </div>

                        <!-- FIX: do something with the v-model , remove the required if not really needed -->
                        <Input name="e-number" type="number" v-model:model-value="email" placeholder="238521993"
                            label="e-Money Number" label-class="normal-case" />

                        <Input name="e-ping" type="number" v-model:model-value="email" placeholder="6891"
                            label="e-Money Pin" label-class="normal-case" />
                    </div>
                </fieldset>
            </section>

            <section class=" grid max-w-screen-xl gap-8 rounded-lg bg-white p-6 md:p-8 ">
                <h2 class="text-lg font-bold uppercase">Summary</h2>
                <!-- TODO: will map/iterate base on the order (use pinia for sync) -->
                <div class="grid gap-6">
                    <OrderedOverview>
                        <p class=" self-start justify-self-end pt-2 font-bold text-black/50">x1</p>
                    </OrderedOverview>
                    <OrderedOverview>
                        <p class=" self-start justify-self-end pt-2 font-bold text-black/50">x1</p>
                    </OrderedOverview>
                </div>

                <div>
                    <SummaryRow label="total" value="5,396" />
                    <SummaryRow label="shipping" value="50" />
                    <SummaryRow label="vat(included)" value="1,079" />
                    <SummaryRow class="pt-6" label="grand total" value="5,446" value-class="text-coral" />
                </div>

                <!-- TODO: this will popout the thank you component -->
                <ButtonLink href="#" class="w-full text-center">Continue & pay</ButtonLink>

            </section>
        </div>
    </MainLayout>
</template>
