<script setup lang="ts">
import FacebookIcon from '@/Components/Footer/FacebookIcon.vue'
import InstagramIcon from '@/Components/Footer/InstagramIcon.vue'
import TwitterIcon from '@/Components/Footer/TwitterIcon.vue'
import ApplicationLogo from '@/Components/Icon/ApplicationLogo.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const curentYear = computed(() => new Date().getFullYear())
</script>

<template>
  <footer class="space-y-30 bg-black md:space-y-24">
    <section
      class="mx-auto grid max-w-screen-xl place-items-center justify-center gap-12 pb-10 text-center md:place-items-start md:gap-8 md:px-10 lg:relative lg:grid-cols-2 xl:px-0"
    >
      <div class="mb-7 h-1 w-[6.5rem] bg-coral" />

      <ApplicationLogo class="col-start-1" />

      <nav
        class="flex flex-col gap-4 md:flex-row lg:gap-9 lg:place-self-end"
        aria-label="footer navigation"
      >
        <Link
          class="text-sm font-bold uppercase text-white transition-colors duration-300 hocus-visible:text-coral"
          href="#"
        >
          home
        </Link>
        <Link
          class="text-sm font-bold uppercase text-white transition-colors duration-300 hocus-visible:text-coral"
          href="#"
        >
          headphones
        </Link>
        <Link
          class="text-sm font-bold uppercase text-white transition-colors duration-300 hocus-visible:text-coral"
          href="#"
        >
          speaker
        </Link>
        <Link
          class="text-sm font-bold uppercase text-white transition-colors duration-300 hocus-visible:text-coral"
          href="#"
        >
          earphones
        </Link>
      </nav>

      <p
        class="px-6 text-center font-medium text-white/50 md:px-0 md:text-left"
      >
        Audiophile is an all in one stop to fulfill your audio needs. We're a
        small team of music lovers and sound specialists who are devoted to
        helping you get the most out of personal audio. Come and visit our demo
        facility - we’re open 7 days a week.
      </p>

      <div
        class="flex w-full flex-col items-center justify-center gap-12 md:flex-row md:justify-between md:pt-12 lg:col-span-2"
      >
        <p class="px-6 text-center font-bold text-white/50 md:px-0">
          Copyright {{ curentYear }}. All Rights Reserved
        </p>

        <div
          class="flex items-center justify-center gap-4 lg:absolute lg:right-0 lg:top-[60%] lg:-translate-y-[40%] lg:px-10 xl:px-0"
        >
          <Link href="#">
            <FacebookIcon />
          </Link>

          <Link href="#">
            <TwitterIcon />
          </Link>

          <Link href="#">
            <InstagramIcon />
          </Link>
        </div>
      </div>
    </section>
  </footer>
</template>
