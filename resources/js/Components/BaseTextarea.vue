<script setup>
import BaseLabel from '@/Components/BaseLabel.vue'

const props = defineProps({
    label: {
        type: [String, Boolean],
        default: false
    },
    
    modelValue: {
        type: [String, Number],
        default: ''
    }
})

const emit = defineEmits(['update:modelValue'])

const updateInput = ($event) => {
    emit('update:modelValue', $event.target.value)
}

</script>

<template>
    <BaseLabel :for="$attrs.id">
        {{ label }}
    </BaseLabel>
    <textarea
        v-bind="$attrs"
        :value="modelValue"
        @input="updateInput"
        row="3"
        :placeholder="$attrs.placeholder"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
    />
</template>


