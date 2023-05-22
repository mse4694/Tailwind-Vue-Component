<script setup>
import { computed, inject, onMounted } from "vue";
import BaseLabel from '@/Components/BaseLabel.vue'

const props = defineProps({
    modelValue: {
        type: [String, Number],
        default: ''
    },
    id: String,
    disabled: {
        type: Boolean,
        default: false,
    },
    invalid: {
        type: Boolean,
        default: false,
    },
    ariaDescribedBy: String,
    required: Boolean
})

const emit = defineEmits(['update:modelValue'])

const updateInput = ($event) => {
    emit('update:modelValue', $event.target.value)
}

const field = inject('field', props)

</script>

<template>
    <textarea
        v-bind="$attrs"
        :id="field.id"
        :value="modelValue"
        @input="updateInput"
        row="3"
        :placeholder="$attrs.placeholder"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
        :class="[field.invalid ? 'border-red-600 focus:ring-red-500 focus:border-red-500' : '']"
        :required="field.required"
        :disabled="props.disabled"
    />
</template>


