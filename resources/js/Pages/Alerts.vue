<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    layout: AppLayout,
}
</script>

<script setup>
import { ref } from "vue";
import Button from '../Components/Button.vue';
import Alert from '../Components/Alert.vue';
import { ArrowPathIcon } from "@heroicons/vue/20/solid";

const showInfoAlert = ref(true)
const showWarningAlert = ref(true)
const showSuccessAlert = ref(true)
const showDangerAlert = ref(true)
</script>

<template>
    <div class="space-y-5 p-5">
        <Alert :show="showInfoAlert" :on-dismiss="() => (showInfoAlert = false)" title="This is my Alert Component">
            <p>Some important message</p>
        </Alert>
        <Alert intent="success" :show="showSuccessAlert" :on-dismiss="() => (showSuccessAlert = false)" title="This is my Alert Component">
            <p>Some important message</p>
        </Alert>
        <Alert intent="warning" :show="showWarningAlert" :on-dismiss="() => (showWarningAlert = false)" title="This is my Alert Component">
            <p>Some important message</p>
        </Alert>
        <Alert intent="danger" :show="showDangerAlert" :on-dismiss="() => (showDangerAlert = false)" title="This is my Alert Component">
            <p>Some important message</p>
        </Alert>
    </div>
    <div class="flex">
        <Button
            as="a"
            intent="text"
            :href="route('alerts')"
            :left-icon="ArrowPathIcon"
            :right-icon="ArrowPathIcon"
            class="w-full"
        >Refresh Page</Button>
<!--        <Button-->
<!--            as="a"-->
<!--            intent="text"-->
<!--            :href="route('index')"-->
<!--            :left-icon="ArrowPathIcon"-->
<!--            :right-icon="ArrowPathIcon"-->
<!--            class="w-full"-->
<!--        >Return to Welcome Page</Button>-->
    </div>
</template>
