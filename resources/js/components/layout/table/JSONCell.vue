<template>
    <div class="flex gap-2 items-center">
        <Badge variant="secondary" v-for="item in mainList">
            {{ item }}
        </Badge>
        <HoverCard v-if="subList.length >= 1">
            <HoverCardTrigger as-child>
                <Badge variant="secondary" class="cursor-pointer">
                    {{ subList.length }}
                    <IconChevronDown :size="14"/>
                </Badge>
            </HoverCardTrigger>
            <HoverCardContent>
                <div class="flex gap-2 items-center flex-wrap justify-center">
                    <Badge variant="secondary" v-for="subItem in subList">
                        {{subItem}}
                    </Badge>
                </div>
            </HoverCardContent>
        </HoverCard>

    </div>
</template>

<script setup>
import {ref} from "vue";
import {Badge} from "@/components/ui/badge";
import {HoverCard, HoverCardContent, HoverCardTrigger} from "@/components/ui/hover-card";
import {IconChevronDown} from "@tabler/icons-vue";

// const props = defineProps(['params']);
const mainList = ref([]);
const subList = ref([]);

const props = defineProps({
    // value: {
    //     type: String,
    //     default: '',
    // },
    row: {
        type: Object,
        default: () => ({}),
    },
    maxItems: {
        type: Number,
        default: 1,
    },
})

const start = () => {
    mainList.value = props.row;

    let index = props.maxItems;
    if (index >= 2 && mainList.value.length > index) {
        subList.value = mainList.value.splice(--index);
    }
}
start();
</script>

<style scoped lang="scss">

</style>
