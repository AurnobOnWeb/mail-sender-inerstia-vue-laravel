<script setup>
import BreadCumbs from "@/Components/admin/BreadCumbs.vue";
import BreadCumbsLinks from "@/Components/admin/BreadCumbsLinks.vue";
import ContentHeade from "@/Components/admin/ContentHeade.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ViewCategory from "@/Pages/Category/Partials/ViewCategory.vue";
const props = defineProps({
    filter: String,
    category: Object,
});


</script>
<template>
    <AdminLayout>
        <Head title="Category"></Head>
        <ContentHeade label="Category">
            <BreadCumbs>
                <BreadCumbsLinks
                    label="Category"
                    :href="route('category.index')"
                >
                </BreadCumbsLinks>
            </BreadCumbs>
        </ContentHeade>
        <div class="mt-2 p-4">
            <div class="w-full bg-white dark:bg-darker h-auto rounded-lg p-4">
                <!-- table -->
                <ViewCategory
                    :category="props.category"
                    :filter="props.filter"
                ></ViewCategory>
                <!-- table -->
            </div>
        </div>
    </AdminLayout>
</template>

<style lang="scss" scoped></style>
