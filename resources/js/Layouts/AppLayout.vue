<script setup>
import { ref } from "vue";
import Dropdown from '../Components/Dropdown/BaseDropdown.vue';
import DropdownItemGroup from '../Components/Dropdown/DropdownItemGroup.vue'
import DropdownItem from '../Components/Dropdown/DropdownItem.vue'
import Avatar from '../Components/Avatar.vue';
import {Dialog, DialogOverlay, TransitionChild, TransitionRoot} from '@headlessui/vue';
import {MagnifyingGlassIcon, XMarkIcon} from '@heroicons/vue/20/solid';
import { RectangleGroupIcon, MegaphoneIcon, FlagIcon, HomeModernIcon, ListBulletIcon, PhotoIcon, Bars4Icon, QueueListIcon, ClipboardDocumentIcon, TableCellsIcon, Square3Stack3DIcon, PlayIcon } from '@heroicons/vue/24/outline'
import NavItem from "../Components/NavItem.vue";

const sidebarOpened = ref(false)
const mainNavigation = [
    {href: 'buttons', active: false, label: 'Button', children: [], ability:[], icon: RectangleGroupIcon},
    {href: 'index', active: false, label: 'Notify', ability:[], icon: HomeModernIcon,
        children: [
            {href: 'alerts', active: false, label: 'Alert', children: [], ability:[], icon: MegaphoneIcon},
            {href: 'toast', active: false, label: 'Toast', children: [], ability:[], icon: FlagIcon},
        ]
    },
    {href: 'avatar', active: false, label: 'Avatar', children: [], ability:[], icon: PhotoIcon},
    {href: 'dropdown', active: false, label: 'Dropdown-Menu', children: [], ability:[], icon: Bars4Icon},
    {href: 'listbox', active: false, label: 'Listbox', children: [], ability:[], icon: ListBulletIcon},
    {href: 'combobox', active: false, label: 'Combobox', children: [], ability:[], icon: QueueListIcon},
    {href: 'slide-over', active: false, label: 'Slide-Over', children: [], ability:[], icon: PlayIcon},
]
const formAndTable = [
    {href: 'form', active: false, label: 'Form', children: [], ability:[], icon: ClipboardDocumentIcon},
    {href: 'paginate', active: false, label: 'Paginate', children: [], ability:[], icon: Square3Stack3DIcon},
    {href: 'contacts', active: false, label: 'DataTable', children: [], ability:[], icon: TableCellsIcon},
]

const following = [
    {href: 'https://www.simedicine.org', label: 'Siriraj Medicine', children: [], ability:['test'], icon: null, imageUrl: 'https://www.simedicine.org/build/assets/mu_logo.34c4703a.jpg'},
    {href: 'https://www.simedicine.org', label: 'Index page', children: [], ability:[], icon: null, imageUrl: 'https://www.simedicine.org/build/assets/mu_logo.34c4703a.jpg'},
]

</script>

