<script setup>
import Post from '@/Components/Post.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth.user;

defineProps(['posts']);
</script>

<template>
    <Head title="RGB" />

    <AppLayout>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <Post
                v-for="post in posts"
                :key="post.id"
                :post="post"
            />
        </div>
    </AppLayout>
</template>
