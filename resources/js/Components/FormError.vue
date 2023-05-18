<script setup>
import { XCircleIcon } from "@heroicons/vue/20/solid";
</script>

<template>
    <span class="inline-flex items-center text-sm font-medium text-label text-red-600 truncate">
        <XCircleIcon class="w-5 h-5" />        
        <slot></slot>
    </span>
</template>

