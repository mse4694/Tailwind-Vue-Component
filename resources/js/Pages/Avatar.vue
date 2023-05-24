<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    layout: AppLayout,
}
</script>

<script setup>
import Avatar from '../Components/Avatar.vue';
// import Button from '../Components/Button.vue'
// import { ArrowPathIcon } from "@heroicons/vue/20/solid";
</script>

<template>

    <div class="m-5 space-y-10">
        <div class="flex items-center gap-5">
            <Avatar
                shape="circle"
                size="sm"
                name="Random Image"
                initials="RI"
                src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
            />
            <Avatar
                shape="circle"
                size="base"
                name="Random Image"
                initials="RI"
                src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
            />
            <Avatar
                shape="circle"
                size="lg"
                name="Random Image"
                initials="RI"
                src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
            />
        </div>

        <div class="flex items-center gap-5">
            <Avatar
                shape="circle"
                size="sm"
                name="Random Image"
                initials="RI"
            />
            <Avatar
                shape="circle"
                size="base"
                name="Random Image"
                initials="RI"
            />
            <Avatar
                shape="circle"
                size="lg"
                name="Random Image"
                initials="RI"
            />
        </div>

        <div class="flex items-center gap-5">
            <Avatar
                shape="square"
                size="sm"
                name="Random Image"
                initials="RI"
                src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
            />
            <Avatar
                shape="square"
                size="base"
                name="Random Image"
                initials="RI"
                src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
            />
            <Avatar
                shape="square"
                size="lg"
                name="Random Image"
                initials="RI"
                src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
            />
        </div>

        <div class="flex items-center gap-5">
            <Avatar
                shape="square"
                size="sm"
                name="Random Image"
                initials="RI"
            />
            <Avatar
                shape="square"
                size="base"
                name="Random Image"
                initials="RI"
            />
            <Avatar
                shape="square"
                size="lg"
                name="Random Image"
                initials="RI"
            />
        </div>
    </div>
<!--    <div class="flex">-->
<!--        <Button-->
<!--            as="a"-->
<!--            intent="text" -->
<!--            :href="route('welcome')"-->
<!--            :left-icon="ArrowPathIcon"-->
<!--            :right-icon="ArrowPathIcon"-->
<!--            class="w-full"-->
<!--        >Return to Welcome Page</Button>-->
<!--    </div>-->
</template>
