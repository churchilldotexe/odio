<script setup lang="ts">
import { Link } from '@inertiajs/vue3';


const goBack = () => {
    history.back()
}
</script>

<template>

    <!-- TODO: go back to its parent (e.g. /earphone or history stack) -->
    <div class="mx-auto max-w-screen-xl px-6 pt-6 font-medium capitalize text-black/50 md:pt-8 lg:pt-20 xl:px-0">
        <Link class="hocus-visible:text-coral " href="/" @click.prevent="goBack">
        go back
        </Link>
    </div>
</template>
