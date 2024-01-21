<template>
    <PrimaryButton
        class="flex justify-center bg-primary"
        @click="openModal"
        @close="closeModal"
    >
        + Add Category
    </PrimaryButton>

    <Modal :show="AddModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Add Recipients</h2>

            <div class="mt-6">
                <InputLabel for="category" value="Category" class="sr-only"
                    >Recipients</InputLabel
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
import { nextTick, ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";

const AddModal = ref(false);

const openModal = () => {
    AddModal.value = true;
    nextTick(() => categoryInput.value.focus());
};

const categoryInput = ref(null);

const form = useForm({
    name: "",
    status: "Active",
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
