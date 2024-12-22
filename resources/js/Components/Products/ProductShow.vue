<script setup lang="ts">
import { computed } from 'vue';
import ButtonLink from '../ButtonLink.vue';
import { twMerge } from 'tailwind-merge';
import Image from '../Image.vue';

interface Props {
    imgSrcMobile: string;
    imgSrcTablet: string;
    imgSrcDesktop: string;
    isNew?: boolean;
    title: string;
    summary: string;
    reverse?: boolean;
    innerClass?: string;
    href?: string
}

const props = defineProps<Props>();

const splittedTitle = computed(() => {
    const words = props.title.split(' ');

    const lastWord = words.pop() ?? '';

    const mainTitle = words.join(' ');

    return { mainTitle, lastWord };
});
</script>

<template>
    <section
        :class='[twMerge(`flex size-full max-w-screen-xl flex-col gap-8 px-6 text-center md:gap-12 md:px-10 lg:gap-30 xl:px-0 ${$attrs.class}`, reverse ? "lg:flex-row-reverse" : "lg:flex-row")]'>

        <Image :img-src-mobile :img-src-tablet :img-src-desktop
            class=" size-full rounded-lg object-cover object-center " />

        <div
            :class="[twMerge(`flex flex-col gap-6 md:gap-4 md:px-14 lg:items-start lg:self-center lg:px-0 lg:text-left ${innerClass}`)]">
            <p v-show="isNew" class="text-sm tracking-[0.625em] text-coral">
                NEW PRODUCT
            </p>

            <h2 class="w-full text-3xl font-bold uppercase text-black md:pb-2 md:text-4xl">
                {{ splittedTitle.mainTitle }} <br>
                {{ splittedTitle.lastWord }}
            </h2>

            <p class="font-medium text-black/50 md:py-2 ">
                {{ summary }}
            </p>
            <slot>
                <ButtonLink class="mx-auto" :href="href ?? '#'" />
            </slot>
        </div>
    </section>
</template>
