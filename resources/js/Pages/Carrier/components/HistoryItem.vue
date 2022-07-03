<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { Inertia } from '@inertiajs/inertia';
</script>

<template>
    <div @click="openInfoModal = !openInfoModal;" class="flex justify-between cursor-pointer space-x-3 py-5 px-4">
        <div class="min-w-0 flex-1">
            <a href="#" class="block focus:outline-none">
                <p class="text-sm font-medium text-gray-900 truncate"> {{ history.order.user.name }}</p>
                <p class="text-sm text-gray-500 truncate"> {{ history.order.user.email }}</p>
            </a>
        </div>



        <div class="flex flex-col items-end">
            <time :datetime="history.diff_time" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">
                Started: {{
                        history.diff_time
                }}
            </time>
            <button v-on:click.stop="reverteOrder()" type="button"
                class="w-full block my-2 justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-400 text-base font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                tabindex="0">Revert</button>
        </div>
    </div>


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
                                            Order Information </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-md text-gray-500">
                                                Buyer address: {{ history.order.user.address.address }}
                                            </p>
                                            <p class="text-md text-gray-500">
                                                Buyer city: {{ history.order.user.address.city }}
                                            </p>
                                            <p class="text-md text-gray-500">
                                                Buyer full name: {{ history.order.user.address.full_name }}
                                            </p>
                                            <p class="text-md text-gray-500">
                                                Buyer phone: {{ history.order.user.address.phone }}
                                            </p>
                                            <p class="text-md text-gray-500">
                                                Buyer ZIP: {{ history.order.user.address.zip }}
                                            </p>
                                        </div>
                                        <ul role="list" class="divide-y divide-gray-200">
                                            <li v-for="(product, index) in history.order.products" :key="index"
                                                class="py-4 flex">
                                                <img class="w-20 h-20" :src="product.media[0].original_url" alt="" />
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">{{ product.name }}</p>
                                                    <p class="text-sm text-gray-500">€{{ product.price }}</p>
                                                    <p class="text-sm text-gray-500">Quantity bought: {{
                                                            product.pivot.quantity
                                                    }}</p>
                                                </div>
                                            </li>
                                        </ul>
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
    name: 'DiplomaActiveDeliveryItem',

    props: {
        history: {
            type: Object,
            default: () => ({})
        }
    },

    data() {
        return {
            openInfoModal: false,
        };
    },

    updated() {
        if (this.openInfoModal) {
            this.$refs.cancelButtonRef.focus();
        }
    },

    mounted() {

    },

    methods: {
        reverteOrder() {

        }
    },
};
</script>

<style scoped>
</style>
