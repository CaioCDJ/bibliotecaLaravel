<script setup>
import Adm from '@/Layouts/Adm.vue';
import Paginate from '@/Components/Paginate.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import { computed } from 'vue';
import ConfirmModal from '@/Components/modais/ConfirmModal.vue';

const layout = ref(null)

const { borrows } = defineProps({
    borrows: Object,
    paginate: Array
})

const show = () => console.log(usePage().props.flash)

const devolutionFrm = useForm({})

const frmSearch = useForm({
    search: ''
})

const devolution = (id) => {
    devolutionFrm.post(route('admin.borrow.dev', { id: id }), {
        onSuccess: (msg) => layout.value.alertModal.success(msg.props.flash.msg),
        onError: (obj) => layout.value.alertModal.error(obj.msg),
    })
}

</script>

<template>
    <Adm ref="layout" title="Admin - Emprestimos" page="books">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 md:min-w-[1200px]">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <h1 class=" text-3xl font-bold tracking-wide">Admin - Emprestimos</h1>
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 mt-3 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" method="post"
                                @submit.prevent="frmSearch.get(route('admin.borrows'))">
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
                                    <input type="text" id="simple-search" v-model="frmSearch.search"
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
                                    <th scope="col" class="px-4 py-3">Usuario</th>
                                    <th scope="col" class="px-4 py-3">Titulo</th>
                                    <th scope="col" class="px-4 py-3">Data de retirada</th>
                                    <th scope="col" class="px-4 py-3">Data de retorno</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-gray-700" v-for=" borrow  in  borrows ">
                                    <th class="px-4 py-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                    </th>
                                    <td class="px-4 py-3">{{ borrow.name }}</td>
                                    <td class="px-4 py-3">{{ borrow.title }}</td>
                                    <td class="px-4 py-3">{{ borrow.created_at }}</td>
                                    <td class="px-4 py-3">{{ borrow.returnDt }}</td>
                                    <td>
                                        <div class="flex flex-row center">
                                            <span v-show="(borrow.returned)"
                                                class="bg-emerald-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Devolvido</span>
                                            <span v-show="(borrow.devolution == 'ok' && borrow.returned == false)"
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Dentro
                                                do Prazo</span>
                                            <span v-show="(borrow.devolution == 'today' && borrow.returned == false)"
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Ultimo
                                                dia do Prazo</span>
                                            <span v-show="(borrow.devolution == 'late' && borrow.returned == false)"
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Fora
                                                do Prazo</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 gap-2 h-full" v-show="!borrow.returned">
                                        <div class="flex center gap-3">
                                            <button v-show="(!borrow.returned)" class="bg-sky-500 rounded-lg p-2 "><i
                                                    class="pi pi-file-edit cursor-pointer text-lg text-white"></i></button>
                                            <button v-show="(!borrow.returned)" @click="devolution(borrow.id)"
                                                class="bg-emerald-500 rounded-lg p-2 " title="Confirmar Devolução"><i
                                                    class="pi pi-check-circle cursor-pointer text-lg text-white"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end p-4">
                        <Paginate :items="paginate" />
                    </div>
                </div>
            </div>
        </section>
    </Adm>
</template>
