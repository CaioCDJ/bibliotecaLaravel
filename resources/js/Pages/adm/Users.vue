<script setup>
import Adm from '@/Layouts/Adm.vue';
import { useForm, Link } from '@inertiajs/vue3';
import Paginate from '@/Components/Paginate.vue';

const { admins } = defineProps({
    users: Object
})

const frm = useForm({
    search: ''
})
</script>

<template>
    <Adm title="Admin - Lista de Adms" page="users">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <h1 class=" text-3xl font-bold tracking-wide">Lista de Usuarios</h1>
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 mt-3 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" @submit.prevent="frm.get(route('admin.users'))">
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
                                    <input v-model="frm.search" type="text" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search" required="">
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
                                    <th scope="col" class="px-4 py-3">Nome</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Endereço</th>
                                    <th scope="col" class="px-4 py-3">Telefone</th>
                                    <th scope="col" class="px-4 py-3">Data de Criação</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-gray-700" v-for="user in users.data">
                                    <th class="px-4 py-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                    </th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 w-max-[20px] dark:text-white">
                                        {{ user.name }}</th>
                                    <td class="px-4 py-3">{{ user.email }}</td>
                                    <td class="px-4 py-3">{{ user.address }}</td>
                                    <td class="px-4 py-3">{{ user.phone }}</td>
                                    <td class="px-4 py-3">{{ user.created_at }}</td>
                                    <td class="px-4 py-3 gap-2 h-full">
                                        <div class="flex center gap-3">
                                            <Link :href="route('admin.users.toAdmin', { id: user.id })" method="patch"
                                                class="bg-emerald-400 rounded-lg p-2" title="Tornar adm"><i
                                                class="pi pi-verified cursor-pointer text-lg text-white"></i></Link>
                                            <Link method="delete" href="#" class="bg-red-500 rounded-lg p-2"
                                                title="Retirar o privilegio"><i
                                                class="pi pi-times-circle cursor-pointer text-lg text-white"></i></Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end p-4">
                        <Paginate :items="users" />
                    </div>
                </div>
            </div>
        </section>
    </Adm>
</template>
