<script setup lang="ts">
import { twMerge } from 'tailwind-merge';
import { computed } from 'vue';

const props = defineProps<{
    name: string
    label: string
    labelClass?: string
    error?: string
}>()

const [modelValue, modelModifiers] = defineModel<string | number | null, 'number'>({
    set(value) {
        if (modelModifiers.number && value) {
            return Number(value)
        }
        return value
    },
    required: true
})

defineOptions({ inheritAttrs: false })


const mergedLabelClass = computed(() => {
    return twMerge([`text-xs font-bold capitalize ${props.labelClass} `,
    props.error ? 'text-red-600' : 'text-black'])
})


</script>
<template>
    <div :class="twMerge(`relative flex flex-col mb-2 lg:mb-0 gap-2 ${$attrs.class}`)">
        <div class="flex items-center justify-between">
            <label :for="name" :class="mergedLabelClass">{{
                label }}</label>
            <p v-if="error"
                class=" absolute left-0 top-full py-1 text-xs font-medium text-red-600 first-letter:uppercase lg:static">
                {{ error
                }}
            </p>
        </div>
        <input v-model="modelValue" :id="name" :name="name" v-bind="$attrs"
            :class="twMerge(` rounded-lg border hocus-visible:border-coral hocus-visible:cursor-pointer active:cursor-text border-[#cfcfcf] px-6 py-4 text-sm font-bold placeholder:text-black/40 `)" />
    </div>
</template>
