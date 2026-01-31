<template>
    <div class="dark">
        <Header />
        <main>
            <section>
                <div class="container">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl">Servers</h1>
                        <div class="flex gap-2">
                            <ServerSetup @server-added="add"/>
                        </div>
                    </div>
                    <div class="table w-full">
                        <ul class="rows-list" v-if="servers.length > 0">
                            <li class="row flex items-center gap-4 mb-2" v-for="row in servers">
                                <div class="flex-1/5">
                                    {{ row.name}}
                                </div>
                                <div class="flex-1/5">
                                    {{ row.ip }}
                                </div>
                                <div class="flex-1/5">
                                    <JSONCell :row="row.tags"></JSONCell>
                                </div>
                                <div>
                                    <DropdownMenu>
                                        <DropdownMenuTrigger as-child>
                                            <IconDotsVertical class="h-4 w-4 cursor-pointer" />
                                        </DropdownMenuTrigger>
                                        <DropdownMenuContent>
                                            <DropdownMenuItem>
                                                <Link :href="route('server', { alias: row.alias })">
                                                    Select
                                                </Link>
                                            </DropdownMenuItem>
                                            <DropdownMenuItem>Edit</DropdownMenuItem>
                                            <DropdownMenuItem>Delete</DropdownMenuItem>
                                        </DropdownMenuContent>
                                    </DropdownMenu>
                                </div>
                            </li>
                        </ul>
                        <p class="text-sm text-center text-shadow-slate-400" v-else>No servers</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import {ref} from "vue";

import Header from "@/components/layout/Header.vue";
import ServerSetup from "@/components/layout/modal/server/ServerSetup.vue";
import JSONCell from "@/components/layout/table/JSONCell.vue";
import {toast} from "vue-sonner";
import {IconDotsVertical} from "@tabler/icons-vue";
import {DropdownMenu, DropdownMenuTrigger, DropdownMenuContent, DropdownMenuItem} from "@/components/ui/dropdown-menu/index.js";
import {Link} from "@inertiajs/vue3";
import {route} from "ziggy-js";

// values
const loadings = ref({
    base: false,
})
const servers = ref([]);

// methods
const add = (item) => {
    console.log(item)
    let data = servers.value;
    servers.value = [item, ...data];
}
const fetchData = async () => {
    try {
        let url = '/api/v1/server';
        let {data} = await axios.get(url);
        toast.success(data.message || 'Server fetched successfully');
        servers.value = data.list;
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

const start = async () => {
    await fetchData();
}

start();
</script>

<style scoped>

</style>
