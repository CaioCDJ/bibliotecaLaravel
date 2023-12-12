<script setup>
import Adm from '@/Layouts/Adm.vue';
import Paginate from '@/Components/Paginate.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'
import UpdateBookModal from '@/Components/modais/UpdateBookModal.vue';

const { books } = defineProps({
    books: Array
})

const isModalVisible = ref({
    update: false,
})
const updateModal = ref(null);

const adm = ref(null)

const showModal = (prop, obj) => {

    isModalVisible.value[prop] = true
    updateModal.value.updateProps(obj)
    //    emit("updateProps", obj)

};

const closeModal = (prop) => isModalVisible.value[prop] = false;

//adm.value.alertModal.error('Oliver says:', `ola    `)

const frmSearch = useForm({
    search: ''
})

</script>

<template>
    <Adm ref="adm" title="Admin - Livros" page="books">
        <UpdateBookModal ref="updateModal" v-show="isModalVisible.update" @close="closeModal('update')" />
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 md:min-w-[1200px] ">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <h1 class=" text-3xl font-bold tracking-wide">Admin - Livros</h1>
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 mt-3 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" method="post"
                                @submit.prevent="frmSearch.get(route('admin.books'))">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" v-model="frmSearch.search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Buscar livro:">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                    </th>
                                    <th scope="col" class="px-4 py-3">Titlo</th>
                                    <th scope="col" class="px-4 py-3">Autor</th>
                                    <th scope="col" class="px-4 py-3">Editora</th>
                                    <th scope="col" class="px-4 py-3">Categoria</th>
                                    <th scope="col" class="px-4 py-3">Quantidade</th>
                                    <th scope="col" class="px-4 py-3">Disponivel</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-gray-700" v-for="book in books.data">
                                    <th class="px-4 py-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                    </th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 w-max-[20px] dark:text-white">
                                        {{ book.title }}</th>
                                    <td class="px-4 py-3">{{ book.author }}</td>
                                    <td class="px-4 py-3">{{ book.publisher }}</td>
                                    <td class="px-4 py-3">{{ book.category }}</td>
                                    <td class="px-4 py-3">{{ book.qt }}</td>
                                    <td class="px-4 py-3">{{ book.available }}</td>
                                    <td class="px-4 py-3 gap-2 h-full">
                                        <div class="flex center gap-3">
                                            <button class="bg-sky-500 rounded-lg p-2" @click="showModal('update', book)"
                                                :title="'Alterar: ' + book.title"><i
                                                    class="pi pi-file-edit cursor-pointer text-lg text-white"></i></button>
                                            <Link :href="route('admin.book.delete', { id: book.id })" method="delete"
                                                class="bg-red-500 rounded-lg p-2 " :title="'Deletar: ' + book.title"><i
                                                class="pi pi-trash cursor-pointer text-lg text-white"></i></Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end p-4">
                        <Paginate :items="books" />
                    </div>
                </div>
            </div>
        </section>
    </Adm>
</template>
