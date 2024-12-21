<script setup lang="ts">
import { twMerge } from 'tailwind-merge';

defineProps<{
    name: string
    label: string
}>()

const [modelValue, modelModifiers] = defineModel<string, 'number'>({
    set(value) {
        if (modelModifiers.number) {
            return parseInt(value, 10)
        }
        return value
    },
    required: true
})

defineOptions({ inheritAttrs: false })

</script>
<template>
    <div class="flex flex-col gap-2">
        <label :for="name" class="text-xs font-bold capitalize ">{{ label }}</label>
        <input v-model="modelValue" :id="name" :name="name" v-bind="$attrs"
            :class="twMerge(`rounded-lg border border-[#cfcfcf] px-6 py-4 text-sm font-bold placeholder:text-black/40 ${$attrs.class}`)" />
    </div>
</template>
