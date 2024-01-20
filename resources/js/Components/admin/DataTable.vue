<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 bg-light dark:bg-dark px-2 py-6"
        >
            <div class="flex lg:gap-4">
                <slot name="header"></slot>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div
                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-4 pointer-events-none"
                >
                    <svg
                        class="w-4 h-4 text-dark dark:text-light"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                        />
                    </svg>
                </div>
                <slot name="search-input"></slot>
            </div>
        </div>
        <table
            class="w-full text-sm text-left rtl:text-right text-dark dark:text-light"
        >
            <thead
                class="text-xs text-dark uppercase bg-white dark:bg-darker dark:text-light text-center"
            >
                <tr>
                    <slot name="table-head"></slot>
                </tr>
            </thead>
            <tbody class="text-center">
                <slot name="tbody"></slot>
            </tbody>
        </table>
        <div class="flex justify-end my-4 md:px-2">
            <slot name="paginator"></slot>
        </div>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
