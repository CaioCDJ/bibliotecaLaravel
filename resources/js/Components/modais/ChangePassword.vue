<script setup>
import Input from '@/Components/Input.vue';
import { useForm } from '@inertiajs/vue3';
import BtnSuccess from '@/Components/BtnSuccess.vue';
import ModalLayout from '@/Layouts/ModalLayout.vue'

const emit = defineEmits(['click', "close"])
const close = () => emit('close')

const frm = useForm({
    password: '',
    newPassword: '',
    confirmPassword: ''
})

const submit = () => {
    frm.post(route('user.changePassword'), {
        onSuccess: () => {
            close()
        },
    })
}

</script>

<template>
    <ModalLayout title="Alterar Senha" @close="close" v-show="isOpen">
        <!-- Modal body -->
        <form class="p-4 md:p-5 flex center gap-5 flex-col" method="post" @submit.prevent="submit">
            <Input v-model="frm.password" label="Senha:" type="password" :error="frm.errors.password" :required=true />
            <Input v-model="frm.newPassword" label="Nova Senha:" :error="frm.errors.newPassword" type="password"
                :required=true />
            <Input v-model="frm.confirmPassword" label="Confirmar Senha:" :error="frm.errors.confirmPassword"
                type="password" :required=true />

            <BtnSuccess title="Confirmar" submit="true" aclass="w-full" />
        </form>

    </ModalLayout>
</template>
