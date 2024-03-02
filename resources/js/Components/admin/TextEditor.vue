<template>
    <QuillEditor toolbar="minimal" />
</template>
<script setup>
import { ref, defineComponent } from "vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

// export default defineComponent({
//     components: {
//         QuillEditor,
//     },
//     setup() {
//         const modules = ref({
//             toolbar: [
//                 // define your toolbar options here if needed
//             ],
//         });

//         modules.value.imageUploader = ImageUploader;

//         //   const uploadImage = file => {
//         //     return new Promise((resolve, reject) => {
//         //       const formData = new FormData()
//         //       formData.append('image', file)

//         //       Inertia.post('/upload-image', formData)
//         //         .then(response => {
//         //           console.log(response)
//         //           resolve(response.data.url)
//         //         })
//         //         .catch(error => {
//         //           console.error('Error:', error)
//         //           reject('Upload failed')
//         //         })
//         //     })
//         //   }

//         //   modules.value.options = {
//         //     imageUpload: uploadImage,
//         //     // other Quill options if needed
//         //   }

//         return { modules };
//     },
// });
</script>
