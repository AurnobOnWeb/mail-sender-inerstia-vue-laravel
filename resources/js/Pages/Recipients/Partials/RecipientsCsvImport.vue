<script setup>
import { router, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    file: null,
});

function submit() {
    router.get(route("sendmail"));
}
</script>

<template>
    <form @submit.prevent="submit">
        <input type="text" v-model="form.name" />
        <input type="file" @input="form.file = $event.target.files[0]" />
        <progress
            v-if="form.progress"
            :value="form.progress.percentage"
            max="100"
        >
            {{ form.progress.percentage }}%
        </progress>
        <button type="submit">Submit</button>
    </form>
</template>
