<script setup>
import {Menu, MenuButton, MenuItems, MenuItem} from '@headlessui/vue'
import {PencilIcon, TrashIcon, EllipsisVerticalIcon} from '@heroicons/vue/20/solid'
import {Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import {ref} from "vue";
import PostUserHeader from "@/Components/app/PostUserHeader.vue";
import ReadMoreReadLess from "@/Components/app/ReadMoreReadLess.vue";
import EditDeleteDropdown from "@/Components/app/EditDeleteDropdown.vue";
import PostAttachments from "@/Components/app/PostAttachments.vue";
import CommentList from "@/Components/app/CommentList.vue";
import { router , usePage } from '@inertiajs/vue3';
import { isImage } from "@/helpers.js";
import { ArrowDownTrayIcon, ChatBubbleLeftEllipsisIcon, ChatBubbleLeftRightIcon, HandThumbUpIcon, PaperClipIcon } from '@heroicons/vue/24/solid';
import axiosClient from "@/axiosClient.js";
import IndigoButton from './IndigoButton.vue';
import InputTextarea from '../InputTextarea.vue';

const editingComment = ref(null);

const authUser = usePage().props.auth.user;

const props = defineProps({
    post: Object
})

const newCommentText = ref('')

const emit = defineEmits(['editClick','attachmentClick'])

function openEditModal(){
    emit('editClick', props.post)
}

function deletePost(){
    if (window.confirm('Are you sure you want to delete this post?')) {
        router.delete(route('post.destroy', props.post), {
            preserveScroll: true
        })
    }
}

function openAttachment(ind){
    emit('attachmentClick', props.post, ind)
}

function sendReaction() {
    axiosClient.post(route('post.reaction', props.post), {
        reaction: 'like'
    })
    .then(({data}) => {
        props.post.current_user_has_reaction = data.current_user_has_reaction
        props.post.num_of_reactions = data.num_of_reactions;
    })
}

function createComment() {
    axiosClient.post(route('post.comment.create', props.post), {
        comment: newCommentText.value
    })
    .then(({data}) => {
        newCommentText.value = ''
        props.post.comments.unshift(data)
        props.post.num_of_comments++;
    })
}

function deleteComment(comment) {
    if (!window.confirm('Are you sure you want to delete this comment?')) {
        return false;
    }
    axiosClient.delete(route('post.comment', comment.id))
    .then(({data}) => {
        props.post.comments = props.post.comments.filter(c => c.id !== comment.id)
        props.post.num_of_comments--;
    })
}

function startCommentEdit(comment) {
    console.log(comment)
    editingComment.value = {
        id: comment.id,
        comment: comment.comment.replace(/<br\s*\/?>/gi, '\n') // <br />, <br > <br> <br/>, <br    />
    }
}

function updateComment() {
    axiosClient.put(route('post.comment', editingComment.value.id), editingComment.value)
    .then(({data}) => {
        editingComment.value = null
        props.post.comments = props.post.comments.map((c) => {
            if (c.id === data.id) {
                return data
            }
            return c;
        })
    })
}

function sendCommentReaction(comment) {
    axiosClient.post(route('comment.reaction', comment.id), {
        reaction: 'like'
    })
        .then(({data}) => {
            comment.current_user_has_reaction = data.current_user_has_reaction
            comment.num_of_reactions = data.num_of_reactions;
        })
}





</script>

<template>
    <div class="bg-white border rounded p-4 mb-3">
        <div class="flex items-center justify-between mb-3">
            <PostUserHeader :post="post"/>
            
                <EditDeleteDropdown :user="post.user" :post="post" @edit="openEditModal" @delete="deletePost"/>
          
        </div>
        <div class="mb-3">
            <ReadMoreReadLess :content="post.body" />
        </div>
        <div class="grid gap-3 mb-3" :class="[post.attachments.length === 1 ? 'grid-cols-1' : 'grid-cols-2']">
             

            <PostAttachments @attachmentClick="openAttachment" :attachments="post.attachments" />

            <!--  -->
        </div>
        <Disclosure v-slot="{ open }">
            <div class="flex gap-2">
                <button
                    @click="sendReaction"
                    class="text-gray-800 flex gap-1 items-center justify-center  rounded-lg py-2 px-4 flex-1"
                    :class="[
                    post.current_user_has_reaction ?
                     'bg-sky-100 hover:bg-sky-200' :
                     'bg-gray-100  hover:bg-gray-200'
                ]"
                >
                    <HandThumbUpIcon class="w-5 h-5"/>
                    <span class="mr-2">{{ post.num_of_reactions }}</span>
                    {{ post.current_user_has_reaction ? 'Unlike' : 'Like' }}
                </button>
                <DisclosureButton
                    class="text-gray-800 flex gap-1 items-center justify-center bg-gray-100 rounded-lg hover:bg-gray-200 py-2 px-4 flex-1"
                >
                    <ChatBubbleLeftRightIcon class="w-5 h-5"/>
                    <span class="mr-2">{{ post.num_of_comments }}</span>
                    Comment
                </DisclosureButton>
            </div>

            <DisclosurePanel class="comment-list mt-3 max-h-[400px] overflow-auto">
                <CommentList :post="post" :data="{comments: post.comments}"/>
            </DisclosurePanel>
        </Disclosure>

</div>
</template>

<style scoped>

</style>