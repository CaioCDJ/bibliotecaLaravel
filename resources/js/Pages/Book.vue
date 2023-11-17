<script setup>

import App from '@/Layouts/App.vue';

const { book } = defineProps({
    book: {
        type: Object
    }
})

const dtObj = new Date(book.releaseDt)

let dt = dtObj.getDay() + "/" + dtObj.getMonth() + "/" + dtObj.getFullYear();

const styles = "bg-gray-300 bg-blend-multiply bg-cover bg-[url(" + book.imgUrl + ")]";

</script>

<template>
    <App title="Livros" navbar="books">
        <section class="text-gray-600 body-font bg-[#f8f8f8] rounded-sm overflow-hidden h-auto mt-[30px]">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                        :src="book.imgUrl">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ book.publisher }}</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ book.title }}</h1>
                        <div class="flex mb-4 justify-between">
                            <span class="flex items-center">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <span class="text-gray-600 ml-3">4 Reviews</span>
                            </span>
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{
                                    book.category }}</span>
                        </div>
                        <hr class="border-1 w-full">
                        <div class="mt-8 h-36">
                            <table class="h-36 w-full">
                                <tr>
                                    <td class="font-semibold">Data de Lançamento:</td>
                                    <td>{{ dt }}</td>
                                </tr>
                                <tr class="mt-2">
                                    <td class="font-semibold">Quantidade de Paginas:</td>
                                    <td>{{ book.qtPages }}</td>
                                </tr>
                                <tr class="mt-2">
                                    <td class="font-semibold">Autor:</td>
                                    <td>{{ book.author }}</td>
                                </tr>
                                <tr class="mt-2">
                                    <td class="font-semibold">Quantidade:</td>
                                    <td>{{ book.qt }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                        </div>
                        <div class="flex justify-between w-full">
                            <span class="title-font font-medium text-2xl text-gray-900">Quantidade Disponivel: <span
                                    class="font-bold text-emerald-400">{{ book.available }}
                                </span></span>
                            <button class="self-end btnInfo">Alugar</button>
                        </div>
                    </div>
                    <div class="mt-10">
                        <h3 class="text-xl font-bold">Sinopse</h3>
                        <p class="text-justify mt-5 indent-6 leading-relaxed">{{ book.desc }}</p>
                    </div>
                </div>
            </div>
        </section>
    </App>
</template>
