<script setup>
import Footer from '@/Components/Footer.vue';
import Navbar from '@/Components/Navbar.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AlertModal from "@/Components/modais/AlertModal.vue"

const alertModal = ref(null)

const { navbar, title } = defineProps({
    navbar: String,
    title: String,
    addClass: String
});

const user = computed(() => usePage().props.user)

const add = () => console.log('olibre')

defineExpose({
    alertModal,
})

</script>

<template>
    <Head :title="title" />
    <Navbar :page="navbar" :user-info="user" />
    <main class="flex flex-col center" :class="addClass">
        <AlertModal ref="alertModal" />
        <slot />
    </main>
    <Footer />
</template>
