<script setup>
import App from '@/Layouts/App.vue';
import ChangePasswordModal from '@/Components/modais/ChangePassword.vue'
import UpdateUserModal from "@/Components/modais/UpdateUserModal.vue"
import { ref } from 'vue';

const { user, borrows } = defineProps({
    user: Object,
    borrows: Array,
    paginate: Array
})
const isModalVisible = ref({
    update: false,
    updatePassword: false
})

const showModal = (prop) => {
    isModalVisible.value[prop] = true;
}

const closeModal = (prop) => isModalVisible.value[prop] = false;

const check = () => console.log(isModalVisible.value)
</script>

<template>
    <App title="Perfil" navbar="Account">
        <ChangePasswordModal v-show="isModalVisible.updatePassword" @close="closeModal('updatePassword')" />
        <UpdateUserModal :userInfo="user" v-show="isModalVisible.update" @close="closeModal('update')" />

        <Section
            class=" md:h-[80vh]  max-h-[1400px] bg-[#f9faf9] rounded-md  w-full mt-[60px] p-4 flex lg:flex-row md:flex-row flex-col center">
            <div class="w-full md:w-2/5 rounded-xl bg-[#f6f7f7] h-full px-8 flex center gap-5 py-10 flex-col">
                <h2 class="text-left ml-2 w-full text-3xl font-bold">Seja Bem vindo, <span
                        class="text-blue-500 text-4xl italic" @click="check"> {{
                            user.name
                        }} </span>
                </h2>
                <table class="rounded-md w-full">
                    <tr class="h-16">
                        <td class="font-semibold px-2">Email:</td>
                        <td>{{ user.email }}</td>
                    </tr>
                    <tr class="h-16">
                        <td class="font-semibold px-2">Numero de Telefone:</td>
                        <td>{{ user.phone }}</td>
                    </tr>
                    <tr class="h-16">
                        <td class="font-semibold px-2">Endereço:</td>
                        <td>{{ user.address }}</td>
                    </tr>
                    <tr class="h-16">
                        <td class="font-semibold px-2">Ingressou:</td>
                        <td>{{ user.created_at }}</td>
                    </tr>
                </table>
                <div class="flex flex-row justify-between gap-2 mt-4">
                    <Button class="btnInfo flex flex-row center text-md gap-2" @click="showModal('update')"
                        data-modal-target="crud-modal"> <i class="pi pi-pencil"></i> Alterar
                    </Button>
                    <Button class="btnInfo flex center gap-2" @click="showModal('updatePassword')"> <i
                            class="pi pi-unlock"></i> Alterar Senha
                    </Button>
                    <Button class="btnDanger flex flex-row gap-2 center"> <i class="pi pi-trash"></i>Excluir Senha</Button>

                </div>
            </div>
            <div class="md:w-3/5 w-full flex flex-col gap-3 h-full p-8">
                <h4 class="font-semibold text-xl">Historico de Emprestimos</h4>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-full z-0">
                    <table class="w-full z-0 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 h-full">
                        <thead
                            class="text-xs text-gray-700 bg-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="bg-gray-200">
                                <th scope="col" class="px-6 py-3">
                                    Titulo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data de Retirada
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data de retorno
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in borrows"
                                :class="(item.devolution == 'late') ? 'bg-rose-200' : (item.devolution == 'today') ? 'odd:bg-yellow-200 even:bg-yellow-100' : 'odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800'"
                                class="border-b dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ item.title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.returnDt }}
                                </td>
                                <td>
                                    <div class="flex flex-row center">
                                        <span v-show="(item.devolution == 'ok')"
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Dentro
                                            do Prazo</span>
                                        <span v-show="(item.devolution == 'today')"
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Ultimo
                                            dia do Prazo</span>
                                        <span v-show="(item.devolution == 'late')"
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Fora
                                            do Prazo</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </Section>
    </App>
</template>

