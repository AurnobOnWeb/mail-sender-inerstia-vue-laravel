<script setup>
import { DarkMode } from "@/store/DarkMode.js";
import SideBar from "@/Layouts/SideBar.vue";
import Header from "./Header.vue";
import Notifications from "@/Components/admin/Notifications.vue";
import SettingsColor from "@/Components/admin/SettingsColor.vue";
</script>

<template>
    <div :class="{ dark: DarkMode.isDark }">
        <div
            class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light"
        >
            <!-- Loading screen -->

            <!-- SideBar -->
            <SideBar> </SideBar>

            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                <Header></Header>
                <!-- Main content -->
                <main>
                    <slot></slot>
                </main>

                <!-- Main footer -->
                <footer
                    class="flex items-center justify-between p-4 bg-white border-t dark:bg-darker dark:border-primary-darker"
                >
                    <div>K-WD &copy; 2021</div>
                    <div>
                        Made by
                        <a
                            href="https://github.com/Kamona-WD"
                            target="_blank"
                            class="text-blue-500 hover:underline"
                            >Ahmed Kamel</a
                        >
                    </div>
                </footer>
            </div>

            <!-- Panels -->

            <!-- Settings Panel -->
            <!-- Backdrop -->
            <SettingsColor></SettingsColor>
            <!-- Panel -->
            <Notifications></Notifications>
        </div>
    </div>
</template>

<style>
.slide-fade-setting-enter-from {
    transform: translateX(
        500px
    ); /* Change this to a positive value to move in from the left */
    opacity: 0;
}

.slide-fade-setting-enter-active {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-setting-leave-to {
    transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-setting-enter-from,
.slide-fade-setting-leave-to {
    transform: translateX(
        500px
    ); /* Change this to a negative value to move out to the left */
    opacity: 0;
}
</style>
