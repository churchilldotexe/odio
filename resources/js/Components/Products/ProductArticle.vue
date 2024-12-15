<template>
    <article :class='["px-6 grid gap-10 max-w-screen-xl ", "md:gap-16 md:px-10 lg:grid-cols-2 xl:px-0 lg:gap-30 "]'>
        <img class="rounded-lg w-full md:hidden" src="/assets/shared/mobile/image-best-gear.jpg"
            alt="a guy with a headset">
        <img class="hidden rounded-lg size-full md:block lg:hidden" src="/assets/shared/tablet/image-best-gear.jpg"
            alt="a guy with a headset">

        <img class="hidden rounded-lg size-full lg:block lg:order-2 " src="/assets/shared/desktop/image-best-gear.jpg"
            alt="a guy with a headset">

        <div class="space-y-8 md:px-14 lg:place-self-center ">
            <h3
                class="uppercase font-bold text-2.5-xl text-center text-balance mx-auto md:text-4xl md:text-pretty lg:order-1 lg:text-left lg:max-w-none lg:text-balance ">
                Bringing
                you
                the <strong class=" text-coral">best</strong> audio
                gear</h3>

            <p class="font-medium text-black/50 md:text-center lg:text-left ">Located at the heart of New York
                City,
                Audiophile is
                the
                premier store for
                high end headphones,
                earphones, speakers, and audio accessories. We have a large showroom and luxury
                demonstration
                rooms available for you to browse and experience a wide range of our products. Stop by our
                store
                to meet some of the fantastic people who make Audiophile the best place to buy your portable
                audio equipment.</p>
        </div>
    </article>
</template>
