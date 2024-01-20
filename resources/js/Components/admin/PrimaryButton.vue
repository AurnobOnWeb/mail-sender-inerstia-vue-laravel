<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="btn bg-primary rounded-md text-light font-semibold px-6 py-2"
    >
        <slot />
    </button>
</template>
