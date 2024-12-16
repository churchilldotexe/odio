<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue'
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <!-- TODO: change this make this dynamic (earphone) -->
  <MainLayout title="earphone Details">
    <!-- TODO: go back to its parent (e.g. /earphone or history stack) -->
    <div>
      <Link href="/" class="font-medium capitalize text-black/50">
        go back
      </Link>
    </div>
  </MainLayout>
</template>
