<script setup>
import { Link } from '@inertiajs/vue3';

const { items } = defineProps({
    items: Object
})

const currentUrl = location.href

const obj = items;
let urls = items.links.splice(1, (parseInt(items.links.length) - 2))

</script>

<template>
    <nav v-if="(items && items.last_page != 1)">
        <ul class="flex items-center -space-x-px h-8 text-sm">

            <li>
                <Link :href="(items.prev_page_url) ? items.prev_page_url : items.first_page_url"
                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                </Link>
            </li>

            <li v-for="item in urls">
                <Link :href="item.url"
                    :class="(parseInt(item.label) == obj.current_page) ? 'text-white bg-sky-400 hover:bg-sky-400' : 'bg-white'"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                {{ item.label }}</Link>
            </li>

            <li>
                <Link :href="(items.next_page_url) ? items.next_page_url : items.last_page_url"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Next</span>
                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                </Link>
            </li>
        </ul>
    </nav>
</template>
