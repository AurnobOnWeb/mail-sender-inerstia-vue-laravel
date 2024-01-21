<template>
    <PrimaryButton
        class="flex justify-center bg-primary"
        @click="openModal"
        @close="closeModal"
    >
        <svg
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

    <Modal :show="AddModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Update Category</h2>
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
                    @click="addCategory()"
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
import InputLabel from "@/Components/admin/InputLabel.vue";
import Modal from "@/Components/admin/Modal.vue";
import TextInput from "@/Components/admin/TextInput.vue";
import { nextTick, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";
const props = defineProps({
    id: Number,
    name: String,
    status: String,
});
const AddModal = ref(false);

const openModal = () => {
    AddModal.value = true;
    nextTick(() => categoryInput.value.focus());
};

const categoryInput = ref(null);

const form = useForm({
    name: props.name,
    status: props.status,
});

const addCategory = () => {
    form.patch(route("category.update", props.id), {
        preserveScroll: true,
        onSuccess: () => {
            notify();
            closeModal();
        },
        onError: () => {
            categoryInput.value.focus();
        },
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    AddModal.value = false;

    form.reset();
};

const notify = () => {
    toast.success("Successfully Category Updated !", {
        theme: "colored",
        autoClose: 3000,
        position: toast.POSITION.TOP_RIGHT,
    });
};

//select options
const selectOptions = [
    { label: "Select a Category", value: "" },
    { label: "Active", value: "Active" },
    { label: "Inactive", value: "Inactive" },
];
</script>
