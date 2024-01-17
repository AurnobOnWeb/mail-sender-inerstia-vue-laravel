import { ref, onMounted } from "vue";

const parseLocalStorageValue = (value) => {
    return value ? JSON.parse(value) : false;
};

const getDarkModeFromLocalStorage = () => {
    const darkModeValue = parseLocalStorageValue(
        localStorage.getItem("darkMode")
    );
    return darkModeValue._value;
};

const setDarkModeToLocalStorage = (value) => {
    localStorage.setItem("darkMode", JSON.stringify(value));
};

export const DarkMode = ref({
    isDark: getDarkModeFromLocalStorage(),
    setIsDark(value) {
        DarkMode.value.isDark = value;
        setDarkModeToLocalStorage(value);
    },
});

onMounted(() => {
    DarkMode.value.isDark = getDarkModeFromLocalStorage();
});
