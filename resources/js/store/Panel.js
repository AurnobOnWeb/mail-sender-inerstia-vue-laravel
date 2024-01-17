import { ref } from "vue";

export const Panel = ref({
    isPanelOpen: false,
    SetIsOpened(value) {
        Panel.value.isPanelOpen = value;
    },
});
