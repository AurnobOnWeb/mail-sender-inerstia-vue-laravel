import { ref } from "vue";

export const Settings = ref({
    isSettings: false,
    SetIsOpened(value) {
        Settings.value.isSettings = value;
    },
});

