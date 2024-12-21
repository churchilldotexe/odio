<script setup lang="ts">
import BackLink from '@/Components/BackLink.vue';
import Input from '@/Components/Checkout/Input.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from 'vue';


const email = ref<string>('')
</script>

<template>
    <MainLayout title="Checkout Page">
        <BackLink />
        <section
            class="mx-6 mt-6 grid max-w-screen-xl gap-8 rounded-lg bg-red-50 p-6 pb-30 lg:gap-40 lg:pb-40 lg:pt-14">
            <h1 class="text-2.5-xl font-bold uppercase">Checkout</h1>
            <fieldset>
                <legend class="pb-4 text-sm font-bold uppercase text-coral">billing details</legend>

                <div class="grid gap-6">

                    <!-- FIX: do something with the v-model , remove the required if not really needed -->
                    <Input name="name" type="name" v-model:model-value="email" placeholder="Alexie Ward" label="name" />
                    <Input name="email" type="email" v-model:model-value="email" placeholder="alexia@email.com"
                        label="email address" />

                    <Input name="phone" type="phone" v-model:model-value.number="email" placeholder="+1 202-555-0136"
                        label="Phone number" />
                </div>
            </fieldset>

            <fieldset>
                <legend class="pb-4 text-sm font-bold uppercase text-coral">shipping info</legend>

                <div class="grid gap-6">

                    <!-- FIX: do something with the v-model , remove the required if not really needed -->
                    <Input name="address" type="text" v-model:model-value="email" placeholder="1137 williams avenue"
                        label="Your address" />
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

                <div class="grid gap-6">
                    <!-- TODO: do this two options radio button-->
                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-xs font-bold capitalize ">Payment Method</label>
                        <input
                            class="rounded-lg border border-[#cfcfcf] px-6 py-4 text-sm font-bold placeholder:text-black/40"
                            type="radio" />
                    </div>

                    <!-- FIX: do something with the v-model , remove the required if not really needed -->
                    <!-- FIX: the capitalize fix it -->
                    <Input name="e-number" type="number" v-model:model-value="email" placeholder="238521993"
                        label="e-Money Number" />

                    <Input name="e-ping" type="number" v-model:model-value="email" placeholder="6891"
                        label="e-Money Pin" />
                </div>
            </fieldset>
        </section>
    </MainLayout>
</template>
