<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    layout: AppLayout,
}
</script>

<script setup>
import Button from '../Components/Button.vue'
import { EnvelopeIcon, ArrowPathIcon } from "@heroicons/vue/20/solid"
</script>

<template>
    <div class="mt-5 ml-5 mr-5 space-y-5 divide-y divide-solid">
        <!-- Normal -->
        <div class="flex flex-wrap gap-5">
            <Button intent="primary">Primary</Button>
            <Button intent="secondary">Secondary</Button>
            <Button intent="success" >Success</Button>
            <Button intent="info">Info</Button>
            <Button intent="warning">Warning</Button>
            <Button intent="danger">Danger</Button>
            <Button intent="text">Text</Button>
        </div>

        <!-- Loading -->
        <div class="flex flex-wrap gap-5">
            <Button loading intent="primary">Primary</Button>
            <Button loading intent="secondary">Secondary</Button>
            <Button loading intent="success" >Success</Button>
            <Button loading intent="info">Info</Button>
            <Button loading intent="warning">Warning</Button>
            <Button loading intent="danger">Danger</Button>
            <Button loading intent="text">Text</Button>
        </div>

        <!-- Left Icon -->
        <div class="flex flex-wrap gap-5">
            <Button
                intent="primary"
                :left-icon="EnvelopeIcon"
            >Primary</Button>

            <Button
                intent="secondary"
                :left-icon="EnvelopeIcon"
            >Secondary</Button>

            <Button
                intent="success"
                :left-icon="EnvelopeIcon"
            >Success</Button>

            <Button
                intent="info"
                :left-icon="EnvelopeIcon"
            >Info</Button>

            <Button
                intent="warning"
                :left-icon="EnvelopeIcon"
            >Warning</Button>

            <Button
                intent="danger"
                :left-icon="EnvelopeIcon"
            >Danger</Button>

            <Button
                intent="text"
                :left-icon="EnvelopeIcon"
            >Text</Button>
        </div>

        <!-- Right Icon -->
        <div class="flex flex-wrap gap-5">
            <Button
                intent="primary"
                :right-icon="EnvelopeIcon"
            >Primary</Button>

            <Button
                intent="secondary"
                :right-icon="EnvelopeIcon"
            >Secondary</Button>

            <Button
                intent="success"
                size="mini"
                :right-icon="EnvelopeIcon"
            >Success</Button>

            <Button
                intent="info"
                size="small"
                :right-icon="EnvelopeIcon"
            >Info</Button>

            <Button
                intent="warning"
                size="medium"
                :right-icon="EnvelopeIcon"
            >Warning</Button>

            <Button
                intent="danger"
                size="large"
                :right-icon="EnvelopeIcon"
            >Danger</Button>

            <Button
                intent="text"
                size="xlarge"
                :right-icon="EnvelopeIcon"
            >Text</Button>
        </div>

        <!-- Disabled -->
        <div class="flex flex-wrap gap-5">
            <Button
                disabled
                intent="primary"
                :left-icon="EnvelopeIcon"
            >Primary</Button>

            <Button
                disabled
                intent="secondary"
                :left-icon="EnvelopeIcon"
            >Secondary</Button>

            <Button
                disabled
                intent="success"
                :left-icon="EnvelopeIcon"
            >Success</Button>

            <Button
                disabled
                intent="info"
                :left-icon="EnvelopeIcon"
            >Info</Button>

            <Button
                disabled
                intent="warning"
                :left-icon="EnvelopeIcon"
            >Warning</Button>

            <Button
                disabled
                intent="danger"
                :left-icon="EnvelopeIcon"
            >Danger</Button>

            <Button
                disabled
                intent="text"
                size="large"
                :left-icon="EnvelopeIcon"
            >Text</Button>
        </div>

<!--        <div class="flex">-->
<!--            <Button-->
<!--                as="a"-->
<!--                intent="text"-->
<!--                :href="route('index')"-->
<!--                :left-icon="ArrowPathIcon"-->
<!--                :right-icon="ArrowPathIcon"-->
<!--                class="w-full"-->
<!--            >Return to Welcome Page</Button>-->
<!--        </div>-->
    </div>
</template>
