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

                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import Header from "@/components/layout/Header.vue";
import {Button} from "@/components/ui/button/index.js";
import ServerSetup from "@/components/layout/modal/server/ServerSetup.vue";

// values
</script>

<style scoped>

</style>
