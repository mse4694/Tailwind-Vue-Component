<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    layout: AppLayout,
}
</script>

<script setup>
import { ref } from 'vue'
import Button from '../Components/Button.vue'
import SlideOver from '@/Components/SlideOver.vue'

</script>

<template>
<!--    <Button intent="primary" @click="slideSide = 'right'">Slide right</Button>-->
<!--    <Button intent="primary" @click="slideSide = 'left'">Slide left</Button>-->
    <SlideOver side="right"></SlideOver>
</template>
