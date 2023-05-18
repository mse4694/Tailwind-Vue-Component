<script setup>
import { ref } from "vue";
import BaseListbox from '../Components/BaseListbox.vue';
import Button from '../Components/Button.vue'
import { ArrowPathIcon } from "@heroicons/vue/20/solid";

const people = [
    { value: 1, label: 'Durward Reynolds' },
    { value: 2, label: 'Kenton Towne' },
    { value: 3, label: 'Therese Wunsch' },
    { value: 4, label: 'Benedict Kessler' },
    { value: 5, label: 'Katelyn Rohan' },
]

const people_with_status = [
    { value: 1, label: 'Durward Reynolds', unavailable: false },
    { value: 2, label: 'Kenton Towne', unavailable: true },
    { value: 3, label: 'Therese Wunsch', unavailable: false },
    { value: 4, label: 'Benedict Kessler', unavailable: true },
    { value: 5, label: 'Katelyn Rohan', unavailable: false },
]

const roles = [
    { value: 1, label: 'Marketing' },
    { value: 2, label: 'Helpdesk' },
    { value: 3, label: 'Support' },
]

const form = ref({
    person_id: null,
    person_with_status_id: null,
    role_ids: []
})
  
</script>

<template>
    <div class="p-4 mx-auto max-w-2xl">
        <form 
            action="#" 
            class="flex flex-col space-y-6"
        >
            <BaseListbox
                placeholder="Select person" 
                v-model="form.person_id"
                :options="people" 
            />

            <BaseListbox
                placeholder="Select person and Disable" 
                v-model="form.person_with_status_id"
                :options="people_with_status"
            />
            
            <BaseListbox
                placeholder="Select multiple roles" 
                v-model="form.role_ids"
                :options="roles"
                :multiple="true"
                error="Roles is a required field" 
            />

        </form>
    </div>
    <div class="flex">
        <Button
            as="a"
            intent="text" 
            :href="route('welcome')"
            :left-icon="ArrowPathIcon"
            :right-icon="ArrowPathIcon"
            class="w-full"
        >Return to Welcome Page</Button>
    </div>
</template>