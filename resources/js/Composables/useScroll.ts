import { onMounted, onUnmounted, ref } from "vue";

export function useScroll() {
    const x = ref(window.scrollX)
    const y = ref(window.scrollY)

    const abortController = new AbortController()

    onMounted(() => {
        window.addEventListener('scroll', () => {
            x.value = window.scrollX
            y.value = window.scrollY
        },
            { signal: abortController.signal }
        )
    })

    onUnmounted(() => {
        abortController.abort()
    })

    return { x, y }
}
