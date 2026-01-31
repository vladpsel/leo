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
                    </div>

                    <div class="flex gap-4 w-full">
                        <ul class="flex-1/2 gap-4 flex">
                            <li>
                                <Button variant="secondary" class="cursor-pointer" @click="operation('ping')">Ping</Button>
                            </li>
                            <li>
                                <Button variant="secondary" class="cursor-pointer">Git update</Button>
                            </li>
                            <li>
                                <Button variant="secondary" class="cursor-pointer">Restart</Button>
                            </li>
                            <li>
                                <Button variant="secondary" class="cursor-pointer">"/var/www/" Directories</Button>
                            </li>
                        </ul>
                        <div class="flex-1/2" v-html="output">
                        </div>
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
import {toast} from "vue-sonner";

// props and emits
const props = defineProps({
    server: Object,
})
const output = ref(null);

// values

// methods
const operation = async (op) => {
    try {
        const response = await axios.post(route('server.operation', props.server.id), {
            operation: op,
        });
        console.log(response.data);
        output.value = response.data.data;
    } catch (error) {
        if (error.response?.status === 422) {
            const errors = error.response.data.errors;

            Object.values(errors).forEach((fieldErrors) => {
                fieldErrors.forEach((msg) => toast.error(msg));
            });
        } else {
            toast.error(
                error.response?.data?.message || 'Something went wrong'
            );
        }
    }
}

// cals

</script>

<style scoped>

</style>
