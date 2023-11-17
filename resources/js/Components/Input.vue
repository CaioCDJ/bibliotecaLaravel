<script setup>
let { type, label, id, modelValue, error } = defineProps({
    type: String,
    label: String,
    id: String,
    required: Boolean,
    modelValue: String,
    error: String
})

defineEmits(['update:modelValue'])

</script>

<template>
    <div class="relative w-full">
        <input :id="id" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"
            :required="required" id="floating_outlined"
            v-bind:class="(error)
                ? 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer'
                : 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer'"
            placeholder=" " />
        <label for="floating_outlined" class="rounded-md"
            v-bind:class="(error)
                ? 'absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#fafafa] dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-aut'
                : 'absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#fafafa] dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1'">{{
        label }}</label>
    </div>
    <p v-if="(error)" id="outlined_error_help" class="mt-[-10px] ml-1 text-xs text-red-600 dark:text-red-400">{{ error }}
    </p>
</template>
