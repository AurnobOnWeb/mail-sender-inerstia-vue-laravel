<script setup>
import BreadCumbs from "@/Components/admin/BreadCumbs.vue";
import BreadCumbsLinks from "@/Components/admin/BreadCumbsLinks.vue";
import ContentHeade from "@/Components/admin/ContentHeade.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ProfileContent from "@/Pages/Profile/Partials/ProfileContent.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";

import { ref } from "vue";
const switchbtn = ref(false);
</script>
<template>
    <AdminLayout>
        <Head title="Profile"></Head>
        <ContentHeade label="Profile">
            <BreadCumbs>
                <BreadCumbsLinks label="Profile" :href="route('profile.edit')">
                </BreadCumbsLinks>
            </BreadCumbs>
        </ContentHeade>
        <div class="mt-2 p-4">
            <div class="w-full bg-white dark:bg-darker h-auto rounded-lg p-4">
                <div
                    class="mt-2 w-full h-20 flex justify-between items-center px-10 rounded-tr-lg rounded-tl-lg bg-light dark:bg-dark border dark:border-primary"
                >
                    <h2 class="text-xl font-bold text-dark dark:text-light">
                        My Profile
                    </h2>
                    <div
                        class="border-2 border-primary px-4 py-2 flex items-center"
                    >
                        <button
                            @click="switchbtn = !switchbtn"
                            class="fill-primary"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M14.078 4.232l-12.64 12.639-1.438 7.129 7.127-1.438 12.641-12.64-5.69-5.69zm-10.369 14.893l-.85-.85 11.141-11.125.849.849-11.14 11.126zm2.008 2.008l-.85-.85 11.141-11.125.85.85-11.141 11.125zm18.283-15.444l-2.816 2.818-5.691-5.691 2.816-2.816 5.691 5.689z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <template v-if="switchbtn == false">
                    <ProfileContent></ProfileContent>
                </template>

                <template v-if="switchbtn == true">
                    <UpdateProfileInformationForm></UpdateProfileInformationForm>
                </template>

                <template v-if="switchbtn == true">
                    <UpdatePasswordForm> </UpdatePasswordForm>
                </template>
            </div>
        </div>
    </AdminLayout>
</template>

<style lang="scss" scoped></style>
