<script setup>
import PostItem from "@/Components/app/PostItem.vue";
import PostModal from "@/Components/app/PostModal.vue";
import {ref} from "vue";

defineProps({
    posts: Array
})

const showEditModal = ref(false)
const editPost = ref({})

function openEditModal(post) {
    editPost.value = post;
    showEditModal.value = true;
}

const post1 = {
    user: {
        id: 1,
        avatar: 'https://randomuser.me/api/portraits/men/79.jpg',
        name: 'John Smith'
    },
    group: null,
    attachments: [
        {
            id: 1,
            name: 'test.png',
            url: 'https://picsum.photos/1000',
            mime: 'image/png'
        },
        {
            id: 2,
            name: 'test2.png',
            url: 'https://picsum.photos/1000',
            mime: 'image/png'
        },
        {
            id: 3,
            name: 'MyDocument.docx',
            url: '#',
            mime: 'application/msword'
        }
    ],
    body: `
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur aut, consequatur cum cupiditate dicta dolores dolorum facere fugit harum labore minima necessitatibus nobis pariatur provident, quia sequi sint voluptatibus.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur aut, consequatur cum cupiditate dicta dolores dolorum facere fugit harum labore minima necessitatibus nobis pariatur provident, quia sequi sint voluptatibus.</p>
    `,
    created_at: '2023-11-19 15:12'
}
const post2 = {
    user: {
        id: 1,
        avatar: 'https://randomuser.me/api/portraits/men/78.jpg',
        name: 'James Does'
    },
    group: {
        id: 1,
        name: 'Laravel Developers'
    },
    body: `
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur aut, consequatur cum cupiditate dicta dolores dolorum facere fugit harum labore minima necessitatibus nobis pariatur provident, quia sequi sint voluptatibus.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur aut, consequatur cum cupiditate dicta dolores dolorum facere fugit harum labore minima necessitatibus nobis pariatur provident, quia sequi sint voluptatibus.</p>
    `,
    created_at: '2023-11-19 15:12'
}
</script>

<template>
    <div class="overflow-auto">
        <PostItem v-for="post of posts" :key="post.id" :post="post" @editClick="openEditModal"/>

        <PostModal :post="editPost" v-model="showEditModal"/>
    </div>
</template>

<style scoped>

</style>