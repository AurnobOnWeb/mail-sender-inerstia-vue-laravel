<template>
    <div
        v-if="Panel.isPanelOpen"
        @click="Panel.isPanelOpen = false"
        class="fixed inset-0 z-10 bg-primary-darker"
        style="opacity: 0.5"
        aria-hidden="true"
    ></div>
    <Transition name="slide-fade">
        <section
            v-if="Panel.isPanelOpen"
            @keydown.escape="Panel.isPanelOpen = false"
            tabindex="-1"
            aria-labelledby="notificationPanelLabel"
            class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
        >
            <div class="absolute right-0 p-2 transform translate-x-full">
                <!-- Close button -->
                <button
                    @click="Panel.isPanelOpen = false"
                    class="p-2 text-white rounded-md focus:outline-none focus:ring"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div
                class="flex flex-col h-screen"
                x-data="{ activeTabe: 'action' }"
            >
                <!-- Panel header -->
                <div class="flex-shrink-0">
                    <div
                        class="flex items-center justify-between px-4 pt-4 border-b dark:border-primary-darker"
                    >
                        <h2
                            id="notificationPanelLabel"
                            class="pb-4 font-semibold"
                        >
                            {{ label }}
                        </h2>
                    </div>
                </div>

                <!-- Panel content (tabs) -->

                <div
                    class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto"
                >
                    <!-- Action tab -->
                    <div
                        class="space-y-4"
                        x-show.transition.in="activeTabe == 'action'"
                    >
                        <slot></slot>
                    </div>
                    <!-- User tab -->
                </div>
            </div>
            <!-- Body -->
        </section>
    </Transition>
</template>

<script setup>
import { Panel } from "@/store/Panel.js";
defineProps({
    label: String,
});
</script>

<style>
.slide-fade-enter-from {
    transform: translateX(
        500px
    ); /* Change this to a positive value to move in from the left */
    opacity: 0;
}

.slide-fade-enter-active {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-leave-to {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(
        -500px
    ); /* Change this to a negative value to move out to the left */
    opacity: 0;
}
</style>
