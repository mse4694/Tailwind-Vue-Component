<script setup>
import { reactive, ref, watch } from "vue";
import { router } from '@inertiajs/vue3';
import {throttle, pickBy} from 'lodash';
import Pagination from '../Components/Pagination.vue';
import Button from '../Components/Button.vue';
import Avatar from '../Components/Avatar.vue';
import { ArrowPathIcon, BarsArrowUpIcon, BarsArrowDownIcon, ArrowsUpDownIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
    contacts: { type: Object, required: true },
    filters: Object
})

let params = reactive({
    search: props.filters.search,
    field: props.filters.field,
    direction: props.filters.direction,
})

console.log(params)

// watch( params, (val) => {

//     // Object.keys(params).forEach( key => {
//     //     if( params[key] == '' ) {
//     //         delete params[key]
//     //     }
//     // })

//     throttle( function () {
//         router.get(route('contacts'), params, {
//             preserveState: true,
//             replace: true
//         })
//     }, 1500)  
// })

watch(params,
    throttle((val) => {
        let params = pickBy(val);
        router.get(route('contacts'), params, {
            preserveState: true,
            preserveScroll: true
        });
    }, 150), {
        deep: true
    }
);

const sort = (val) => {
  params.field = val
  params.direction = params.direction === 'asc' ? 'desc' : 'asc'
}


</script>

<template>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg m-5">
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" v-model="params.search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-md text-white uppercase bg-blue-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Avatar
                </th>
                <th scope="col" class="">
                    <span @click="sort('id')" class="inline-flex w-full justify-between cursor-pointer px-6 py-3">
                            #
                            <BarsArrowUpIcon v-if="params.field === 'id' && params.direction === 'asc'" class="w-6 h-6 p-1" />
                            <BarsArrowDownIcon v-if="params.field === 'id' && params.direction === 'desc'" class="w-6 h-6 p-1"  />
                            <!-- <ArrowsUpDownIcon v-if="field !== 'id'" class="w-6 h-6 p-1" /> -->
                    </span>
                </th>
                <th scope="col" class="">
                    <span @click="sort('name')" class="inline-flex w-full justify-between cursor-pointer px-6 py-3">
                            Name
                            <BarsArrowUpIcon v-if="params.field === 'name' && params.direction === 'asc'" class="w-6 h-6 p-1" />
                            <BarsArrowDownIcon v-if="params.field === 'name' && params.direction === 'desc'" class="w-6 h-6 p-1"  />
                            <!-- <ArrowsUpDownIcon v-if="field !== 'name'" class="w-6 h-6 p-1" /> -->
                    </span>
                </th>
                <th scope="col" class="">
                    <span @click="sort('email')" class="inline-flex w-full justify-between cursor-pointer px-6 py-3">
                            Email
                            <BarsArrowUpIcon v-if="params.field === 'email' && params.direction === 'asc'" class="w-6 h-6 p-1" />
                            <BarsArrowDownIcon v-if="params.field === 'email' && params.direction === 'desc'" class="w-6 h-6 p-1"  />
                            <!-- <ArrowsUpDownIcon v-if="field !== 'email'" class="w-6 h-6 p-1" /> -->
                    </span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr 
                v-for="contact in props.contacts.data" :key="contact.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            >
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <Avatar
                        class="m-1"
                        shape="circle"
                        size="sm" 
                        :name="contact.email" 
                    />
                </th>
                <td class="px-6 py-4">
                    {{ contact.id }}
                </td>
                <td class="px-6 py-4">
                    {{ contact.name }}
                </td>
                <td class="px-6 py-4">
                    {{ contact.email }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="flex justify-center">
    <Pagination :pagination="contacts" />
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
