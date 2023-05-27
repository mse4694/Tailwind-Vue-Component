<script setup>
import { ref } from 'vue'
import {
    Dialog,
    DialogOverlay,
    DialogPanel,
    DialogTitle,
    DialogDescription,
    TransitionRoot,
    TransitionChild
} from '@headlessui/vue'
import {XMarkIcon,} from '@heroicons/vue/24/outline';
const isOpen = ref(true)
let checkoutButtonRef =ref(null)

function setIsOpen(value) {
    isOpen.value = value
}
</script>

<template>
    <TransitionRoot appear as="template" :show="isOpen">
        <Dialog
            :initial-focus="checkoutButtonRef"
            class="fixed inset-0 overflow-hidden z-10"
            :open="isOpen" @close="setIsOpen">
            <TransitionChild
                enter="transition-opacity ease-in-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="transition-opacity ease-in-out duration-300"
                leave-from="opacity-100"
                leave-to="opacity-0"
                as="template">
                <DialogOverlay class="absolute inset-0 bg-black bg-opacity-40"></DialogOverlay>
            </TransitionChild>
<!--            <DialogPanel class="absolute inset-0 bg-black bg-opacity-40">-->
            <TransitionChild
                enter="transform ease-in-out transition-transform duration-300"
                enter-from="translate-x-full"
                enter-to="translate-x-0"
                leave="transform ease-in-out transition-transform duration-300"
                leave-from="translate-x-0"
                leave-to="translate-x-full"
                as="template">
                <div class="flex flex-col bg-white fixed inset-y-0 right-0 w-full max-w-sm">
                    <div class="flex items-center justify-between p-4 shadow">
                        <DialogTitle class="text-lg font-semibold">Cart Summary</DialogTitle>
                        <button @click="setIsOpen(false)" class="p-1 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                            <XMarkIcon class="w-6 h-6"></XMarkIcon>
                        </button>
                    </div>

                    <div class="flex flex-col flex-1">
                        <div class="flex-1 relative">
                            <div class="absolute inset-0 overflow-y-scroll">
                                <div class="flex flex-col divide-y divide-gray-200">
                                    <div v-for="(item, index) in new Array(100)" :key="index" class="flex p-4 space-x-4 ">
                                        <div class="flex flex-col w-24">
                                            <img class="mb-0.5" src="https://via.placeholder.com/150" alt="">
                                            <button class="px-3 py-2 text-xs font-semibold tracking-wider uppercase text-center rounded cursor-pointer focus:ring-1 focus:ring-black">
                                                Remove
                                            </button>
                                        </div>
                                        <div>
                                            <div class="text-xl font-semibold leading-tight">Some Product Title</div>
                                            <div class="mt-2 text-gray-800 leading-normal">10 x $30 = $300 (incl. VAT)</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="py-6 px-4 bg-gray-50">
                            <div class="text-xm text-center font-semibold">Subtotal</div>
                            <div class="text-xm text-center font-semibold">$320 (incl. VAT)</div>
                            <div class="text-center mt-4 text-gray-600">To calculate</div>
                            <div class="flex flex-col space-y-2 mt-4">
                                <button class="bg-black p-3 text-white rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" ref="checkoutButtonRef" @click="setIsOpen(false)">Checkout</button>
                                <button class="p-3 bg-white text-gray-500 hover:text-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" @click="setIsOpen(false)">Continue shopping</button>
                            </div>
                        </div>
                    </div>


                </div>
            </TransitionChild>
<!--            </DialogPanel>-->
        </Dialog>
    </TransitionRoot>
</template>
