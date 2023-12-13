<script setup>
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import BtnSuccess from '@/Components/BtnSuccess.vue';
import Input from '@/Components/Input.vue';
import ModalLayout from '@/Layouts/ModalLayout.vue'
import { ref } from 'vue';

const lay = ref((null))
const emits = defineEmits(['onSucess', "onError"])

const frm = useForm({
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

const bookId = ref(null)

const updateProps = (book) => {
    bookId.value = book.id
    frm.title = book.title
    frm.author = book.author
    frm.publisher = book.publisher
    frm.qtPages = book.qtPages
    frm.releaseDt = book.releaseDt
    frm.category = book.category
    frm.imgUrl = book.imgUrl
    frm.qt = book.qt
    frm.desc = book.desc
}

const submit = () => {
    frm.post(route('admin.book.update', { id: bookId.value }), {
        onError: (json) => emits("onError", json.msg),
        onSuccess: (json) => {
            emits("onSuccess", json.props.flash.msg)
        }
    })
}

const isOpen = ref(false);
const close = () => {
    isOpen.value = false;
}

defineExpose({
    updateProps
})


</script>

<template>
    <ModalLayout ref="lay" title="Alterar Livro" @close="close" v-show="isOpen">
        <form class="p-4 md:p-5 flex flex-row gap-2 center gap-5 w-auto md:w-full" method="post" @submit.prevent="submit">
            <div class="min-w-[300px]">
                <img class="rounded-lg max-h-[500px]" :src="frm.imgUrl" />
            </div>
            <div class="w-2/4 flex flex-col gap-3">
                <Input label="Titulo:" :error="frm.errors.title" v-model="frm.title" type="text" />
                <div class="grid grid-cols-2 gap-4 w-full">
                    <Input label="Autor:" :error="frm.errors.author" v-model="frm.author" type="text" />
                    <Input label="Editora:" :error="frm.errors.publisher" v-model="frm.publisher" type="text" />
                    <Input label="Numero de paginas:" :error="frm.errors.qtPages" v-model="frm.qtPages" type="number" />
                    <Input label="Quantidade de livros:" :error="frm.errors.qt" v-model="frm.qt" type="number" />

                    <Input label="Data de lançamento:" :error="frm.errors.releaseDt" v-model="frm.releaseDt" type="date" />

                    <div class="w-full">
                        <select id="countries_disabled" v-model="frm.category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Selecione a categoria</option>
                            <option value="linguagens">Linguagens</option>
                            <option value="arquitetura">Arquitetura</option>
                            <option value="banco de dados">Banco de dados</option>
                            <option value="derivados">Derivados</option>
                            <option value="redes">Redes</option>
                            <option value="seguranca">Segurança</option>

                        </select>
                    </div>

                </div>


                <!-- <Input label="Au:" :error="frm.errors.author" v-model="frm.author" type="text"  /> -->

                <Input label="Url da imagem:" :error="frm.errors.imgUrl" v-model="frm.imgUrl" type="url" />

                <textarea id="message" rows="4" v-model="frm.desc"
                    class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>

                <BtnSuccess title="Confirmar" submit="true" aclass="w-full" />

            </div>
        </form>
    </ModalLayout>
</template>
