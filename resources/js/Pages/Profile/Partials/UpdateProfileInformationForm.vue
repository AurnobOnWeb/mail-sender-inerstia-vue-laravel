<template>
    <form @submit.prevent="form.patch(route('profile.update'))">
        <div class="flex justify-center mt-10">
            <div
                class="grid gap-6 md:grid-cols-2 w-[100%] md:w-[80%] lg:w-[60%]"
            >
                <div>
                    <InputLabel id="full_name"
                        >Full Name
                        <span class="text-primary">*</span> :</InputLabel
                    >
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Full Name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <InputLabel id="email"
                        >Email <span class="text-primary">*</span> :</InputLabel
                    >
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                        placeholder="Enter Your Email"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <InputLabel id="phone_number">Phone Number :</InputLabel>
                </div>
                <div>
                    <InputLabel id="address">Address :</InputLabel>
                </div>
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>
        </div>
    </form>
</template>

<script setup>
import PrimaryButton from "@/Components/admin/PrimaryButton.vue";
import InputLabel from "@/Components/admin/InputLabel.vue";
import TextInput from "@/Components/admin/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { watch } from "vue";
import { toast } from "vue3-toastify";

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});

watch(
    () => form.recentlySuccessful,
    (newValue) => {
        if (newValue) {
            toast.success("Successfully Profile Updated !", {
                theme: "colored",
                autoClose: 3000,
                position: toast.POSITION.TOP_RIGHT,
            });
        }
    }
);
</script>

<style lang="scss" scoped></style>
