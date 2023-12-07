<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const { page } = defineProps({
    page: String
})

const openBooks = ref(false)
const openUsers = ref(false)

const showBooks = () => openBooks.value = !openBooks.value

const showUsers = () => openUsers.value = !openUsers.value;

</script>

<template>
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <li class="cursor-pointer"
                    :class="(page == 'dashboard') ? 'bg-sky-500 text-white rounded-md' : 'text-gray-900'">
                    <Link :href="route('admin.index')" class="flex items-center p-2 font-medium  rounded-lg group">
                    <i class="pi pi-home text-2xl" :class="(page == 'dashboard') ? ' text-white' : 'text-gray-900'"></i>
                    <span class="ml-3" :class="(page == 'dashboard') ? 'text-white' : ''">Dashboard</span>
                    </Link>
                </li>
                <li>
                    <button @click="showBooks" type="button"
                        :class="(page == 'books') ? 'bg-sky-500 text-white rounded-t-lg' : 'hover:bg-gray-100 rounded-lg text-gray-900'"
                        class="flex items-center p-2 w-full font-medium  transition duration-75 group  dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                        <i class="pi pi-book text-2xl" :class="(page == 'books') ? ' text-white' : 'text-gray-900'"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap"
                            :class="(page == 'books') ? 'text-white' : 'text-gray-900'">Livros</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages" v-show="openBooks" :class="(page == 'books') ? 'bg-sky-500' : ''"
                        class="py-2 space-y-2 rounded-b-lg ">
                        <li class="cursor-pointer">
                            <Link :href="route('admin.books')"
                                :class="(page == 'books') ? 'text-white hover:bg-sky-600' : 'text-gray-900 hover:bg-gray-100'"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium  rounded-lg transition duration-75 group 0 dark:text-white dark:hover:bg-gray-700">
                            Livros</Link>
                        </li>
                        <li>
                            <Link :href="route('admin.addBook')"
                                :class="(page == 'books') ? 'text-white hover:bg-sky-600' : 'text-gray-900 hover:bg-gray-100'"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">
                            Adicionar</Link>
                        </li>
                        <li>
                            <Link :href="route('admin.borrows')"
                                :class="(page == 'books') ? 'text-white hover:bg-sky-600' : 'text-gray-900 hover:bg-gray-100'"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">
                            Emprestimos</Link>
                        </li>
                    </ul>
                </li>

                <li>
                    <button @click="showUsers" type="button"
                        :class="(page == 'users') ? 'bg-sky-500 text-white rounded-t-lg' : 'hover:bg-gray-100 rounded-lg text-gray-900'"
                        class="flex items-center p-2 w-full text-base font-medium  transition duration-75 group  dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                        <i class="pi pi-users text-2xl" :class="(page == 'users') ? 'text-white' : 'text-gray-900'"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap"
                            :class="(page == 'users') ? 'text-white' : 'text-gray-900'">Usuarios</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <ul id="dropdown-pages" v-show="openUsers" :class="(page == 'users') ? 'bg-sky-500' : ''"
                        class="py-2 space-y-2 rounded-b-lg ">
                        <li>
                            <Link :href="route('admin.users')"
                                :class="(page == 'users') ? 'text-white hover:bg-sky-600' : 'text-gray-900 hover:bg-gray-100'"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">
                            Clientes</Link>
                        </li>
                        <li>
                            <Link :href="route('admin.lst')"
                                :class="(page == 'users') ? 'text-white hover:bg-sky-600' : 'text-gray-900 hover:bg-gray-100'"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">
                            Administradores</Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</template>

