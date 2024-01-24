<template>
    <aside
        class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block"
    >
        <div class="flex flex-col h-full">
            <!-- Sidebar links -->
            <div class="h-12 w-full">
                <div
                    class="p-2 flex items-center justify-center gap-4 dark:text-light font-bold"
                >
                    <img
                        src="https://www.amplethemes.com/wp-content/uploads/edd/2020/07/5345488-icon-png-logos-208178-free-icons-library-png-logos-1000_979_preview.png"
                        class="h-12"
                    />
                    <h1>Admin Panel</h1>
                </div>
            </div>
            <nav
                aria-label="Main"
                class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto mt-2"
            >
                <SideBarButton
                    label="Dashboards"
                    :href="route('dashboard')"
                    :class="{
                        'bg-primary-100 dark:bg-primary':
                            route().current('dashboard'),
                    }"
                >
                    <template #icon>
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                    </template>
                </SideBarButton>
                <SideBarButton
                    label="category"
                    :href="route('category.index')"
                    :class="{
                        'bg-primary-100 dark:bg-primary':
                            route().current('category.index'),
                    }"
                >
                    <template #icon> </template>
                </SideBarButton>
                <SideBarButton
                    label="Recipients"
                    :href="route('recipients.index')"
                    :class="{
                        'bg-primary-100 dark:bg-primary':
                            route().current('recipients.index'),
                    }"
                >
                    <template #icon> </template>
                </SideBarButton>
                <SideBarButton
                    label="Send mail"
                    :href="route('send.mail')"
                    :class="{
                        'bg-primary-100 dark:bg-primary':
                            route().current('send.mail'),
                    }"
                >
                    <template #icon> </template>
                </SideBarButton>

                <!-- Add more Dropdown components as needed -->
                <Dropdown label="Another Dropdown">
                    <template #icon>
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                    </template>
                    <template #item>
                        <DropdownButton
                            href="/ko"
                            label="Default"
                        ></DropdownButton>
                        <DropdownButton
                            href="/ko"
                            label="ecommerce"
                        ></DropdownButton>
                        <DropdownButton
                            href="/manage"
                            label="Project Management (soon)"
                        ></DropdownButton>
                    </template>
                </Dropdown>

                <!-- Sidebar Footer -->
                <div class="flex-shrink-0 px-2 py-4 space-y-2">
                    <button
                        @click="Settings.isSettings = true"
                        type="button"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
                    >
                        <span aria-hidden="true">
                            <svg
                                class="w-4 h-4 mr-2"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                                />
                            </svg>
                        </span>
                        <span>Customize</span>
                    </button>
                </div>
            </nav>
        </div>
    </aside>
</template>

<script setup>
import Dropdown from "@/Components/admin/Dropdown.vue";
import DropdownButton from "@/Components/admin/DropdownButton.vue";
import SideBarButton from "@/Components/admin/SideBarButton.vue";

import { Settings } from "@/store/Settings.js";
</script>
