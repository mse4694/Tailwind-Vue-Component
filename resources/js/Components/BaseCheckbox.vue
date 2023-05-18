<script setup>
import { computed } from "vue";
import { cva } from "class-variance-authority";
import FormError from '../Components/FormError.vue'

const props = defineProps({
    label: {
        type: [String, Boolean],
        default: false
    },
    modelValue: {
        type: [Boolean],
        default: false
    },
    intent: {
        type: String,
        validator: (val) => ["success", "info", "warning", "error"].includes(val),
        default: "info",
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

const emit = defineEmits(['update:modelValue'])

const updateInput = ($event) => {
    emit('update:modelValue', $event.target.checked)
}

const checkBoxClass = computed(() => {
    return cva(
        "w-4 h-4 rounded focus:ring-0 border-gray-400 cursor-pointer", 
        {
            variants: {
                intent: {
                    info: " text-blue-600",
                    success: " text-green-600 ",
                    warning: " text-yellow-500 ",
                    error: " text-red-600",
                },
                disabled: {
                    true: "!bg-gray-100 !text-gray-400 !cursor-not-allowed"
                }
            }
        }
    )({
        intent: props.intent,
        disabled: props.disabled,
    });
})

</script>

<template>
    <input
        v-bind="$attrs"
        :checked="modelValue"
        @change="updateInput"
        row="3"
        type="checkbox"
        :class="checkBoxClass"
        :disabled="props.disabled" 
    />
    <label
        :for="$attrs.id" 
        class="ml-2 text-sm font-medium text-gray-900"
    >
            {{ label }}
    </label>
    <div>
        <FormError class="mt-1" v-if="props.error && !props.modelValue">
            {{ props.error }}
        </FormError>
    </div>
</template>


