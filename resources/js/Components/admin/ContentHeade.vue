<template>
    <div
        class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker"
    >
        <h1 class="text-2xl font-semibold">{{ label }}</h1>

        <!-- Breadcrumb -->
        <nav
            class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-primary-200 dark:bg-primary-200 dark:border-gray-700"
            aria-label="Breadcrumb"
        >
            <ol
                class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
            >
                <li class="inline-flex items-center">
                    <Link
                        :href="route('dashboard')"
                        class="inline-flex items-center text-sm font-medium text-dark dark:text-light hover:text-primary dark:hover:text-primary"
                    >
                        <svg
                            class="w-3 h-3 me-2.5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                            />
                        </svg>
                        Dashboard
                    </Link>
                </li>
                <slot></slot>
            </ol>
        </nav>
    </div>
</template>

<script setup>
defineProps({
    label: String,
});
</script>

<style lang="scss" scoped></style>
