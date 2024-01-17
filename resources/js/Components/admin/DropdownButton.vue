<template>
    <Link
        role="menuitem"
        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:text-primary-100 dark:hover:text-primary"
    >
        {{ label }}
    </Link>
</template>

<script setup>
defineProps({
    label: String,
});
</script>

<style lang="scss" scoped></style>
