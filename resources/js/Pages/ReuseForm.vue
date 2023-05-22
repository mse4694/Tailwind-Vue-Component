<script setup>

import { ref } from "vue";
import Button from '../Components/Button.vue'
import { ArrowPathIcon, EyeIcon, EyeSlashIcon } from "@heroicons/vue/20/solid";
import BaseLabel from '../Components/BaseLabel.vue'
import ErrorMessage from '../Components/ErrorMessage.vue'
import Field from '../Components/Field.vue'
import BaseInput from '../Components/BaseInput.vue'
import BaseCheckbox from '../Components/BaseCheckbox.vue'
import BaseRadioGroup from '../Components/Radio/BaseRadioGroup.vue'
import BaseTextarea from '../Components/BaseTextarea.vue'
import HelperMessage from '../Components/HelperMessage.vue'
import BaseToggle from '../Components/BaseToggle.vue'


const form = ref({
    name: null,
    lastname: null,
    title: null,
    password: null,
    leader: false,
    sampleSuccessCheckbox: true,
    sampleErrorCheckbox: true,
    role: 0,
    sampleInlineRadiobox: 0,
    sampleHorizontalRadiobox: 0,
    sampleDisableRadiobox: 0,
    comment: null,
    basicToggle: false
})

const roles = [
    { value: 1, label: 'Marketing' },
    { value: 2, label: 'Helpdesk' },
    { value: 3, label: 'Support' },
]

const inlines = [
    { value: 1, label: 'Marketing-i' },
    { value: 2, label: 'Helpdesk-i' },
    { value: 3, label: 'Support-i' },
]

const horizontals = [
    { value: 1, label: 'Marketing-h' },
    { value: 2, label: 'Helpdesk-h' },
    { value: 3, label: 'Support-h' },
]

const disable = [
    { value: 1, label: 'd1' },
    { value: 2, label: 'd2' },
    { value: 3, label: 'd3' },
]

const errors = ref({
    name: '',
    lastname: '',
    empty: '',
    error: 'This is form error message.',
    password: 'Password error because ...'   
})

</script>

