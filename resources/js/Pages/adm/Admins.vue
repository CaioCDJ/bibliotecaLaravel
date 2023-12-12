<script setup>
import Adm from '@/Layouts/Adm.vue';
import Paginate from '@/Components/Paginate.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const layout = ref(null)

const { admins } = defineProps({
    admins: Object
})


//let errorsmg = computed(() => usePage().props.flash.error);
//let successsmg = computed(() => usePage().props.flash.success);

//if (errorsmg) alertModal.value.error(errorsmg)

//if (successsmg) alertModal.value.success(successsmg)

</script>

<template>
    <Adm ref="layout" title="Admin - Lista de Adms" page="users">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <h1 class=" text-3xl font-bold tracking-wide">Lista de Administradores</h1>
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 mt-3 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
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
                                <tr class="border-b dark:border-gray-700" v-for="user in admins.data">
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
                                            <Link method="patch"
                                                :href="route('admin.users.withdrawPrivileges', { id: user.id })"
                                                class="bg-red-500 rounded-lg p-2" title="Retirar o privilegio"><i
                                                class="pi pi-times-circle cursor-pointer text-lg text-white"></i></Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end p-4">
                        <Paginate :items="admins" />
                    </div>
                </div>
            </div>
        </section>
    </Adm>
</template>
