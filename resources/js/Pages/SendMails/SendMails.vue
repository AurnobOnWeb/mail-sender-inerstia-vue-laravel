<script setup>
import BreadCumbs from "@/Components/admin/BreadCumbs.vue";
import BreadCumbsLinks from "@/Components/admin/BreadCumbsLinks.vue";
import ContentHeade from "@/Components/admin/ContentHeade.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SendMailView from "@/Pages/sendMails/Partials/SendMailView.vue";
const props = defineProps({
    filter: String,
    sendMails: Object,
    categorylist: Array,
});
</script>
<template>
    <AdminLayout>
        <Head title="Send Mails"></Head>
        <ContentHeade label="Send Mails">
            <BreadCumbs>
                <BreadCumbsLinks label="Send Mails" :href="route('send.mail')">
                </BreadCumbsLinks>
            </BreadCumbs>
        </ContentHeade>
        <div class="mt-2 p-4">
            <div class="w-full bg-white dark:bg-darker h-auto rounded-lg p-4">
                <!-- table -->
                <SendMailView
                    :sendMails="props.sendMails"
                    :filter="props.filter"
                    :categorylist="categorylist"
                ></SendMailView>
                <!-- table -->
            </div>
        </div>
    </AdminLayout>
</template>

<style lang="scss" scoped></style>
