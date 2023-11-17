<script setup>
import App from '@/Layouts/App.vue';

const { user, borrows } = defineProps({
    user: Object,
    borrows: Array
})
console.log(borrows)
</script>

<template>
    <App title="Perfil" navbar="Account">
        <Section
            class=" md:h-[80vh]  max-h-[1400px] bg-[#f9faf9] rounded-md  w-full mt-[60px] p-4 flex lg:flex-row md:flex-row flex-col center">
            <div class="w-full md:w-2/5 rounded-xl bg-[#f6f7f7] h-full px-8 flex center gap-5 py-10 flex-col">
                <h2 class="text-left ml-2 w-full text-3xl font-bold">Seja Bem vindo, <span
                        class="text-blue-500 text-4xl italic"> {{
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
                    <Button class="btnInfo flex flex-row center text-md gap-2"> <i class="pi pi-pencil"></i> Alterar
                    </Button>
                    <Button class="btnInfo flex center gap-2"> <i class="pi pi-unlock"></i> Alterar Senha </Button>
                    <Button class="btnDanger flex flex-row gap-2 center"> <i class="pi pi-trash"></i>Excluir Senha</Button>

                </div>
            </div>
            <div class="md:w-3/5 w-full flex flex-col gap-3 h-full p-8">
                <h4 class="font-semibold text-xl">Historico de Emprestimos</h4>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-full z-0">
                    <table class="w-full z-0 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 h-full">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Titulo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data de Retirada
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data de retorno
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in borrows.data"
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ item.title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.returnDt }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </Section>
    </App>
</template>

