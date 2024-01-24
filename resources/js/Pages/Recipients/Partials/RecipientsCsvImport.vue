<template>
    <PrimaryButton
        class="flex justify-center bg-primary"
        @click="openModal"
        @close="closeModal"
    >
        CSV Import
    </PrimaryButton>

    <Modal :show="AddModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Add CSV Data</h2>
            <div class="mt-6">
                <TextInput
                    type="file"
                    class="mt-1 block w-3/4"
                    @input="form.csv = $event.target.files[0]"
                />

                <InputError :message="form.errors.csv" class="mt-2" />
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
                <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
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

const AddModal = ref(false);

const openModal = () => {
    AddModal.value = true;
};

const form = useForm({
    csv: "",
});

const addRecipients = () => {
    form.post(route("recipients.csv"), {
        preserveScroll: true,
        onSuccess: () => {
            notify();
            closeModal();
            form.reset();
        },
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
