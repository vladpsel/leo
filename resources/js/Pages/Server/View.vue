<template>
    <div class="dark">
        <Header></Header>
        <main>
            <section>
                <div class="container w-full">
                    <div class="flex justify-between items-center w-full mb-4">
                        <h1 class="text-2xl">Server: {{ server.name }} {{server.ip}}</h1>
                        <div class="flex gap-2">
                            <Link :href="route('servers')">
                                <Button variant="secondary">Back</Button>
                            </Link>
                        </div>
                    </div>

                    <div class="w-full">
                        <h3 class="text-xl mb-4">Server Operations</h3>

                        <ul class="flex gap-4">
                            <li>
                                <Button variant="secondary" class="cursor-pointer">Ping</Button>
                            </li>
                            <li>
                                <Button variant="secondary" class="cursor-pointer">Git update</Button>
                            </li>
                            <li>
                                <Button variant="secondary" class="cursor-pointer">Restart</Button>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>

    </div>
</template>

<script setup>
import {ref} from 'vue';
import Header from "@/components/layout/Header.vue";
import {Link} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import {Button} from "@/components/ui/button/index.js";
import {Badge} from "@/components/ui/badge/index.js";

// props and emits
const props = defineProps({
    server: Object,
})

// values

// methods

// cals

</script>

<style scoped>

</style>
