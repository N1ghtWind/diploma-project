<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
</script>
<template>
    <td class="v_ wk xe vm co ut">
        <div class="flex items-center">
            <label class="inline-flex">
                <span class="tc">Select</span>
                <input class="table-item to" v-model="product.selected" type="checkbox" />
            </label>
        </div>
    </td>
    <td class="v_ wk xe vm co ut">
        <div class="flex items-center td">
            <button>
                <svg class="ue on ap db ym" viewBox="0 0 16 16">
                    <path d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z"></path>
                </svg>
            </button>
        </div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="flex items-center">
            <div class="h-20 w-20 ap mr-2 _f">
                <img class="" :src="product.media[0].original_url" alt="User 01" />
            </div>
            <div class="gk text-slate-800">{{ product.name }}</div>
        </div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center">{{ product.description }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center">{{ product.quantity_unit }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="gp">€{{ product.price }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center gk yj">{{ product.created_at }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center gk yg">{{ product.updated_at }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="gp">
            <span style="text-transform: capitalize;" :class="[getStatusClass(product.status)]" class="
                        px-4
                        py-2
                        rounded-full
                        text-gray-200
                        font-semibold
                        text-sm
                        block
                        m-auto
                        text-center
                        align-center
                        w-max
                        transition
                        duration-300
                        ease
                      ">
                {{ product.status }}
            </span>
        </div>
    </td>
    <td class="v_ wk xe vm co ut">
        <button v-if="!product.deleted_at" @click="open = !open" class="yu xm rounded-full border border-yellow-300 bg-yellow-300 mx-2">
            <i class="fa-solid fa-power-off uu of db flex text-gray-100 justify-center items-center"></i>
        </button>
        <button @click="openUnBanModal = !openUnBanModal"
            class="yu xm rounded-full border  mx-4 border-green-600 bg-green-600">
            <i class="fa-solid fa-unlock uu of db flex justify-center text-gray-100 items-center"></i>
        </button>
    </td>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
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
                        <DialogPanel v-if="product.status === 'inactive'"
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <i class="fa fa-warning text-red-600 text-2xl"></i>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                            Activate product </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to activate this
                                                product</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="activateProduct">Activate</button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="open = false" ref="cancelButtonRef">Cancel</button>
                            </div>
                        </DialogPanel>
                        <DialogPanel v-else
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <i class="fa fa-warning text-red-600 text-2xl"></i>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                            Deactivate product </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to deactivate this
                                                product</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-amber-600 text-base font-medium text-white hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="deActivateProduct">Deactivate</button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="open = false" ref="cancelButtonRef">Cancel</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>


    <TransitionRoot as="template" :show="openUnBanModal">
        <Dialog as="div" class="relative z-10" @close="openUnBanModal = false">
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
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <i class="fa fa-warning text-red-600 text-2xl"></i>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Unban
                                            Product? </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to unban this product?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <label for="comment" class="block text-sm font-medium mt-2 text-gray-700">Enter the
                                    reason for the uban:</label>
                                <div class="mt-1">
                                    <textarea v-model="data_reason" rows="4" name="comment" id="comment"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div> -->
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="UnbanProduct">Unban</button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="openUnBanModal = false" ref="cancelButtonRef">Cancel</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    name: 'DiplomaProductItem',
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            data_reason: '',
            open: false,
            openUnBanModal: false,
        };
    },

    mounted() {
    },


    methods: {
        getStatusClass(status) {
            if (status === 'active') {
                return 'bg-green-500';
            } else if (status === 'inactive') {
                return 'bg-orange-500';
            } else if (status === 'banned') {
                return 'bg-red-500';
            }
        },
        activateProduct() {
            this.open = false;
            Inertia.post(route('admin.products.activate', { id: this.product.id }));
        },
        deActivateProduct() {
            this.open = false;
            Inertia.post(route('admin.products.deactivate', { id: this.product.id }));
        },
        UnbanProduct() {
            this.openUnBanModal = false;
            Inertia.post(route('admin.products.unban', {
                id: this.product.id,
            }));

        },
    },
};
</script>

<style scoped>
</style>
