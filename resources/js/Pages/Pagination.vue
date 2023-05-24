<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    layout: AppLayout,
}
</script>

<script setup>
import { ref } from "vue";
import Pagination from '../Components/Pagination.vue';
import Avatar from '../Components/Avatar.vue';
// import Button from '../Components/Button.vue'
// import { ArrowPathIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
    users: { type: Object, required: true },
})

</script>

<template>
    <div class="flex justify-center mt-5 mb-5">
        <table class="border-collapse border border-slate-400 ...">
            <thead>
                <tr>
                    <th class="border border-slate-300 ...">Avatar</th>
                    <th class="border border-slate-300 ...">Name</th>
                    <th class="border border-slate-300 ...">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in props.users.data" :key="user.id">
                    <td class="flex justify-center border border-slate-300 ...">
                        <Avatar
                            class="m-1"
                            shape="circle"
                            size="sm"
                            :name="user.email"
                        />
                    </td>
                    <td class="border border-slate-300 ...">{{ user.name }}</td>
                    <td class="border border-slate-300 ...">{{ user.email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center">
        <Pagination :pagination="users" />
    </div>

<!--    <div class="flex">-->
<!--        <Button-->
<!--            as="a"-->
<!--            intent="text" -->
<!--            :href="route('index')"-->
<!--            :left-icon="ArrowPathIcon"-->
<!--            :right-icon="ArrowPathIcon"-->
<!--            class="w-full"-->
<!--        >Return to Welcome Page</Button>-->
<!--    </div>-->
</template>
