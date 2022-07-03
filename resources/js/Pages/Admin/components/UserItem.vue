<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

</script>

<template>
    <td class="v_ wk xe vm co ut">
        <div class="flex items-center">
            <label class="inline-flex">
                <span class="tc">Select</span>
                <input class="table-item to" v-model="user.selected" type="checkbox" />
            </label>
        </div>
    </td>
    <td class="v_ wk xe vm co ut">
        <div class="flex items-center td">
            <div class="g_ text-center">{{ user.id }}</div>
        </div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="flex items-center justify-center">
            <div class="h-20 w-20 ap mr-2 _f">
                <img v-if="user?.userable?.media[0]?.original_url" class=""
                    :src="user?.userable?.media[0]?.original_url" alt="User 01" />
            </div>
        </div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center">{{ user.name }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center">{{ user.email_verified_at }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="gp">{{ user.created_at }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center gk yj">{{ getUserType(user) }}</div>
    </td>

    <td class="v_ wk xe vm co ut">
        <button @click="openInfoModal = !openInfoModal"
            class="yu xm rounded-full border  mx-4 border-green-600 bg-green-600">
            <i class="fa-solid fa-info uu of db flex justify-center text-gray-100 items-center"></i>
        </button>
    </td>


    <TransitionRoot as="template" :show="openInfoModal">
        <Dialog as="div" class="relative z-10" @close="openInfoModal = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-2xl sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <i class="fa fa-info text-indigo-500 text-2xl"></i>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                            User Information </DialogTitle>
                                        <div v-if="user?.address" class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                <span class="font-bold">Phone number:</span> {{ user.address.phone }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <span class="font-bold">Full Name:</span> {{ user.address.full_name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <span class="font-bold">City:</span> {{ user.address.city }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <span class="font-bold">Address:</span> {{ user.address.address }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <span class="font-bold">ZIP:</span> {{ user.address.zip }}
                                            </p>
                                        </div>
                                        <div v-if="user?.address" class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                <span class="font-bold">Phone number:</span> {{ user.address.phone }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="openInfoModal = false" ref="cancelButtonRef">Cancel</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
export default {
    name: 'DiplomaUserItem',
    props: {
        user: {
            type: Object,
            required: true
        },
    },

    data() {
        return {
            openInfoModal: false,
        };
    },

    mounted() {


    },

    methods: {
        getUserType(user) {

            if (user.userable_type === String.raw`App\Models\Admin`) {
                return 'Admin';
            } else if (user.userable_type === String.raw`App\Models\Carrier`) {
                return 'Carrier';
            } else if (user.userable_type == String.raw`App\Models\Company`) {
                return 'Company';
            } else {
                return 'Client';
            }
        },
    },
};
</script>

<style scoped>
</style>
