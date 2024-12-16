<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { twMerge } from 'tailwind-merge'

defineOptions({ inheritAttrs: false })
</script>

<!-- class=""  -->
<template>
  <div>
    <component
      :is="$attrs.href ? Link : 'button'"
      :class="
        twMerge(
          `mx-auto size-full w-fit bg-coral px-8 py-4 text-xs font-bold uppercase text-white transition-colors duration-300 hocus-visible:bg-coral-light lg:ml-0 ${$attrs.class}`,
        )
      "
      v-bind="$attrs"
    >
      <slot>see product</slot>
    </component>
  </div>
</template>
