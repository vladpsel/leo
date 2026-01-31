<template>
    <Dialog v-model:open="open">
        <form @submit.prevent>
            <DialogTrigger as-child>
                <Button variant="secondary" type="button">Add Server</Button>
            </DialogTrigger>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Server</DialogTitle>
                    <DialogDescription>
                        Enter server details to add a new server or edit an existing one.
                    </DialogDescription>
                </DialogHeader>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <Label class="mb-2">Server name (system)</Label>
                        <Input id="name" v-model="server.name" required/>
                    </div>
                    <div class="w-1/2">
                        <Label class="mb-2">Server ip</Label>
                        <Input id="ip" v-model="server.ip" required/>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <Label class="mb-2">Tags (optional) - <span class="text-xs">(Domain/Tag/ etc.)</span></Label>
                    <TagsInput v-model="server.tags" class="w-full">
                        <TagsInputItem v-for="item in server.tags" :key="item" :value="item">
                            <TagsInputItemText/>
                            <TagsInputItemDelete/>
                        </TagsInputItem>

                        <TagsInputInput placeholder="Fruits..."/>
                    </TagsInput>
                </div>
                <div class="w-full flex gap-4 items-center">
                    <div class="flex-1/2">
                        <Label class="mb-2">Username</Label>
                        <Input id="username" v-model="server.username" required autocomplete="off" />
                    </div>
                    <div class="flex-1/2">
                        <Label class="mb-2">Password</Label>
                        <Input id="password" v-model="server.pswd" type="password" autocomplete="off" />
                    </div>
                </div>
                <div class="w-full mb-2">
                    <Label class="mb-2">Port (optional)</Label>
                    <Input id="port" v-model="server.port"/>
                </div>
                <div class="w-full mb-2">
                    <Label class="mb-2">Key (optional)</Label>
                    <Textarea id="key" v-model="server.key"/>
                </div>
                <div class="w-full mb-2">
                    <Label class="mb-2">Path (optional)</Label>
                    <Input id="key" v-model="server.directory"/>
                </div>
                <DialogFooter>
                    <DialogClose as-child>
                        <Button variant="secondary">Cancel</Button>
                    </DialogClose>
                    <Button variant="primary" type="submit" @click="add">Save</Button>
                </DialogFooter>
            </DialogContent>
        </form>
    </Dialog>
</template>

<script setup>
import {ref} from 'vue';
import axios from 'axios'
import {
    Dialog,
    DialogTitle,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTrigger,
    DialogClose
} from "@/components/ui/dialog/index.js";
import {Button} from "@/components/ui/button/index.js";
import {toast} from "vue-sonner";
import {Input} from "@/components/ui/input/index.js";
import {
    TagsInput,
    TagsInputItem,
    TagsInputItemDelete,
    TagsInputItemText,
    TagsInputInput
} from "@/components/ui/tags-input/index.js";
import {Label} from "reka-ui";
import {Textarea} from "@/components/ui/textarea/index.js";

// props and emits
const emit = defineEmits(['server-added']);
// values
const status = ref('new');
const open = ref(false);

const server = ref({
    name: '',
    ip: '',
    pswd: '',
    username: 'root',
    alias: '',
    port: '',
})
// methods
const reset = () => {
    server.value = {
        name: '',
        ip: '',
        pswd: '',
        username: 'root',
        port: '',
        key: '',
    };
}
const add = async () => {
    try {
        let url = '/api/v1/server';

        let { data } = await axios.post(url, server.value);

        open.value = false;
        toast.success(data.message || 'Server added successfully');
        emit('server-added', server.value);
        reset();
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

// calls

</script>

<style scoped>

</style>
