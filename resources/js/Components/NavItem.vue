<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid';
import {computed} from "vue";

const props = defineProps({
    item: Object,
})

const hasActiveChild = computed(() => {
    function hasActiveItem(items) {
        return items.some(item => item.active || hasActiveItem(item.children))
    }

    return hasActiveItem(props.item.children)
})

const canUseMenu = ( ability ) => {
    let hasAbility = false
    // for ( let i = 0; i < ability.length; i++ ) {
    //     if( usePage().props.auth.abilities.includes(ability[i]) ) {
    //         hasAbility = true
    //         break
    //     }
    // }

    hasAbility = ability.some( item =>  usePage().props.auth.abilities.includes(item) )
    // console.log(ability)
    // console.log(hasAbility)
    return hasAbility
}

const emit = defineEmits(['closeSideBar'])
</script>

<template>
    <Link
        as="button" type="button"
        v-if="!item.children.length"
        @click="emit('closeSideBar', false)"
        :href="route(item.href)"
        v-show="canUseMenu(item.ability) || ! item.ability.length"
        :class="[
            'group flex w-full items-center rounded-md py-2 px-3 text-sm',
            'hover:bg-gray-100',
            item.active ? 'text-orange-500 font-semibold' : 'text-gray-600 font-medium',
        ]"
        >
        <component
            :is="item.icon"
            v-if="item.icon"
            :class="[
                'w-6 h-6 shrink-0 mr-2 group-hover:text-orange-500',
                item.active ? 'text-orange-500' : 'text-gray-400',
            ]"
        />
        <span class="group-hover:text-orange-500">{{ item.label }}</span>
    </Link>

    <Disclosure :defaultOpen="hasActiveChild" v-else v-slot="{open}">
        <DisclosureButton
            v-show="canUseMenu(item.ability) || ! item.ability.length"
            :class="[
                'group text-left flex w-full items-center rounded-md py-2 px-3 text-sm',
                'hover:bg-gray-100',
                open ? 'font-semibold text-orange-500' : 'font-medium text-gray-600'
            ]"
        >
            <component
                :is="item.icon"
                v-if="item.icon"
                :class="[
                    'w-6 h-6 shrink-0 mr-2 group-hover:text-orange-500',
                    open ? 'text-orange-500' : 'text-gray-400'
                ]"
            />
            <span class="flex-1 group-hover:text-orange-500">{{ item.label }}</span>
            <ChevronDownIcon
                :class="[
                    'w-6 h-6 shrink-0',
                    open ? '-rotate-180 text-orange-500' : 'text-gray-600'
                ]"
            />
        </DisclosureButton>
        <DisclosurePanel class="ml-4">
            <NavItem
                v-for="child in item.children "
                :item="child"
                @click="emit('closeSideBar', false)"
            />
        </DisclosurePanel>
    </Disclosure>

<!--    <div class="ml-4" v-if="item.children.length">-->
<!--        <NavItem-->
<!--            v-for="child in item.children "-->
<!--            :item="child"-->
<!--        />-->
<!--    </div>-->
</template>