<template>
    <div class="m-5 space-y-5">
        <div class="flex flex-col space-y-5">
            <div class="border p-2 space-y-2">
                <h2 class="font-semibold underline mb-2">Field Component</h2>
                
                <Field
                    label="คำนำหน้า"
                    required
                    :error="errors.empty"
                    help="ใส่คำนำหน้า นาย นาง หรือ นางสาว"
                >
                    <BaseInput 
                        v-model="form.title"
                        type="text"
                    />
                </Field>

                <Field
                    label="ชื่อ"
                    required
                    :error="errors.name"
                    help="ใส่ชื่อแรกของตนเอง"
                >
                    <BaseInput 
                        v-model="form.name"
                        type="text"
                        placeholder="ชื่อ"
                    />
                </Field>
              
                <Field
                    label="นามสกุล"
                    required    
                >
                    <BaseInput
                        v-model="form.lastname"
                        intent="warning" 
                        type="text"
                        placeholder="ใส่นามสกุล ทดสอบ intent warning"
                    />
                </Field>

                <Field
                    label="Error"
                    required 
                    :error="errors.error"   
                >
                    <BaseInput
                        type="text"
                        placeholder="ทดสอบ Field"
                    />
                </Field>
              
                <Field
                    label="Success"
                    required 
                    :error="errors.empty"   
                >
                    <BaseInput
                        intent="success" 
                        type="text"
                        placeholder="ทดสอบ Field intent success"
                    />
                </Field>

                <Field
                    label="Disable"
                    :error="errors.empty"   
                >
                    <BaseInput
                        type="text"
                        placeholder="ทดสอบ disabled"
                        disabled
                    />
                </Field>

                <Field
                    label="Password"
                    required 
                    :error="errors.password"
                    help="ความยาวอย่างน้อย 8 ตัวอักษร และต้องมี อักระพิเศษ"   
                >
                    <BaseInput
                        v-model="form.password"
                        type="password"
                    />
                </Field>
                
            </div>

            <div class="border p-2">
                <h2 class="font-semibold underline mb-2">Base Checkbox Component</h2>

                <div>
                    <BaseCheckbox 
                        v-model="form.leader"
                        label="ตำแหน่งหัวหน้างาน"
                        id="leader"
                    />
                </div>

                <div>
                    <BaseCheckbox 
                        v-model="form.sampleErrorCheckbox"
                        label="กรุณากดยอมรับ"
                        id="cb-error"
                        intent="error"
                        error="เลือกข้อนี้คำเตือนจะหายไป"
                    />
                </div>

                <div>
                    <BaseCheckbox 
                        label="มีคำเตือน"
                        id="cb-warning"
                        intent="warning"
                    />
                </div>

                <div>
                    <BaseCheckbox
                        v-model="form.sampleSuccessCheckbox" 
                        label="เรียบร้อย"
                        id="cb-success"
                        intent="success"
                    />
                </div>

                <div>
                    <BaseCheckbox
                        label="Disable"
                        id="cb-disable"
                        disabled
                    />
                </div>
            </div>

            <div class="border p-2">
                <h2 class="font-semibold underline mb-2">Base Radio Component</h2>
                <h3 class="mt-2 font-semibold">Normal Radio</h3>
                <BaseRadioGroup
                    v-model="form.role"
                    :options="roles"
                    name="option"
                />

                <h3 class="mt-2 font-semibold">Inline Radio</h3>
                <BaseRadioGroup
                    v-model="form.sampleInlineRadiobox"
                    :options="inlines"
                    name="inline"
                    radio-type="inline"
                />

                <h3 class="mt-2 font-semibold">Horizontal Radio</h3>
                <BaseRadioGroup
                    v-model="form.sampleHorizontalRadiobox"
                    :options="horizontals"
                    name="horizontal"
                    radio-type="horizontal"
                />

                <h3 class="mt-2 font-semibold">Disable Radio with error</h3>
                <BaseRadioGroup
                    v-model="form.sampleDisableRadiobox"
                    :options="disable"
                    name="disable"
                    error="You can't choose me."
                    errorIcon="true"
                    disabled
                />
            </div>

            <div class="border p-2 space-y-2">
                <h2 class="font-semibold underline mb-2">Base Toggle Component</h2>
                <h3 class="mt-2 font-semibold">Basic Toggle</h3>
                <BaseToggle
                    class="w-16"
                    v-model="form.basicToggle"
                    intent="info"
                >
                    <template v-slot:offMessage>
                        ปิด
                    </template>
                    <template v-slot:onMessage>
                        เปิด
                    </template>
                </BaseToggle>

                <BaseToggle
                    class="w-16"
                    v-model="form.basicToggle"
                    shape="square"
                >
                    <template v-slot:offMessage>
                        OFF
                    </template>
                    <template v-slot:onMessage>
                        ON
                    </template>
                </BaseToggle>

                <BaseToggle
                    class="w-20"
                    v-model="form.basicToggle"
                    size="base"
                    intent="warning"
                >
                    <template v-slot:offMessage>
                        <EyeSlashIcon class="w-5 h-5"/>
                    </template>
                    <template v-slot:onMessage>
                        <EyeIcon class="w-5 h-5"/>
                    </template>
                </BaseToggle>

                <BaseToggle
                    class="w-20"
                    v-model="form.basicToggle"
                    shape="square"
                    size="base"
                >
                    <template v-slot:offMessage>
                        Close
                    </template>
                    <template v-slot:onMessage>
                        Open
                    </template>
                </BaseToggle>

                <BaseToggle
                    class="w-24"
                    v-model="form.basicToggle"
                    size="lg"
                    intent="danger"
                    :disabled="false"
                >
                    <template v-slot:offMessage>
                        Close
                    </template>
                    <template v-slot:onMessage>
                        Open
                    </template>
                </BaseToggle>

                <BaseToggle
                    class="w-24"
                    v-model="form.basicToggle"
                    shape="square"
                    size="lg"
                    :disabled="true"
                />
            </div>
            

            <div class="border p-2">
                <h2 class="font-semibold underline mb-2">Base Textarea Component</h2>
                <Field
                    label="Comment"
                    required 
                    :error="errors.empty"
                    help="ความยาวอย่างน้อย 256 ตัวอักษร"   
                >
                    <BaseTextarea
                        v-model="form.comment"
                        placeholder="ความคิดเห็นเพิ่มเติม"
                    />
                </Field>
            </div>

            <div>{{ form }}</div>
            
        </div>
    
        <div class="flex">
            <Button
                as="a"
                intent="text" 
                :href="route('welcome')"
                :left-icon="ArrowPathIcon"
                :right-icon="ArrowPathIcon"
                class="w-full"
            >Return to Welcome Page</Button>
        </div>
    </div>


</template>