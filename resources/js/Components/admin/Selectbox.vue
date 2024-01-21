<!-- SelectBox.vue -->
<template>
    <select
        v-model="selectedValue"
        @change="handleChange"
        class="bg-light border border-primary text-dark mb-6 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-primary dark:border-primary dark:placeholder-primary dark:text-white dark:focus:ring-primary dark:focus:border-primary"
    >
        <option
            v-for="(option, index) in options"
            :key="index"
            :value="option.value"
            :selected="option.value === valueOfSelect"
        >
            {{ option.label }}
        </option>
    </select>
</template>

<script>
export default {
    props: {
        valueOfSelect: {
             type: Array,
            required: true,
        },
        options: {
            type: Array,
            required: true,
        },
        value: {
            type: [String, Number],
            default: "",
        },
    },
    data() {
        return {
            selectedValue: this.value,
        };
    },
    methods: {
        handleChange() {
            this.$emit("input", this.selectedValue);
        },
    },
};
</script>
