<template>
    <Link
        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
        role="button"
    >
        <span aria-hidden="true">
            <slot name="icon"></slot>
        </span>
        <span class="ml-2 text-sm">{{ label }}</span>
    </Link>
</template>

<script setup>
import { ref } from "vue";
const isActive = ref(false);
defineProps({
    label: String,
});
</script>
