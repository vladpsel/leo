<template>
    <component :is="App" v-bind="props" />
<!--    <Toaster position="bottom-right" rich-colors />-->
</template>

<script setup>
defineProps({
    App: Object,
    props: Object
})
</script>
