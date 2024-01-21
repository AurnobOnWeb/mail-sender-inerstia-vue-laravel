<template>
    <select
        id="default"
        class="bg-light border border-primary text-dark mb-6 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-primary dark:border-primary dark:placeholder-primary dark:text-white dark:focus:ring-primary dark:focus:border-primary"
    >
        <option selected value="">{{ label }}</option>
        <slot></slot>
    </select>
</template>

<script setup>
defineProps({
    label: String,
});
</script>

<style lang="scss" scoped></style>
