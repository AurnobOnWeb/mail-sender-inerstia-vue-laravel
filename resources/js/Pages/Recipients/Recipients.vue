<script setup>
import BreadCumbs from "@/Components/admin/BreadCumbs.vue";
import BreadCumbsLinks from "@/Components/admin/BreadCumbsLinks.vue";
import ContentHeade from "@/Components/admin/ContentHeade.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ViewRecipients from "@/Pages/Recipients/Partials/ViewRecipients.vue";
const props = defineProps({
    filter: String,
    recipients: Object,
    categorylist: Array,
});
</script>
<template>
    <AdminLayout>
        <Head title="Recipients"></Head>
        <ContentHeade label="Recipients">
            <BreadCumbs>
                <BreadCumbsLinks
                    label="Recipients"
                    :href="route('recipients.index')"
                >
                </BreadCumbsLinks>
            </BreadCumbs>
        </ContentHeade>
        <div class="mt-2 p-4">
            <div class="w-full bg-white dark:bg-darker h-auto rounded-lg p-4">
                <!-- table -->
                <ViewRecipients
                    :recipients="props.recipients"
                    :filter="props.filter"
                    :categorylist="categorylist"
                ></ViewRecipients>
                <!-- table -->
            </div>
        </div>
    </AdminLayout>
</template>

<style lang="scss" scoped></style>
