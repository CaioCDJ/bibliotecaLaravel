<script setup>
import Adm from '@/Layouts/Adm.vue';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import BtnSuccess from '@/Components/BtnSuccess.vue';
import Input from '@/Components/Input.vue';
import { ref } from 'vue';

const adm = ref(null)

const form = useForm({
    title: "",
    author: '',
    publisher: '',
    qtPages: 0,
    releaseDt: null,
    category: '',
    imgUrl: '',
    qt: 0,
    desc: '',
});

const submit = () => {
    form.post(route('admin.storeBook'), {
        onError: (err) => {
            console.log(err)
            adm.value.alertModal.error(err.msg)
        }
    })
}
</script>

<template>
    <Adm ref="adm" title="Admin - Cadastrar Livro" page="books">
        <section
            class="bg-[#fafafa] mt-8 rounded-lg  border border-2 border-gray-100 shadow shadow-lg dark:bg-gray-900 p-3 sm:p-5 flex flex-row w-full">
            <div class="min-h-[400px] w-1/2">
                <img :src="form.imgUrl" class="h-full" style="border-radius: 15px;">
            </div>
            <form class="w-1/2 flex flex-col gap-3 py-3 px-8" method="post" @submit.prevent="submit">
                <h1 class="text-2xl font-bold">Cadastro de Livros</h1>
                <Input label="Titulo:" :error="form.errors.title" v-model="form.title" type="text" :required=true />
                <Input label="Autor:" :error="form.errors.author" v-model="form.author" type="text" :required=true />
                <Input label="Editora:" :error="form.errors.publisher" v-model="form.publisher" type="text"
                    :required=true />

                <div class="grid grid-cols-2 gap-3 w-full">
                    <Input label="Numero de paginas:" :error="form.errors.qtPages" v-model="form.qtPages" type="number"
                        :required=true />
                    <Input label="Data de lançamento:" :error="form.errors.releaseDt" v-model="form.releaseDt" type="date"
                        :required=true />
                    <Input label="Quantidade de livros:" :error="form.errors.qt" v-model="form.qt" type="number"
                        :required=true />

                    <div>
                        <select id="countries_disabled" v-model="form.category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Selecione a categoria</option>
                            <option>Linguagens</option>
                            <option>Arquitetura</option>
                            <option>Banco de dados</option>
                            <option>Derivados</option>
                            <option>Redes</option>

                        </select>
                    </div>
                </div>
                <!-- <Input label="Au:" :error="form.errors.author" v-model="form.author" type="text" :required=true /> -->

                <Input label="Url da imagem:" :error="form.errors.imgUrl" v-model="form.imgUrl" type="text"
                    :required=true />

                <textarea id="message" rows="4" v-model="form.desc"
                    class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>

                <BtnSuccess title="Confirmar" submit="true" />
            </form>
        </section>
    </Adm>
</template>
