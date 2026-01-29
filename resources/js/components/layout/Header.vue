<template>
    <header class="header">
        <div class="container">
            <div class="flex justify-between items-center">
                <a href="#" class="logo icon w-[45px]">
                    <img src="/build/images/logo.png" alt="">
                </a>
                <ul class="header__menu flex gap-4 items-center">
                    <li>
                        <a :href="route('servers')" class="hover:text-indigo-600">Servers</a>
                    </li>
                    <li>
                        <a :href="route('logout')" class="hover:text-indigo-600">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</template>

<script setup>
import {route} from "ziggy-js";
</script>

<style scoped>

</style>
