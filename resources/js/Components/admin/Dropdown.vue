<template>
    <div>
        <button
            @click.prevent="toggleOpen"
            :class="{
                'bg-primary-100 dark:bg-primary': isActive || open,
            }"
            class="flex items-center w-full p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            role="button"
            :aria-expanded="open || isActive ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <slot name="icon"></slot>
            </span>
            <span class="ml-2 text-sm">{{ label }}</span>
            <span class="ml-auto" aria-hidden="true">
                <svg
                    class="w-4 h-4 transition-transform transform"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>
            </span>
        </button>
        <transition name="slide">
            <div v-if="open" class="mt-2 space-y-2 px-7" :aria-label="label">
                <slot name="item"></slot>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref } from "vue";

const open = ref(false);
const isActive = ref(false);

const toggleOpen = () => {
    open.value = !open.value;
};

defineProps({
    label: String,
});
</script>
<style>
.slide-enter,
.slide-leave-to {
    transform: scaleY(15);
}
</style>
