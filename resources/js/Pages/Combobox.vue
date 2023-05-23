<script setup>
import Field from '../Components/Field.vue'
import Combobox from '../Components/Combobox.vue'
import Button from '../Components/Button.vue'
import { ArrowPathIcon } from "@heroicons/vue/20/solid"
import {ref} from "vue";

const form = ref({
    singleUser: {},
    multiUser: [],
    createUser: [],
})

const users = [
    { value: 1, label: 'Wade Cooper' },
    { value: 2, label: 'Arlene Mccoy' },
    { value: 3, label: 'Devon Webb' },
    { value: 4, label: 'Tom Cook' },
    { value: 5, label: 'Tanya Fox' },
    { value: 6, label: 'Hellen Schmidt' },
]

let otherUsers = []

function loadUsers(query, setOptions) {
    // fake a request that takes 500ms
    setTimeout(() => {
        setOptions([
            {value: 1, label: "Wade Cooper"},
            {value: 2, label: "Arlene Mccoy"},
            {value: 3, label: "Devon Webb"},
            {value: 4, label: "Tom Cook"},
            {value: 5, label: "Tanya Fox"},
            {value: 6, label: "Hellen Schmidt"},
        ]);
    }, 500);
}

function createUser(option, selectOption) {
    // fake a request that takes 500ms
    setTimeout(() => {
        selectOption({
            value: Math.floor(Math.random() * 100),
            //value: otherUsers.reduce((a,b) => a.value > b.value ? a:b).value+1,
            label: option.label,
        });
    }, 500);
}

const errors = ref({
    user: 'This is form error message.',
})


</script>

<template>
    <div class="mt-5 ml-5 mr-5 space-y-5 divide-solid">
        <Field
            label="Single User"
            required
            help='Click for select single user'
        >
            <Combobox
                placeholder="Search user..."
                v-model="form.singleUser"
                :options="users"
            />
        </Field>

        <Field
            label="Multi User"
            required
            help='Click for select multi user'
        >
            <Combobox
                placeholder="Search user..."
                v-model="form.multiUser"
                :options="users"
                multiple
            />
        </Field>

        <Field
            label="Multi select & Create User"
            required
            help='Click for select multi user and can create new user'
        >
            <Combobox
                placeholder="Search user..."
                v-model="form.createUser"
                :create-option="createUser"
                :load-options="loadUsers"
                :options="otherUsers"
                multiple
            />
        </Field>

        <Field
            label="User error"
            required
            help='Click for select user'
            :error="errors.user"
        >
            <Combobox
                placeholder="Search user..."
                v-model="form.user"
                :options="users"
            />
        </Field>
    </div>

    {{ form }}

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
