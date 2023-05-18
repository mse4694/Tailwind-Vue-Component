<script setup>
import { computed } from "vue";
import { cva } from "class-variance-authority";
import BaseRadio from '@/Components/Radio/BaseRadio.vue'
import FormError from '../../Components/FormError.vue'

const emit = defineEmits(['update:modelValue'])

const props = defineProps({
    options: {
        type: Array,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    modelValue: {
        type: [String, Number],
        required: true
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    error: {
        type: String,
        default: '',
    },
})

const updateInput = ($event) => {
    emit('update:modelValue', $event)
}

const radioBoxClass = computed(() => {
    return cva(
        "w-4 h-4 text-blue-600 border-gray-400 rounded focus:ring-0 cursor-pointer", 
        {
            variants: {
                disabled: {
                    true: "!bg-gray-100 !text-gray-400 !border-gray-400 !cursor-not-allowed"
                }
            }
        }
    )({
        disabled: props.disabled,
    });
})

</script>

<template>
    <div class="flex space-x-4">
        <BaseRadio
            v-for="(option, index) in options"
            :key="index"
            :label="option.label"
            :value="option.value"
            :name="name"
            :id="option.label"    
            :model-value="props.modelValue"
            @update:modelValue="updateInput"
            :radioBoxClass="radioBoxClass"
            :disabled="props.disabled" 
        />
    </div>
    <div class="flex flex-col">
        <FormError v-if="props.error">{{ props.error }}</FormError>
    </div>
</template>
