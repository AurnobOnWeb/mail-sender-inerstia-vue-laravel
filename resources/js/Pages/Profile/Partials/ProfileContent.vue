<template>
    <div class="flex justify-center mt-10">
        <div class="grid gap-10 md:grid-cols-2 w-[100%] md:w-[80%] lg:w-[60%]">
            <h1 class="text-2xl font-semibold capitalize">
                <InputLabel>Name :</InputLabel> {{ user.name }}
            </h1>
            <div class="text-2xl font-semibold">
                <InputLabel>Email :</InputLabel>
                {{ user.email }}
            </div>
            <div class="text-2xl font-semibold capitalize">
                <InputLabel>Phone number :</InputLabel>
                {{ user.phone }}
            </div>
            <div class="text-2xl font-semibold capitalize">
                <InputLabel>Address :</InputLabel>
                {{ user.address }}
            </div>
        </div>
    </div>
</template>

<script setup>
import InputLabel from "@/Components/admin/InputLabel.vue";
import { usePage } from "@inertiajs/vue3";

const user = usePage().props.auth.user;
</script>

<style lang="scss" scoped></style>
