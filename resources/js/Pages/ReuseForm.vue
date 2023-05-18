<script setup>

import { ref } from "vue";
import Button from '../Components/Button.vue'
import { ArrowPathIcon } from "@heroicons/vue/20/solid";
import BaseInput from '../Components/BaseInput.vue'
import BaseCheckbox from '../Components/BaseCheckbox.vue'
import BaseRadioGroup from '../Components/Radio/BaseRadioGroup.vue'
import BaseTextarea from '../Components/BaseTextarea.vue'
import BaseHelpbox from '../Components/BaseHelpbox.vue'


const form = ref({
    title: null,
    description: null,
    location: null,
    password: null,
    leader: false,
    sampleSuccessCheckbox: true,
    sampleErrorCheckbox: true,
    role: 0,
    sampleDisableRadiobox: 0,
    comment: null,
})

const roles = [
    { value: 1, label: 'Marketing' },
    { value: 2, label: 'Helpdesk' },
    { value: 3, label: 'Support' },
]

const disable = [
    { value: 1, label: 'd1' },
    { value: 2, label: 'd2' },
    { value: 3, label: 'd3' },
]

</script>

<template>
    <div class="m-5 space-y-5">
        <div class="flex flex-col space-y-5">
            <div class="border p-2 space-y-2">
                <h2 class="font-semibold underline mb-2">Base Input Component</h2>
                <div>
                    <BaseInput 
                        label="Warning"
                        type="text"
                        id="warning"
                        intent="warning"
                    />
                </div>

                <div>
                    <BaseInput 
                        label="Error"
                        type="text"
                        id="error"
                        intent="error"
                        error="This is form error message."
                    />
                </div>

                <div>
                    <BaseInput 
                        label="Success"
                        type="text"
                        id="success"
                        intent="success"
                    />
                </div>

                <div>
                    <BaseInput 
                        label="Disable"
                        type="text"
                        id="disable"
                        disabled
                    />
                </div>

                <div>
                    <BaseInput 
                        v-model="form.title"
                        label="Title"
                        type="text"
                        id="title"
                    />
                    <BaseHelpbox class="mt-1">
                        This is a help block!
                    </BaseHelpbox>
                </div>

                <div>
                    <BaseInput 
                        v-model="form.description"
                        label="Description"
                        type="text"
                        id="description"
                    />
                </div>

                <div>
                    <BaseInput 
                        v-model="form.location"
                        placeholder="สถานที่"
                        label="Location"
                        type="text"
                        id="place"
                    />
                </div>
                
                <div>
                    <BaseInput 
                        v-model="form.password"
                        placeholder="รหัสผ่าน"
                        type="password"
                        id="password"
                    />
                </div>
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
                        label="มีข้อผิดพลาด"
                        id="cb-error"
                        intent="error"
                        error="You should accept the terms."
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

                <h3 class="mt-2 font-semibold">Disable Radio with error</h3>
                <BaseRadioGroup
                    v-model="form.sampleDisableRadiobox"
                    :options="disable"
                    name="disable"
                    error="You can't choose me."
                    disabled
                />
            </div>

            <div class="border p-2">
                <h2 class="font-semibold underline mb-2">Base Textarea Component</h2>
                <BaseTextarea
                    v-model="form.comment"
                    name="comment"
                    id="comment"
                    label="Comment"
                    placeholder="ความคิดเห็นเพิ่มเติม"
                />
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