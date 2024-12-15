<script setup lang="ts">
import ButtonLink from '../ButtonLink.vue';


type Props = {
    imgSrcMobile: string
    isNew?: boolean
    title: string
    summary: string
}

withDefaults(
    defineProps<
        Props
    >(),
    {
        isNew: false
    }
)
</script>

<template>
    <section class="grid gap-6 size-full text-center px-6">
        <img class="size-full object-center object-cover" :src="imgSrcMobile" />
        <p v-show="isNew" class="text-coral text-sm tracking-[0.625em]">NEW PRODUCT</p>
        <h2 class="text-3xl text-black w-1/2 font-bold mx-auto text-balance ">{{ title }}</h2>
        <p class="text-black/50 font-medium">{{ summary }}</p>

        <ButtonLink />
    </section>
</template>
