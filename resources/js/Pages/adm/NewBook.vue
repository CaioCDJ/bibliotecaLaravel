<script setup>
import Adm from '@/Layouts/Adm.vue';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import BtnSuccess from '@/Components/BtnSuccess.vue';
import Input from '@/Components/Input.vue';
import { reactive, computed } from 'vue';

const form = useForm({
    title: "",
    author: '',
    publisher: '',
    qtpages: 0,
    releasedt: null,
    category: '',
    imgurl: '',
    qt: 0,
    desc: '',
});
</script>

<template>
    <Adm title="Admin - Cadastrar Livro" page="books">
        <section
            class="bg-[#fafafa] mt-8 rounded-lg  border border-2 border-gray-100 shadow shadow-lg dark:bg-gray-900 p-3 sm:p-5 flex flex-row w-full">
            <div class="min-h-[400px] w-1/2">
                <img :src="form.imgurl" class="h-full" style="border-radius: 15px;">
            </div>
            <form class="w-1/2 flex flex-col gap-3 py-3 px-8">
                <h1 class="text-2xl font-bold">Cadastro de Livros</h1>
                <Input label="Titulo:" :error="form.errors.title" v-model="form.title" type="text" :required=true />
                <Input label="Autor:" :error="form.errors.author" v-model="form.author" type="text" :required=true />
                <Input label="Editora:" :error="form.errors.publisher" v-model="form.publisher" type="text"
                    :required=true />
                <Input label="Numero de paginas:" :error="form.errors.qtpages" v-model="form.qtpages" type="number"
                    :required=true />
                <Input label="Data de lançamento:" :error="form.errors.releasedt" v-model="form.releasedt" type="date"
                    :required=true />

                <div>
                    <select id="countries_disabled"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selecione a categoria</option>
                        <option>Linguagens</option>
                        <option>Arquitetura</option>
                        <option>Banco de dados</option>
                        <option>Derivados</option>
                        <option>Redes</option>

                    </select>
                </div>
                <!-- <Input label="Au:" :error="form.errors.author" v-model="form.author" type="text" :required=true /> -->

                <Input label="Url da imagem:" :error="form.errors.imgurl" v-model="form.imgurl" type="url" :required=true />

                <Input label="Quantidade de livros:" :error="form.errors.qt" v-model="form.qt" type="number"
                    :required=true />

                <BtnSuccess title="Confirmar" submit="true" />
            </form>
        </section>
    </Adm>
</template>


