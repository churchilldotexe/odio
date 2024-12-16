<script setup lang="ts">
import { computed } from 'vue';
import ButtonLink from '../ButtonLink.vue';

// TODO: add a reverse prop for desktop view


type Props = {
    imgSrcMobile: string
    imgSrcTablet: string
    imgSrcDesktop: string
    isNew?: boolean
    title: string
    summary: string
    reverse?: boolean
}

const props = defineProps<Props>()

const splittedTitle = computed(() => {
    const words = props.title.split(' ')

    const lastWord = words.pop() ?? ''

    const mainTitle = words.join(' ')

    return { mainTitle, lastWord }
})


</script>

<template>
    <section class="flex flex-col gap-8 size-full text-center px-6 max-w-screen-xl md:px-10 md:gap-12 lg:px-0 lg:gap-30"
        :class="reverse ? 'lg:flex-row-reverse ' : 'lg:flex-row'">

        <img class="size-full object-center object-cover md:hidden" :src="imgSrcMobile" />
        <img class="hidden size-full object-center object-cover md:block lg:hidden" :src="imgSrcTablet" />
        <img class="hidden size-full object-center object-cover lg:block " :src="imgSrcDesktop" />

        <div class="flex flex-col gap-6 md:gap-4 md:px-14 lg:self-center lg:items-start lg:px-0 lg:text-left ">
            <p v-show="isNew" class="text-coral text-sm tracking-[0.625em]">NEW PRODUCT</p>

            <h2 class="text-3xl uppercase text-black font-bold md:text-4xl md:pb-2 w-full">
                {{ splittedTitle.mainTitle }} <br /> {{ splittedTitle.lastWord }}
            </h2>

            <p class="text-black/50 font-medium md:py-2 ">{{ summary }}</p>
            <ButtonLink />
        </div>

    </section>
</template>