<template>
    <div class="flex min-h-screen">
        <TransitionRoot :show="sidebarOpened">
            <!-- ส่วนที่ 1 จะแสดง side menu ตอนกดปุ่ม แฮมเบอร์เกอร์ menu       -->
            <Dialog as="div" @close="sidebarOpened = false" class="fixed inset-0 z-40 lg:hidden">
                <TransitionChild
                    enter="transition ease-in-out duration-200 transform"
                    enter-from="-translate-x-full"
                    enter-to="translate-x-0"
                    leave="transition ease-in-out duration-200 transform"
                    leave-from="translate-x-0"
                    leave-to="-translate-x-full"
                    as="template">
                    <div class="flex relative z-10 flex-col w-72 h-full bg-gray-50 border-r border-gray-200 lg:hidden">
                        <button
                            @click="sidebarOpened = false"
                            class="hover:ring-2 hover:ring-gray-300 flex absolute top-2 right-2 justify-center items-center w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-600"
                            type="button" value="Close sidebar">
                            <XMarkIcon class="w-5 h-5"/>
                        </button>
                        <div class="px-3 pt-8 pb-4">
                            <a :href="route('index')">
                                <div class="w-48 h-9">Application LOGO</div>
                            </a>
                        </div>

                        <div class="overflow-y-auto flex-1">
                            <div class="mb-10">
                                <h3 class="px-3 mb-2 text-xs tracking-widest text-gray-400 uppercase">
                                    Utility
                                </h3>
                                <NavItem
                                    @close-side-bar.once="(value) => sidebarOpened = value"
                                    :item="item"
                                    v-for="item in mainNavigation "
                                    :key="item.label"
                                />

                            </div>
                            <div class="mb-10">
                                <h3 class="px-3 mb-2 text-xs tracking-widest text-gray-400 uppercase">
                                    Library
                                </h3>
                                <NavItem
                                    @close-side-bar.once="(value) => sidebarOpened = value"
                                    :item="item"
                                    v-for="item in formAndTable "
                                    :key="item.label"
                                />

                            </div>
                            <div class="mb-10">
                                <h3 class="px-3 mb-2 text-xs tracking-widest text-gray-400 uppercase">
                                    Following
                                </h3>
                                <a
                                    v-for="(item, index) in following"
                                    v-show="! item.ability.length"
                                    :href="item.href" @click="sidebarOpened = false" :key="index" class="flex items-center px-3 py-2.5 text-gray-500 hover:text-orange-600 group">
                                    <img :src="item.imageUrl" alt="" class="mr-2 w-7 h-7 rounded-full">
                                    {{ item.label }}
                                </a>
                            </div>
                        </div>
                    </div>
                </TransitionChild>
                <TransitionChild
                    enter="transition-opacity ease-linear duration-200"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-200"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                    as="template">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-50"></DialogOverlay>
                </TransitionChild>
            </Dialog>
        </TransitionRoot>

        <!-- จะแสดง side menu ตอนหน้าจอขนาด lg       -->
        <nav class="hidden w-64 bg-gray-50 border-r border-gray-200 lg:block mt-2 px-2">
            <div class="py-4 px-3">
                <a :href="route('index')">
                    <div class="w-48 h-9">Application LOGO</div>
                </a>
            </div>

            <div class="mb-10">
                <h3 class="px-3 mb-2 text-xs tracking-widest font-semibold text-gray-400 uppercase">
                    Utility
                </h3>
                <NavItem
                    :item="item"
                    v-for="item in mainNavigation "
                    :key="item.label"
                />

            </div>
            <div class="mb-10">
                <h3 class="px-3 mb-2 text-xs tracking-widest text-gray-400 uppercase">
                    Form and Table
                </h3>
                <NavItem
                    :item="item"
                    v-for="item in formAndTable "
                    :key="item.label"
                />

            </div>
            <div class="mb-10">
                <h3 class="px-3 mb-2 text-xs tracking-widest text-gray-400 uppercase">
                    Following
                </h3>
                <a v-for="(item, index) in following"
                   v-show="! item.ability.length"
                   :href="item.href" :key="index" class="flex items-center px-3 py-2.5 font-medium text-sm text-gray-600 hover:text-orange-600 group">
                    <img :src="item.imageUrl" alt="" class="mr-2 w-7 h-7 rounded-full">
                    {{ item.label }}
                </a>
            </div>
        </nav>

        <!-- จะไม่แสดง side menu ตอนหน้าจอขนาดเล็กกว่า lg จะมีแค่ปุมให้กดเพื่อเปิด menu และเมื่อเปิด menu จะทำให้ส่วนที่ 1 แสดงผล       -->
        <nav class="flex-1">
            <div class="flex justify-between py-3 px-3 md:px-6 space-x-3 md:space-x-6 bg-gray-50 border-b">
                <div class="flex items-center flex-1">
                    <button
                        @click="sidebarOpened = true"
                        class="mr-3 lg:hidden flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full text-gray-600 hover:ring-2 hover:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600"
                        type="button" value="Open sidebar">
                        <QueueListIcon class="h-6 w-6"/>
                    </button>
                    <form action="" class="w-full max-w-md">
                        <div class="flex relative items-center text-gray-400 focus-within:text-gray-600">
                            <MagnifyingGlassIcon class="absolute ml-3 w-5 h-5 pointer-events-none"/>
                            <input
                                type="text"
                                name="search"
                                placeholder="Search"
                                autocomplete="off"
                                aria-label="Search talk"
                                class="py-2 pr-3 pl-10 w-full font-semibold placeholder-gray-500 text-black rounded-2xl border-none ring-2 ring-gray-300 focus:ring-gray-500 focus:ring-2"
                            >
                        </div>
                    </form>
                </div>
                <div class="relative flex-shrink-0">
                    <Dropdown class="m-5" align="right" width="15rem">
                        <Avatar
                            shape="circle"
                            size="base"
                            name="Random Image"
                            initials="RI"
                            src="https://images.unsplash.com/photo-1683524430079-d45876f50fed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                        />
                        <template #items>
                            <DropdownItemGroup>
                                <DropdownItem href="https://www.simedicine.org" target="_blank"> Edit </DropdownItem>
                                <DropdownItem> Duplicate </DropdownItem>
                            </DropdownItemGroup>

                            <DropdownItemGroup label="Actions">
                                <DropdownItem description="Don't worry, you can undo.">
                                    Archive
                                </DropdownItem>
                                <DropdownItem> Move </DropdownItem>
                                <DropdownItem> Share </DropdownItem>
                            </DropdownItemGroup>

                            <DropdownItemGroup>
                                <DropdownItem as="button" @click=""> Delete </DropdownItem>
                            </DropdownItemGroup>
                        </template>
                    </Dropdown>
                </div>
            </div>

            <!-- ส่วนแสดง content ที่ต้องการ            -->
            <slot></slot>
        </nav>
    </div>
</template>
