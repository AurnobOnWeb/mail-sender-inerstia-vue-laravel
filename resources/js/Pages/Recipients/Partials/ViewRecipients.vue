<template>
    <DataTable>
        <template #header>
            <AddRecipients :categorylist="categorylist"> </AddRecipients>
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
            <th scope="col" class="px-6 py-3">Recipients Name</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Phone</th>
            <th scope="col" class="px-6 py-3">Address</th>
            <th scope="col" class="px-6 py-3">Category Name</th>
            <th scope="col" class="px-6 py-3">status</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </template>
        <template #tbody>
            <tr
                class="bg-light border dark:bg-dark dark:border-dark hover:bg-white dark:hover:bg-darker dark:border dark:border-t-primary transition-colors"
                v-for="items in recipients.data"
                :key="items.id"
            >
                <td class="px-6 py-4">{{ items.name }}</td>
                <td class="px-6 py-4">{{ items.email }}</td>
                <td class="px-6 py-4">{{ items.phone_number }}</td>
                <td class="px-6 py-4">{{ items.address }}</td>
                <td class="px-6 py-4">
                    <template v-for="item in items.category" :key="item.id">
                        {{ item.name }}
                    </template>
                </td>
                <td
                    class="px-6 py-4"
                    :class="{ 'text-red-600': items.status === 'Inactive' }"
                >
                    {{ items.status }}
                </td>
                <td class="px-6 py-4 flex gap-2 justify-center">
                    <EditRecipients
                        :id="items.id"
                        :name="items.name"
                        :email="items.email"
                        :phone_number="items.phone_number"
                        :address="items.address"
                        :status="items.status"
                        :categorylist="categorylist"
                    >
                    </EditRecipients>

                    <DeleteRecipients
                        :id="items.id"
                        :name="items.name"
                    ></DeleteRecipients>
                </td>
            </tr>
        </template>
        <template #paginator>
            <Paginator :links="recipients.links"></Paginator>
        </template>
    </DataTable>
</template>

<script setup>
import AddRecipients from "@/Pages/Recipients/Partials/AddRecipients.vue";
import DataTable from "@/Components/admin/DataTable.vue";
import Paginator from "@/Components/admin/Paginator.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import DeleteRecipients from "./DeleteRecipients.vue";
import EditRecipients from "./EditRecipients.vue";

const props = defineProps({
    filter: String,
    recipients: Object,
    categorylist: Array,
});

// search query
let searchinput = ref(props.filter);
watch(searchinput, (value) => {
    router.get(
        route("recipients.index"),
        { search: value },
        { preserveState: true }
    );
});
</script>

<style lang="scss" scoped></style>
