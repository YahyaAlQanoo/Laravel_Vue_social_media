<template>
  <teleport to="body">
    <TransitionRoot appear :show="show" as="template">
      <Dialog as="div" @close="closeModal" class="relative z-10">
        <TransitionChild
          as="template"
          enter="duration-300 ease-out"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="duration-200 ease-in"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <div class="fixed inset-0 bg-black/25" />
        </TransitionChild>

        <div class="fixed inset-0 overflow-y-auto">
          <div
            class="flex min-h-full items-center justify-center p-4 text-center"
          >
            <TransitionChild
              as="template"
              enter="duration-300 ease-out"
              enter-from="opacity-0 scale-95"
              enter-to="opacity-100 scale-100"
              leave="duration-200 ease-in"
              leave-from="opacity-100 scale-100"
              leave-to="opacity-0 scale-95"
            >
              <DialogPanel
                class="w-full max-w-md transform overflow-hidden rounded bg-white text-left align-middle shadow-xl transition-all"
              >
                <DialogTitle
                  as="h3"
                  class="flex items-center justify-between py-3 px-4 font-medium bg-gray-100 text-gray-900"
                >
                {{ form.id ? 'Update Post' : 'Create Post' }}
                  <button
                    @click="show = false"
                    class="w-8 h-8 rounded-full hover:bg-black/5 transition flex items-center justify-center"
                  >
                    <XMarkIcon class="w-4 h-4" />
                  </button>
                </DialogTitle>
                <div class="p-4">
                  <PostUserHeader
                    :post="post"
                    :show-time="false"
                    class="mb-4"
                  />
                  <ckeditor
                    :editor="editor"
                    v-model="form.body"
                    :config="editorConfig"
                  ></ckeditor>

                  <!--                                    <InputTextarea v-model="form.body" class="mb-3 w-full"/>-->
                </div>

                <div class="py-3 px-4">
                  <button
                    type="button"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full"
                    @click="submit"
                  >
                    Submit
                  </button>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </teleport>
</template>

<script setup>
import { computed, onMounted, onUpdated, reactive, ref, watch } from "vue";
import { XMarkIcon } from "@heroicons/vue/24/solid";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";
import PostUserHeader from "@/Components/app/PostUserHeader.vue";
import { useForm } from "@inertiajs/vue3";

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

const props = defineProps({
  post: {
    type: Object,
    required: true,
  },
  modelValue: Boolean,
});

const form = useForm({
  id: null,
  body: "",
});

const show = computed({
  get: () => props.modelValue,
  set: (value) => emit("update:modelValue", value),
});

const emit = defineEmits(["update:modelValue"]);

watch(
  () => props.post,
  () => {
    form.id = props.post.id;
    form.body = props.post.body;
  }
);

function closeModal() {
  show.value = false;
}

function submit() {
    if (form.id) {
        form.put(route('post.update', props.post.id), {
            preserveScroll: true,
            onSuccess: () => {
                show.value = false
                form.reset()
            }
        })
    } else {
        form.post(route('post.create'), {
            preserveScroll: true,
            onSuccess: () => {
                show.value = false
                form.reset()
            }
        })
    }
}



// in here make formate docs
</script>