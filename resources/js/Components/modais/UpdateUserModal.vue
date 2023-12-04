<script setup>
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import BtnSuccess from '@/Components/BtnSuccess.vue';
import Input from '@/Components/Input.vue';
import ModalLayout from '@/Layouts/ModalLayout.vue'
import { ref } from 'vue';

const emit = defineEmits(['click', 'close'])

const { userInfo } = defineProps({
    userInfo: Object
})

const frm = useForm({
    email: userInfo.email,
    name: userInfo.name,
    address: userInfo.address,
    phone: userInfo.phone
})

const isOpen = ref(false);
const close = () => emit('close')

</script>

<template>
    <ModalLayout title="Alterar Informações" @close="close" v-show="isOpen">
        <!-- Modal Body -->
        <form class="p-4 md:p-5 flex center gap-5 flex-col">
            <Input label="Nome:" v-model="frm.name" :error="frm.errors.name" type="text" :required=true />
            <Input v-model="frm.email" label="Email:" :error="frm.errors.email" type="email" :required=true />
            <Input v-model="frm.address" label="Endereço:" type="text" :error="frm.errors.address" />
            <Input v-model="frm.phone" label="Telefone:" type="number" :error="frm.errors.phone" />

            <BtnSuccess title="Confirmar" submit="true" aclass="w-full" />
        </form>
    </ModalLayout>
</template>
