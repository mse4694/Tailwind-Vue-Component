<script setup>
import {onUnmounted, ref} from 'vue'
import { router, usePage } from "@inertiajs/vue3"
import ToastListItem from './ToastListItem.vue'
import toast from "@/Stores/toast"

const page = usePage()

let removeFinshEventListener = router.on('finish', () => {
    if(page.props.toast) {
        toast.add({
            message: page.props.toast,
        });
    }
})

function remove(index) {
    toast.remove(index)
}

onUnmounted(() => removeFinshEventListener());

</script>

<template>
   <div>
        <TransitionGroup
            tag="div"
            enter-from-class="translate-x-full opacity-0"
            enter-active-class="duration-500 "
            leave-active-class="duration-500 "
            leave-to-class="translate-x-full opacity-0"
            class="fixed top-4 right-4 z-50 space-y-4 w-full max-w-xs"
        > 
            <ToastListItem
                v-for="(item, index) in toast.items" 
                :key="item.key" 
                :message="item.message"
                :duration="3000"
                @remove="remove(index)" 
            />
        </TransitionGroup>
    </div>

</template>