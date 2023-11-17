<script setup>
import App from '@/Layouts/App.vue';
import Paginate from '@/Components/Paginate.vue';
import Book from '@/Components/Book.vue';
import { Head, Link } from '@inertiajs/vue3';

const { books } = defineProps({
    books: {
        type: Object
    }
})
</script>

<template>
    <App title="Livros" navbar="books">
        <section
            class="h-[60vh] w-full max-w-[100%] flex center flex-col bg-gray-300 bg-blend-multiply bg-cover bg-[url('https://images.unsplash.com/photo-1562932831-afcfe48b5786?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1215&q=80')]">
            <form class="gap-8 flex flex-col center">
                <h1 class="mainTitle text-white">Seja Bem Vindo a sua Biblioteca virtual</h1>
                <input type="text" class="text-center p-3 border-none w-3/5 rounded-lg" placeholder="Buscar Livro">
            </form>
        </section>

        <section class="flex flex-col center h-auto w-full p-16 gap-3">
            <h2>Livros Disponiveis</h2>
            <div
                class="grid lg:grid-cols-2 gap-5 gap-y-11 sm:grid-cols-1 max-w-[900px] content-ceneter justify-items-center">
                <div v-for="item in books.data">
                    <Book :book="item" />
                    <!-- <div v-for="item in books.data"> -->
                    <!--     <Link class="rounded-lg" :href="route('book', { id: item.id })"> -->
                    <!--     <img :src="item.imgUrl" class="h-80 w-auto rounded-md"> -->
                    <!--     </Link> -->
                </div>

            </div>

        </section>
        <Paginate :items="books" />
    </App>
</template>

