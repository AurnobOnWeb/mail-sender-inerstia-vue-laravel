<template>
    <button
        @click="open = !open"
        @keydown.escape="open = !open"
        type="button"
        aria-haspopup="true"
        :aria-expanded="open ? 'true' : 'false'"
        class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
    >
        <span class="sr-only">User menu</span>
        <img
            class="w-10 h-10 rounded-full"
            src="https://cdn-icons-png.flaticon.com/512/147/147142.png"
            alt="Ahmed Kamel"
        />
    </button>

    <!-- User dropdown menu -->
    <transition name="fade" mode="out-in">
        <div
            v-if="open"
            @click.away="open = false"
            @keydown.escape="open = false"
            class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
            tabindex="-1"
            role="menu"
            aria-orientation="vertical"
            aria-label="User menu"
        >
            <UserButton
                :href="route('profile.edit')"
                label="Profile"
            ></UserButton>
            <UserButton
                :href="route('logout')"
                label="Logout"
                method="post"
            ></UserButton>
        </div>
    </transition>
</template>

<script setup>
import { ref } from "vue";
import UserButton from "@/Components/admin/UserButton.vue";
const open = ref(false);
</script>

<style lang="scss" scoped></style>
