<script setup>

import InputTextarea from "@/Components/InputTextarea.vue";
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    form: Object
})

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { Ckeditor } from "@ckeditor/ckeditor5-vue";

const editor = ClassicEditor;
const editorConfig = {
  toolbar: [
    "bold",
    "italic",
    "|",
    "bulletedList",
    "numberedList",
    "|",
    "heading",
    "|",
    "outdent",
    "indent",
    "|",
    "link",
    "|",
    "blockQuote",
  ],
  licenseKey:
    "eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDE5OTY3OTksImp0aSI6IjcwNTZhMGVlLTVmM2ItNDM4My04NDA4LTZiYzM1NDc2ZmNiYyIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6Ijc3ZTc0NDY4In0.F_GHcB2aiZJmS2NPJqSovx6tShHlYwS9hO5NiITropP3-HffJuQV_wiBq3vSK0C2yN-P1zgvFAhoue5UTERTlw",
};

</script>

<template>
    <div class="mb-3">
        <label>Group Name</label>
        <TextInput
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
            required
            autofocus
        />
    </div>

    <div class="mb-3">
        <label>
            <Checkbox name="remember" v-model:checked="form.auto_approval"/>
            Enable Auto Approval
        </label>
    </div>

    <div class="mb-3">
        <label>About Group</label>

        <Ckeditor :editor="editor" v-model="form.about" :config="editorConfig"></Ckeditor>
    </div>
</template>

<style scoped>

</style>
