<script setup>
let { title, aclass, submit } = defineProps({
    title: String,
    aclass: String,
    submit: Boolean
})
</script>

<template>
    <button :type="(submit) ? 'submit' : 'button'" :class="aclass" class="btnSuccess">{{ title }}</button>
</template>

