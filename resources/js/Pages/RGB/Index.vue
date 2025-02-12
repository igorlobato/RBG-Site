<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth.user;
</script>

<template>
    <Head title="RGB" />

    <AppLayout>
        <div class="p-6">
            <p>TESTANDO CONTEÚDO DENTRO DO APP LAYOUT</p>
        </div>
    </AppLayout>
</template>
