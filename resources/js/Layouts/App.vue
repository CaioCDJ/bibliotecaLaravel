<script setup>
import Footer from '@/Components/Footer.vue';
import Navbar from '@/Components/Navbar.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const { navbar, title } = defineProps({
    navbar: String,
    title: String,
    addClass: String
});

const user = computed(() => usePage().props.user)
</script>

<template>
    <Head :title="title" />
    <Navbar :page="navbar" :user-info="user" />
    <main class="flex flex-col center" :class="addClass">
        <slot />
    </main>
    <Footer />
</template>
