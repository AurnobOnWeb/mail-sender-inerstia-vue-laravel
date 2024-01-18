<template>
    <div class="mt-16">
        <h3
            class="ml-2 md:ml-[28%] lg:ml-[32%] text-primary text-3xl font-bold mb-4"
        >
            Password
        </h3>
        <hr class="w-full border dark:border-primary" />
    </div>
    <div class="w-full flex justify-center mt-10">
        <div class="grid gap-6 md:grid-cols-1 w-[100%] md:w-[45%] lg:w-[35%]">
            <div>
                <label
                    for="full_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Full name</label
                >
                <input
                    type="text"
                    id="full_name"
                    class="bg-light border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-dark dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                    placeholder="Enter Your Full Name"
                    required
                />
            </div>
            <div>
                <label
                    for="last_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Last name</label
                >
                <input
                    type="text"
                    id="last_name"
                    class="bg-light border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-dark dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                    placeholder="Doe"
                    required
                />
            </div>
            <div>
                <label
                    for="company"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Company</label
                >
                <input
                    type="text"
                    id="company"
                    class="bg-light border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-dark dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                    placeholder="Flowbite"
                    required
                />
            </div>
            <button
                class="btn bg-primary w-[10rem] rounded-md text-light font-semibold px-6 py-2"
            >
                Save
            </button>
        </div>
    </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
