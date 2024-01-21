<template>
    <PrimaryButton
        class="flex justify-center bg-primary"
        @click="openModal"
        @close="closeModal"
    >
        + Add Recipients
    </PrimaryButton>

    <Modal :show="AddModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Add Recipients</h2>

            <div class="mt-6">
                <TextInput
                    id="RecipientsName"
                    ref="RecipientsNameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Enter Recipients Name"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="mt-6">
                <TextInput
                    id="RecipientsEmail"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-3/4"
                    placeholder="Enter Recipients Email"
                />

                <InputError :message="form.errors.email" class="mt-2" />
            </div>
            <div class="mt-6">
                <TextInput
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Enter Recipients Description"
                />

                <InputError :message="form.errors.description" class="mt-2" />
            </div>
            <div class="mt-6">
                <TextInput
                    id="phone"
                    v-model="form.phone_number"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Enter Recipients Phone Number"
                />

                <InputError :message="form.errors.phone_number" class="mt-2" />
            </div>
            <div class="mt-6">
                <TextInput
                    id="Address"
                    v-model="form.address"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Enter Recipients Phone Address"
                />

                <InputError :message="form.errors.address" class="mt-2" />
            </div>
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
    nextTick(() => RecipientsNameInput.value.focus());
};

const RecipientsNameInput = ref(null);

const form = useForm({
    name: "",
    email: "",
    description: "",
    phone_number: "",
    address: "",
    category_id: "",
    status: "Active",
});

const addRecipients = () => {
    form.post(route("recipients.store"), {
        preserveScroll: true,
        onSuccess: () => {
            notify();
            closeModal();
            form.reset();
        },
        onError: () => RecipientsNameInput.value.focus(),
    });
};

const closeModal = () => {
    AddModal.value = false;
};

const notify = () => {
    toast.success("Successfully Category Added !", {
        theme: "colored",
        autoClose: 3000,
        position: toast.POSITION.TOP_RIGHT,
    });
};
</script>
