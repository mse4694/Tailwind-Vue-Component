<script setup>
import { computed } from "vue";
import { cva } from "class-variance-authority";

const props = defineProps({
    intent: {
        type: String,
        validator: (val) => ["success", "info", "warning", "danger"].includes(val),
        default: "success",
    },
    disabled: {
        type: [String, Boolean],
        default: false,
    },
    size: {
        type: String,
        validator:(value) => ["sm", "base", "lg"].includes(value),
        default: "sm"
    },
    shape: {
        type: String,
        validator:(value) => ["circle", "square"].includes(value),
        default: "circle" 
    },
    modelValue: {
        type: Boolean,
        default: false,
    }
})

const containerClass = computed(() => {
    return cva("flex items-center justify-between p-1 duration-300 cursor-pointer", {
        variants: {
            size: {
                sm: "text-xs font-bold  h-6 w-12",
                base: "text-sm font-bold h-8 w-16",
                lg: "text-md font-bold h-10 w-20",
            },
            shape: {
                circle: "rounded-full",
                square: "rounded-md",
            },
            disabled: {
                true: "!cursor-not-allowed"
            }
        },
    })({size: props.size, shape: props.shape, disabled: props.disabled})
})

const containerColorClass = computed(() => {
    return cva("", {
        variants: {
            intent: {
                info: "text-black bg-blue-500",
                success: "text-white bg-green-500",
                warning: "text-black bg-yellow-500 ",
                danger: "text-black bg-red-500",
            },
        },
    })({intent: props.intent})
})

const innerBorderClass = computed(() => {
    return cva("bg-white rounded-full shadow-md transform duration-300", {
        variants: {
            size: {
                sm: "w-4 h-4",
                base: "h-6 w-6",
                lg: "h-8 w-8",

            },
        },
    })({size: props.size})
})

const emit = defineEmits(['update:modelValue'])

const Toggle = () => {
    if( !props.disabled ) {
        emit('update:modelValue', !props.modelValue)
    }
} 

</script>

<template>
    <div
        v-bind="$attrs"
        :class="[containerClass, modelValue ? containerColorClass : 'bg-gray-300']"
        @click="Toggle"
    > 
        
        <div v-if="modelValue">
            <slot name="offMessage"></slot>
        </div>
    
        <div
            :class="[innerBorderClass, modelValue ? 'translate-x-0' : '']"
        ></div>

        <div v-if="!modelValue">
            <slot name="onMessage"></slot>
        </div>  
    </div>
    
</template>
