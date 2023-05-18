<script setup>
import { ref } from "vue";
import Dropdown from '../Components/Dropdown/BaseDropdown.vue';
import DropdownItemGroup from '../Components/Dropdown/DropdownItemGroup.vue'
import DropdownItem from '../Components/Dropdown/DropdownItem.vue'
import Button from '../Components/Button.vue'
import Alert from '../Components/Alert.vue';
import Avatar from '../Components/Avatar.vue';
import { ArrowPathIcon } from "@heroicons/vue/20/solid";

const showAlert = ref(false)
function deleteSomething() {
    showAlert.value = !showAlert.value
}
</script>

<template>
    <Alert intent="success" :show="showAlert" :on-dismiss="() => (showAlert = false)" title="This is my Alert Component">
        <p>Delete works!</p>
    </Alert>

    <div class="flex">
        <Dropdown class="m-5" align="left" width="20rem">
            <Avatar
                shape="circle"
                size="base" 
                name="Random Image" 
                initials="RI" 
            />
            <template #items>
                <DropdownItemGroup>
                    <DropdownItem href="https://www.simedicine.org" target="_blank"> Edit </DropdownItem>
                    <DropdownItem> Duplicate </DropdownItem>
                </DropdownItemGroup>
                        
                <DropdownItemGroup label="Actions">
                    <DropdownItem description="Don't worry, you can undo.">
                        Archive
                    </DropdownItem>
                    <DropdownItem> Move </DropdownItem>
                    <DropdownItem> Share </DropdownItem>
                </DropdownItemGroup>
            
                <DropdownItemGroup>
                    <DropdownItem as="button" @click="deleteSomething()"> Delete </DropdownItem>
                </DropdownItemGroup>
            </template>
        </Dropdown>
    </div>
    
    <div class="flex">
        <Dropdown class="m-5" align="left" width="20rem">
            <button class="border p-1 rounded-md bg-slate-400">w-20rem, align left</button>
            <template #items>
                <DropdownItemGroup>
                    <DropdownItem href="https://www.simedicine.org" target="_blank"> Edit </DropdownItem>
                    <DropdownItem> Duplicate </DropdownItem>
                </DropdownItemGroup>
                        
                <DropdownItemGroup label="Actions">
                    <DropdownItem description="Don't worry, you can undo.">
                        Archive
                    </DropdownItem>
                    <DropdownItem> Move </DropdownItem>
                    <DropdownItem> Share </DropdownItem>
                </DropdownItemGroup>
            
                <DropdownItemGroup>
                    <DropdownItem as="button" @click="deleteSomething()"> Delete </DropdownItem>
                </DropdownItemGroup>
            </template>
        </Dropdown>
    </div>

    <div class="flex justify-end">
        <Dropdown class="m-5" align="right" width="10rem">
            <button class="border p-1 rounded-md bg-yellow-600 text-white">w-10rem, align-right</button>
            <template #items>
                <DropdownItemGroup>
                    <DropdownItem href="https://www.simedicine.org" target="_blank"> Edit </DropdownItem>
                    <DropdownItem> Duplicate </DropdownItem>
                </DropdownItemGroup>
                        
                <DropdownItemGroup label="Actions">
                    <DropdownItem description="Don't worry, you can undo.">
                        Archive
                    </DropdownItem>
                    <DropdownItem> Move </DropdownItem>
                    <DropdownItem> Share </DropdownItem>
                </DropdownItemGroup>
            
                <DropdownItemGroup>
                    <DropdownItem as="button" @click="deleteSomething()"> Delete </DropdownItem>
                </DropdownItemGroup>
            </template>
        </Dropdown>
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
</template>