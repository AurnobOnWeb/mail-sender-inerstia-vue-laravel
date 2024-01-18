<template>
    <label
        :for="id"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    >
        <span v-if="label">{{ label }}</span> <span v-else><slot /></span
    ></label>
</template>

<script setup>
defineProps({
    label: String,
    id: String,
});
</script>

<style lang="scss" scoped></style>
