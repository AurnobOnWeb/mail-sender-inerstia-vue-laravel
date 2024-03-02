<template>
    <PrimaryButton
        class="flex justify-center bg-primary"
        @click="openModal"
        @close="closeModal"
    >
        + Mail Now
    </PrimaryButton>

    <Modal :show="AddModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Mail Now</h2>

            <div class="mt-6">
                <select
                    id="Category"
                    class="bg-light border border-primary text-dark mb-6 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-primary dark:border-primary dark:placeholder-primary dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                    v-model="form.category_id"
                >
                    <option value="" selected>Select Category</option>

                    <template v-for="item in categorylist" :key="item.id">
                        <option :value="item.id">{{ item.name }}</option>
                    </template>
                </select>

                <InputError :message="form.errors.category_id" class="mt-2" />
            </div>

            <div class="mt-6">
                <TextInput
                    id="mailsubject"
                    ref="mailsubjectInput"
                    v-model="form.mail_subject"
                    type="text"
                    class="mt-1 block"
                    placeholder="Enter Mail Subject"
                />

                <InputError :message="form.errors.mail_subject" class="mt-2" />
            </div>

            <div class="mt-6">
                <QuillEditor
                    theme="snow"
                    :modules="modules"
                    toolbar="full"
                    v-model:content="form.mail_body"
                    contentType="html"
                />
                <InputError :message="form.errors.mail_body" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <PrimaryButton @click="closeModal" class="bg-red-600">
                    Cancel
                </PrimaryButton>

                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="addRecipients"
                >
                    Save
                </PrimaryButton>
            </div>
        </div></Modal
    >
</template>

<script setup>
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

import PrimaryButton from "@/Components/admin/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import Modal from "@/Components/admin/Modal.vue";
import TextInput from "@/Components/admin/TextInput.vue";
import { nextTick, ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";

defineProps({
    categorylist: Array,
});
const AddModal = ref(false);

const openModal = () => {
    AddModal.value = true;
    nextTick(() => mailsubjectInput.value.focus());
};

const mailsubjectInput = ref(null);

const form = useForm({
    mail_subject: "",
    mail_body: "",
    category_id: "",
});

const addRecipients = () => {
    form.post(route("send.mail.store"), {
        preserveScroll: true,
        onSuccess: () => {
            notify();
            closeModal();
            form.reset();
        },
        onError: () => mailsubjectInput.value.focus(),
    });
};

const closeModal = () => {
    AddModal.value = false;
};

const notify = () => {
    toast.success("Successfully Mail Send !", {
        theme: "colored",
        autoClose: 3000,
        position: toast.POSITION.TOP_RIGHT,
    });
};
</script>
