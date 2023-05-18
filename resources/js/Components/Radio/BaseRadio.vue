<script setup>

const props = defineProps({
    label: {
        type: [String, Boolean],
        default: ''
    },
    modelValue: {
        type: [String, Number],
        default: ''
    },
    value: {
        type: [String, Number],
        required: true,
    },
    radioBoxClass: String
})

const emit = defineEmits(['update:modelValue'])

const updateInput = ($event) => {
    emit('update:modelValue', $event.target.value)
}

</script>

<template>
    <input
        v-bind="$attrs"
        :checked="modelValue === value"
        @change="updateInput"
        :value="value"
        type="radio"
        :class="radioBoxClass"
    />
    <label
        :for="$attrs.id" 
        class="ml-2 text-sm font-medium text-gray-900"
    >
            {{ label }}
    </label>
    
</template>


