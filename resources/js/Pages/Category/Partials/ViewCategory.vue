<template>
    <DataTable>
        <template #header>
            <AddCategory> </AddCategory>
        </template>
        <template #search-input>
            <input
                type="text"
                id="table-search-users"
                class="block p-2 ps-10 text-sm text-dark border border-primary rounded-lg w-80 bg-light focus:ring-primary focus:border-primary dark:bg-darker dark:border-primary dark:placeholder-light dark:text-light dark:focus:ring-primary dark:focus:border-primary"
                placeholder="Search for Category"
                v-model="searchinput"
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
                v-for="items in category.data"
                :key="items.id"
            >
                <td class="px-6 py-4">{{ items.name }}</td>
                <td
                    class="px-6 py-4"
                    :class="{ 'text-red-600': items.status === 'Inactive' }"
                >
                    {{ items.status }}
                </td>
                <td class="px-6 py-4 flex gap-2 justify-center">
                    <EditCategory
                        :id="items.id"
                        :name="items.name"
                        :status="items.status"
                    >
                    </EditCategory>
                    <DeleteCategory
                        :id="items.id"
                        :name="items.name"
                    ></DeleteCategory>
                </td>
            </tr>
        </template>
        <template #paginator>
            <Paginator :links="category.links"></Paginator>
        </template>
    </DataTable>
</template>

<script setup>
import AddCategory from "@/Pages/Category/Partials/AddCategory.vue";
import DataTable from "@/Components/admin/DataTable.vue";
import Paginator from "@/Components/admin/Paginator.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import DeleteCategory from "./DeleteCategory.vue";
import EditCategory from "./EditCategory.vue";

const props = defineProps({
    filter: String,
    category: Object,
});

// search query
let searchinput = ref(props.filter);
watch(searchinput, (value) => {
    router.get(
        route("category.index"),
        { search: value },
        { preserveState: true }
    );
});
</script>

<style lang="scss" scoped></style>
