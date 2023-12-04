<script setup>
import { ref } from 'vue';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import BtnSuccess from '@/Components/BtnSuccess.vue';
import Input from '@/Components/Input.vue';
import { reactive, computed } from 'vue';
import AlertModal from "@/Components/modais/AlertModal.vue"

const alertModal = ref(null)

const props = defineProps({
    isLogin: {
        type: Boolean
    }
})

const login = ref(props.isLogin);
const title = ref((login.value) ? 'Login' : 'Cadastro')

const formLogin = useForm({
    email: null,
    password: null,
});

const formRegister = useForm({
    name: null,
    email: null,
    phone: null,
    address: null,
    password: null,
    confirmPassword: null
});

let errorsmg = computed(() => usePage().props.flash.error);

const submitLogin = () => {
    formLogin.post(route('login.post'), {
        onError: (err) => {
            alertModal.value.error(err.msg)
        },
    })
}
const submitRegister = () => { }

</script>

<template>
    <Head :title="title"></Head>
    <AlertModal ref="alertModal" />
    <div class="h-[100vh] w-full flex center flex-row bgLogin">
        <div class="w-3/5 flex flex-col justify-center">
            <div class="w-[80%] flex flex-col">
                <span class="text-[#0070fa] text-2xl font-semibold">bla bla bla bla</span>
                <h1 class="wrap text-5xl mt-2 font-extrabold">Conheça nosso renomado acervo de livros tecnicos sobre
                    tecnologia da
                    informação.</h1>
                <p class="text-lg wrap mt-8">Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint
                    consectetur consectetur cupidatat.</p>
            </div>
        </div>

        <div class="flex card center bg-[#fafafa] p-8 w-[70vh] h-auto rounded-lg shadow shadow-lg">
            <form v-if="login" class="flex center flex-col gap-1 w-5/6" @submit.prevent="submitLogin">
                <!-- <img src="/imgs/logo.png" class="h-24 w-24" alt=""> -->
                <h1 class="font-black h-[80px] text-6xl mt-3 tracking-wider title">Login</h1>
                <div class="w-full flex flex-col gap-4">
                    <Input label="Email:" v-model="formLogin.email" :error="formLogin.errors.email" type="email"
                        :required=true id="email" />
                    <Input label="Senha:" :error="formLogin.errors.password" v-model="formLogin.password" type="password"
                        :required=true id="password" />
                </div>
                <BtnSuccess title="Confirmar" aclass="w-full mt-4" submit="true" />
                <p class="mt-3 font-medium text-lg">Ainda não tem uma conta?
                    <Link :href="route('register')"
                        class=" cursor-pointer italic font-semibold text-blue-600 dark:text-blue-500 hover:underline">
                    Cadastre-se</Link>
                </p>
            </form>

            <form v-if="!login" @submit.prevent="registerSubmit" class="flex center flex-col gap-2 w-5/6">
                <img src="/imgs/logo.png" class="h-12 w-12" alt="">
                <h1 class="font-black h-[50px] text-3xl tracking-wider title">Cadastro</h1>

                <div class="w-full flex flex-col gap-4">
                    <Input label="Nome:" v-model="formRegister.name" :error="formRegister.errors.name" type="text"
                        :required=true />
                    <Input v-model="formRegister.email" label="Email:" :error="formRegister.errors.email" type="email"
                        :required=true />
                    <Input v-model="formRegister.address" label="Endereço:" type="text"
                        :error="formRegister.errors.address" />
                    <Input v-model="formRegister.phone" label="Telefone:" type="number"
                        :error="formRegister.errors.phone" />
                    <Input v-model="formRegister.password" label="Senha:" type="password"
                        :error="formRegister.errors.password" :required=true />
                    <Input v-model="formRegister.confirmPassword" label="Confirmar Senha:"
                        :error="formRegister.errors.confirmPassword" type="password" :required=true />
                </div>
                <BtnSuccess title="Confirmar" aclass="w-full mt-4" submit="true" />
                <p class="mt-3 font-medium text-lg">Já tem uma conta? Realize o
                    <Link :href="route('login')"
                        class=" cursor-pointer italic font-semibold text-blue-600 dark:text-blue-500 hover:underline">
                    Login</Link>
                </p>
            </form>
        </div>
    </div>
</template>

<style>
.title {
    background: -webkit-linear-gradient(#0aa9f8, #0acfff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
