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
            <h2 class="text-lg font-medium text-gray-900">Add Categories</h2>

            <div class="mt-6">
                <InputLabel for="category" value="Category" class="sr-only"
                    >Category</InputLabel
                >

                <TextInput
                    id="category"
                    ref="categoryInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Enter Category Name"
                    @keyup.enter="addCategory"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <PrimaryButton @click="closeModal" class="bg-red-600">
                    Cancel
                </PrimaryButton>

                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="addCategory"
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
    form.post(route("category.store"), {
        preserveScroll: true,
        onSuccess: () => {
            notify();
            closeModal();
        },
        onError: () => categoryInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    AddModal.value = false;

    form.reset();
};

const notify = () => {
    toast.success("Successfully Category Added !", {
        theme: "colored",
        autoClose: 3000,
        position: toast.POSITION.TOP_RIGHT,
    });
};
</script>
