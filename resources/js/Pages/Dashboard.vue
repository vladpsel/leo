<template>
    <div class="dark">
        <Header />
        <main>
            <section>
                <div class="container">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl">Servers</h1>
                        <div class="flex gap-2">
                            <ServerSetup />
                        </div>
                    </div>
                    <div class="table">
                        <ul class="rows-list">
                            <li class="row flex items-center gap-4" v-for="row in servers">
                                <div class="flex-1/5">
                                    {{ row.name}}
                                </div>
                                <div class="flex-1/5">
                                    {{ row.ip }}
                                </div>
                                <div class="flex-1/5">
                                    {{ row.tags }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import {ref} from "vue";

import Header from "@/components/layout/Header.vue";
import {Button} from "@/components/ui/button/index.js";
import ServerSetup from "@/components/layout/modal/server/ServerSetup.vue";

// values
const servers = ref([]);
</script>

<style scoped>

</style>
