<template>
    <DataTable>
        <template #search-input>
            <input
                type="text"
                id="table-search-users"
                class="block p-2 ps-10 text-sm text-dark border border-primary rounded-lg w-80 bg-light focus:ring-primary focus:border-primary dark:bg-darker dark:border-primary dark:placeholder-light dark:text-light dark:focus:ring-primary dark:focus:border-primary"
                placeholder="Search for Category"
            />
        </template>
        <template #table-head>
            <th scope="col" class="px-6 py-3">Category Name</th>
            <th scope="col" class="px-6 py-3">Category Status</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </template>
        <template #tbody>
            <tr
                class="bg-light border dark:bg-dark dark:border-dark hover:bg-white dark:hover:bg-darker dark:border dark:border-t-primary transition-colors"
                v-for="items in category"
                :key="items.id"
            >
                <td class="px-6 py-4">{{ items.name }}</td>
                <td class="px-6 py-4">{{ items.status }}</td>
                <td class="px-6 py-4 flex gap-2 justify-center">
                    <PrimaryButton class="w-[5rem] flex justify-center"
                        ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                            />
                        </svg>
                    </PrimaryButton>
                    <PrimaryButton
                        class="w-[5rem] bg-red-500 flex justify-center"
                        ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                            />
                        </svg>
                    </PrimaryButton>
                </td>
            </tr>
        </template>
    </DataTable>
</template>

<script setup>
import DataTable from "@/Components/admin/DataTable.vue";
import PrimaryButton from "@/Components/admin/PrimaryButton.vue";

import { usePage } from "@inertiajs/vue3";

const category = usePage().props.category;
</script>

<style lang="scss" scoped></style>
