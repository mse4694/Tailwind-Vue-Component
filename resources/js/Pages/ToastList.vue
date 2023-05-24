<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    layout: AppLayout,
}
</script>

<script setup>
import Button from '../Components/Button.vue'
import { ArrowPathIcon } from "@heroicons/vue/20/solid";
import Toast from '../Components/Toast/ToastList.vue'
import toast from '@/Stores/toast';
import { useForm } from '@inertiajs/vue3';


const form = useForm({})

function submit() {
    form.post("/test-submit")
}

function addToast() {
    toast.add({
        message: "Hello from webpage"
    })
}
</script>

<template>
<!-- Setup Requirement

    - Edit file HandleInertiaRequests.php on function share and add key:value
        'toast' => session('toast')


-->

<div class="m-5 space-y-5">
    <form @submit.prevent="submit" action="">
        <Button
            :right-icon="ArrowPathIcon"
            class="w-full"
        >Submit
        </Button>
    </form>

    <Button
        :right-icon="ArrowPathIcon"
        class="w-full"
        @click="addToast"
    >Add toast
    </Button>

    <Toast />
<!--    <div class="flex">-->
<!--        <Button-->
<!--            as="a"-->
<!--            intent="text"-->
<!--            :href="route('index')"-->
<!--            :left-icon="ArrowPathIcon"-->
<!--            :right-icon="ArrowPathIcon"-->
<!--            class="w-full"-->
<!--        >Return to Welcome Page</Button>-->
<!--    </div>-->
</div>
</template>
