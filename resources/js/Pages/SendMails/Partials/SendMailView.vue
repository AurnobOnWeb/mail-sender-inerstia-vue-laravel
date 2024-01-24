<template>
    <DataTable>
        <template #header>
            <MailNow :categorylist="categorylist"> </MailNow>
        </template>
        <template #search-input>
            <input
                type="text"
                id="table-search-users"
                class="block p-2 ps-10 text-sm text-dark border border-primary rounded-lg w-80 bg-light focus:ring-primary focus:border-primary dark:bg-darker dark:border-primary dark:placeholder-light dark:text-light dark:focus:ring-primary dark:focus:border-primary"
                placeholder="Search for Mail"
                v-model="searchinput"
            />
        </template>
        <template #table-head>
            <th scope="col" class="px-6 py-3">Subject</th>
            <th scope="col" class="px-6 py-3">Body</th>
            <th scope="col" class="px-6 py-3">Category Name</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </template>
        <template #tbody>
            <tr
                class="bg-light border dark:bg-dark dark:border-dark hover:bg-white dark:hover:bg-darker dark:border dark:border-t-primary transition-colors"
                v-for="items in sendMails.data"
                :key="items.id"
            >
                <td class="px-6 py-4">{{ items.mail_subject }}</td>
                <td class="px-6 py-4">{{ items.mail_body }}</td>

                <td class="px-6 py-4">
                    <template v-for="item in items.category" :key="item.id">
                        {{ item.name }}
                    </template>
                </td>

                <td class="px-6 py-4 flex gap-2 justify-center">
                    <DeleteMails
                        :id="items.id"
                        :mail_subject="items.mail_subject"
                    ></DeleteMails>
                </td>
            </tr>
        </template>
        <template #paginator>
            <Paginator :links="sendMails.links"></Paginator>
        </template>
    </DataTable>
</template>

<script setup>
import DataTable from "@/Components/admin/DataTable.vue";
import Paginator from "@/Components/admin/Paginator.vue";
import DeleteMails from "@/Pages/sendMails/Partials/DeleteMails.vue";
import MailNow from "@/Pages/sendMails/Partials/MailNow.vue";

import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    filter: String,
    sendMails: Object,
    categorylist: Array,
});

// search query
let searchinput = ref(props.filter);
watch(searchinput, (value) => {
    router.get(route("send.mail"), { search: value }, { preserveState: true });
});
</script>

<style lang="scss" scoped></style>
