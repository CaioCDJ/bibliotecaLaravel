<script setup>

import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const { page, userInfo } = defineProps({
    page: String,
    userInfo: Object
})

let drop = ref(false)

function change() {
    drop.value = !drop.value
    console.log(drop)
}
</script>

<template>
    <nav class="absolute bg-[#fafafadf] w-full dark:bg-gray-900 max-h-[60px]">
        <div class="max-w-screen-xl flex max-h-[60px] flex-wrap items-center justify-between mx-auto p-4">
            <Link :href="route('home')" class="inline-flex h-[40px] space-x-3 rtl:space-x-reverse">
            <img src="/imgs/logo.png" class="h-8" alt="logo.appimage">
            <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">Biblioteca</span>
            </Link>
            <div class="hidden w-full md:block md:w-auto max-h-[50px]" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                    <li>
                        <Link :href="route('home')" v-bind:class="(page == 'home') ? 'text-blue-700' : ''"
                            class="block py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</Link>
                    </li>

                    <li>
                        <Link :href="route('books')" v-bind:class="(page == 'books') ? 'text-blue-700' : ''"
                            class="block py-2 px-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Livros</Link>
                    </li>
                    <li>
                        <Link :href="route('about')" v-bind:class="(page == 'about') ? 'text-blue-700' : ''"
                            class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Sobre</Link>
                    </li>
                    <li>
                        <Link :href="route('login')" v-show="(!userInfo)"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Login</Link>
                    </li>


                    <li v-if="(userInfo.name)" class="w-[150px]">

                        <button id="dropdownAvatarNameButton" @click="change"
                            class="flex items-center mb-2 text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                            type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 me-2 rounded-full"
                                src="data:image/jpeg;base64,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"
                                alt="user photo">
                            {{ userInfo.name }}
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName" :class="(drop) ? '' : 'hidden'"
                            class="z-10 mr-0 divide-y z-50 relative bg-[#fafafadf] divide-gray-100 rounded-lg shadow w-[150px] dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium" v-html="(userInfo.isAdmin) ? 'Adm' : 'Cliente'"></div>
                                <div class="truncate">{{ userInfo.email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <Link :href="route('user.account')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Perfil</Link>
                                </li>
                                <li v-show="(userInfo.isAdmin)">
                                    <Link :href="route('admin.index')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Administrador</Link>
                                </li>
                            </ul>
                            <div class="py-2">
                                <Link :href="route('logout')" method="post"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Sair</Link>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
