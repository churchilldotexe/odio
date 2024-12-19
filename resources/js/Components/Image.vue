<script setup lang="ts">
interface ImageProps {
    imgSrcMobile: string
    imgSrcTablet: string
    imgSrcDesktop: string
}

defineProps<ImageProps>()
defineOptions({ inheritAttrs: false })

</script>

<template>
    <picture>
        <source media="(max-width: 767px)" :srcset="imgSrcMobile" />
        <source media="(max-width: 1023px )" :srcset="imgSrcTablet" />
        <img :src="imgSrcDesktop" v-bind="$attrs">
    </picture>
</template>
