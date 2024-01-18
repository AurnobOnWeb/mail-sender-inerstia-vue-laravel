<template>
    <div class="mt-16">
        <h3
            class="ml-2 md:ml-[28%] lg:ml-[32%] text-primary text-3xl font-bold mb-4"
        >
            Password
        </h3>
        <hr class="w-full border dark:border-primary" />
    </div>
    <form @submit.prevent="updatePassword">
        <div class="w-full flex justify-center mt-10">
            <div
                class="grid gap-6 md:grid-cols-1 w-[100%] md:w-[45%] lg:w-[35%]"
            >
                <div>
                    <InputLabel
                        for="current_password"
                        label="Current Password"
                    />

                    <TextInput
                        id="current_password"
                        ref="currentPasswordInput"
                        v-model="form.current_password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="current-password"
                        placeholder="Current Password"
                    />

                    <InputError
                        :message="form.errors.current_password"
                        class="mt-2"
                    />
                </div>

                <div>
                    <InputLabel for="password" label="New Password" />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                        placeholder="New Password"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div>
                    <InputLabel
                        for="password_confirmation"
                        label="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                        placeholder="Confirm Password"
                    />

                    <InputError
                        :message="form.errors.password_confirmation"
                        class="mt-2"
                    />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing"
                        >Save</PrimaryButton
                    >
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import PrimaryButton from "@/Components/admin/PrimaryButton.vue";
import InputLabel from "@/Components/admin/InputLabel.vue";
import TextInput from "@/Components/admin/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { watch } from "vue";
import { toast } from "vue3-toastify";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
watch(
    () => form.recentlySuccessful,
    (newValue) => {
        if (newValue) {
            toast.success("Successfully Password Updated !", {
                theme: "colored",
                autoClose: 3000,
                position: toast.POSITION.TOP_RIGHT,
            });
        }
    }
);
</script>

<style lang="scss" scoped></style>
