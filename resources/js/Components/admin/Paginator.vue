<template>
    <div class="flex gap-2 rounded">
        <Link
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            class="border border-primary lg:px-2 rounded-md md:p-1 px-[3px]"
            preserve-scroll
        ></Link>
    </div>
</template>

<script setup>
defineProps({
    links: Array,
});
</script>

<style lang="scss" scoped></style>
