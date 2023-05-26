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

const isOpen = ref(true)

function setIsOpen(value) {
    isOpen.value = value
}
</script>

<template>
    <TransitionRoot appear as="template" :show="isOpen">
        <Dialog
            class="fixed inset-0 overflow-hidden z-10"
            :open="isOpen" @close="setIsOpen">
            <TransitionChild
                enter="transition-opacity duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="transition-opacity duration-300"
                leave-from="opacity-100"
                leave-to="opacity-0"
                as="template">
                <DialogOverlay class="absolute inset-0 bg-black bg-opacity-40"></DialogOverlay>
            </TransitionChild>
<!--            <DialogPanel class="absolute inset-0 bg-black bg-opacity-40">-->
            <TransitionChild
                enter="transform transition-transform duration-300"
                enter-from="translate-x-full"
                enter-to="translate-x-0"
                leave="transform transition-transform duration-300"
                leave-from="translate-x-0"
                leave-to="translate-x-full"
                as="template">
                <div class="bg-white fixed inset-y-0 right-0 w-full max-w-sm">
                    <DialogTitle>Deactivate account</DialogTitle>
                    <DialogDescription>
                        This will permanently deactivate your account
                    </DialogDescription>

                    <p>
                        Are you sure you want to deactivate your account? All of your data will be
                        permanently removed. This action cannot be undone.
                    </p>

                    <button @click="setIsOpen(false)">Deactivate</button>
                    <button @click="setIsOpen(false)">Cancel</button>
                </div>
            </TransitionChild>
<!--            </DialogPanel>-->
        </Dialog>
    </TransitionRoot>
</template>
