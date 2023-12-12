<script setup >
import ModalLayout from '@/Layouts/ModalLayout.vue'
import { reactive } from 'vue';
import { ref } from 'vue';

const visible = ref(false);

const title = ref("");
const desc = ref("");
const icon = ref("");
const btn = ref('');

const success = (title = "Sucesso!", desc = "") => {
    setProps(title, desc)
    icon.value = "pi-check text-emerald-500 bg-emerald-100"
    btn.value = 'btnSuccess'
}

const info = (title, desc = "") => {
    setProps(title, desc)
    icon.value = "pi-exclamation-triangle text-sky-500 bg-sky-100"
    btn.value = 'btnInfo'
}
const error = (title = "Erro!", desc = "") => {
    setProps(title, desc);
    icon.value = "pi-times-circle text-rose-500 bg-rose-100"
    btn.value = 'btnDanger'
}

const setProps = (titleParam, descParam = "") => {
    title.value = titleParam
    desc.value = descParam
    visible.value = true;
}

const close = () => visible.value = false;

defineExpose({
    success, info, error
})

</script>

<template>
    <div tabindex="-1" aria-hidden="true" v-show="visible" @click="close"
        class=" overflow-y-auto overflow-x-hidden h-full w-full flex center backdrop-blur fixed top-0 right-5 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-[1200px] md:w-[60vh] max-h-full " v-on::click.stop>
            <!-- Modal content -->
            <div class="relative  rounded-lg shadow dark:bg-gray-700 bg-[#fafafa]">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    </h3>
                    <button type="button" @click="close"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="flex items-center py-2 pb-10 px-6 flex-col gap-3 max-h-[900px]">

                    <i :class="icon" class="text-[90px] pi p-3 rounded-full"></i>

                    <h3 class="text-black font-bold text-2xl text-center" v-text="title"></h3>

                    <div class="w-full">
                        {{ desc }}
                    </div>
                    <button :class="(btn == 'btnDanger') ? 'hidden' : btn" class="w-full" @click="close">Ok</button>
                </div>
            </div>
        </div>
    </div>
</template>
