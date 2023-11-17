<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue';
import Navbar from '@/Components/Navbar.vue';
import App from '@/Layouts/App.vue';

const { books, mostAvailable } = defineProps({
    books: {
        type: Array
    },
    mostAvailable: {
        type: Array
    }
});

</script>

<template>
    <App title="Index" navbar="home">
        <section
            class="h-screen w-full max-w-[100%] flex center flex-col bg-gray-300 bg-blend-multiply bg-cover bg-[url('https://images.unsplash.com/photo-1562932831-afcfe48b5786?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1215&q=80')]">
            <form class="gap-8 flex flex-col center">
                <h1 class="mainTitle text-white">Seja Bem Vindo a sua Biblioteca virtual</h1>
                <input type="text" class="text-center p-3 border-none w-3/5 rounded-lg" placeholder="Buscar Livro">
            </form>
        </section>

        <section class="h-screen flex flex-row p-3 center">
            <div class="w-[50%] p-10 flex flex-col">
                <h2 class="added-title">Livros Recém Adicionados</h2>
                <p class="text-justify intent-6">
                    Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore
                    culpa
                    sint ad nisi Lorem
                    pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud
                    nostrud
                    ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia
                    pariatur ut
                    officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis
                    laboris
                    cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis
                    officia
                    eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint
                    cupidatat
                    ullamco ut ea consectetur et est culpa et culpa duis.</p>
                <ul class="list-disc ml-10 mt-3">
                    <li class="font-semibold italic text-xl">Alguma vantagem</li>
                    <li class="font-semibold italic text-xl">Alguma desvantagem</li>
                    <li class="font-semibold italic text-xl">Alguma coisa boa</li>
                    <li class="font-semibold italic text-xl">Escolhe um e leva logo seu animal</li>
                </ul>
            </div>

            <div class="grid grid-cols-2 h-full w-1/2 gap-3 content-center justify-items-center">
                <div class="max-h-[350px] max-w-[260px] rounded-md" v-for="book in books">
                    <img :src="book.imgUrl" class="h-full w-full z-30 relative rounded-md hover:z-0">
                    <!-- <div class="h-full w-full z-20 bg-red-500 relative"> -->
                    <!--     <h5 class="text-white">{{ book.title }}</h5> -->
                    <!-- </div> -->
                </div>
            </div>
        </section>

        <section
            class="bg-center max-w-[100%] w-full bg-no-repeat bg-cover bg-[url('https://images.unsplash.com/photo-1529148482759-b35b25c5f217?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80')] bg-gray-400 bg-blend-multiply">
            <div class="px-4 mx-auto max-w-screen-xl text-center text-black py-24 lg:py-56">
                <h1
                    class="mb-4 text-blue-500 text-shadow text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    Ficou interessado em algum livro?</h1>
                <p class="mb-8 text-lg font-normal text-white text-gray-300 lg:text-xl sm:px-16 lg:px-48 text-shadow">
                    Não perca seu tempo realize seu cadastro e reserve seu livro.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <Link :href="route('login')"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Login
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    </Link>
                    <Link :href="route('register')"
                        class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Cadastro
                    </Link>
                </div>
            </div>
        </section>

        <section id="about">

        </section>

        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Before they sold out
                        <br class="hidden lg:inline-block">readymade gluten
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi
                        Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia.
                        Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est
                        proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat
                        reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident
                        adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit
                        commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea
                        consectetur et est culpa et culpa duis.
                    </p>
                    <div class="flex justify-center">
                        <Link :href="route('about')"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Saber
                        Mais..</Link>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                </div>
            </div>
        </section>

    </App>
</template>
