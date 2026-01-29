<template>
    <component :is="App" v-bind="props" />
    <Toaster position="top-center" rich-colors />
</template>

<script setup>
import { Toaster } from 'vue-sonner'

defineProps({
    App: Object,
    props: Object
})
</script>
