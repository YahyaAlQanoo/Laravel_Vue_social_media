<script setup>
import TextInput from "@/Components/TextInput.vue";
import GroupItem from "@/Components/app/GroupItem.vue";
import {ref} from "vue";
const searchKeyword = ref('')
</script>
<template>
    <TextInput :model-value="searchKeyword" placeholder="Type to search" class="w-full mt-4"/>
    <div class="mt-3 h-[200px] lg:flex-1 overflow-auto">
        <div v-if="false" class="text-gray-400 text-center p-3">
            You are not joined to any groups
        </div>
        <div v-else>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel2.png"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Laravel Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
            <GroupItem image="/images/laravel1.jpeg"
                       title="Vue.js Developers"
                       description="Lorem ipsum dolor sit amet, consectetur adipisicing elit."/>
        </div>
    </div>
</template>
<style scoped>
</style>
