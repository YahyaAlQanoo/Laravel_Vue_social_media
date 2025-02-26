<script setup>
import PostItem from "@/Components/app/PostItem.vue";
import { ref } from "vue";
import PostModal from "./PostModal.vue";

defineProps({
    posts: Array
})

const showEditModal = ref(false)
const editPost = ref({})
function openEditModal(post) {
    editPost.value = post;
    showEditModal.value = true;
}



const post1 ={
    user: {
        id: 1,
        avatar: "https://avatars.githubusercontent.com/u/98155520?v=4",
        name: "John Smith",
    },
    group: null,
    attachments: [
        {
            id: 1,
            name: 'test.png',
            url: '/images/1.jpg',
            mime: 'image/png'
        },
        {
            id: 2,
            name: 'test2.png',
            url: '/images/2.jpg',
            mime: 'image/png'
        },
        {
            id: 3,
            name: 'MyDocument.docx',
            url: '#',
            mime: 'application/msword'
        }

    ],
    body: `<p>Lorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associated</p>
         <p>Lorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associated</p>`,
    created_at: '2023-11-19 15:12'
}
const post2 ={
    user: {
        id: 2,
        avatar: "http://",
        name: "Yahya Smith",
    },
    group: {
        id: 1,
        name: "Yahya Smith",
    },
    body: `<p>Lorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associated</p>
         <p>Lorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associatedLorem ipsum dolor sit amet, consectetur adip , Alias associated</p>`,
    created_at: '2023-11-19 15:12'
}
</script>

<template>
    <div>
        <PostItem v-for="post of posts" :key="post.id" :post="post" @editClick="openEditModal"/>

        <PostModal :post="editPost" v-model="showEditModal"/>
    </div>
</template>

<style></style>