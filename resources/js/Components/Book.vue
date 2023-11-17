<script setup>
import { Link } from '@inertiajs/vue3';
const { book } = defineProps({
    book: Object
})
</script>
<template>
    <Link :href="route('book', { id: book.id })"
        class="w-full max-w-sm w-[550px] h-[250px] bg-white items-center flex border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img class="p-8 rounded-xl self-center h-full w-5/6" :src="book.imgUrl" alt="product image" />
    <div class="px-5 pb-5 min-w-[200px]">
        <span class="text-blue-500 text-sm">{{ book.publisher }}</span>
        <h5 class="text-lg w-full font-semibold tracking-tight text-gray-900 dark:text-white">{{ book.title }}</h5>
        <div class="flex items-center mt-2.5 mb-5">
            {{ book.author }}
        </div>
        <div class="flex items-center justify-between">
            <span v-show="(book.available == 0)"
                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Indisponivel</span>
            <span v-show="(book.available > 1)"
                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Disponivel</span>
            <span v-show="(book.available == 1)"
                class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Ultima
                Unidade</span>
        </div>
    </div>
    </Link>
</template>
