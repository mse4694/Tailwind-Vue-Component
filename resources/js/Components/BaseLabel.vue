<script setup>
const props = defineProps({
    for: {
        type: String,
        default: ''
    }
})
</script>

<template>
    <label :for="for" class="block text-sm font-semibold text-label text-gray-800 truncate">
        <slot></slot>
    </label>
</template>


