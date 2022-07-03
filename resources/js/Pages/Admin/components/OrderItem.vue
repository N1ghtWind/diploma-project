<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { Inertia } from '@inertiajs/inertia';
import Pagination from "../../components/Pagination.vue"
</script>

<template>
    <td class="v_ wk xe vm co ut">
        <div class="flex items-center">
            <label class="inline-flex">
                <span class="tc">Select</span>
                <input class="table-item to" v-model="order.selected" type="checkbox" />
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

            <div class="gk text-slate-800">{{ order.intent_id }}</div>
        </div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center">€{{ order.paid_amount }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center">{{ order.delivery_status }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="gp">€{{ order.receipt_url }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center gk yj">{{ order.created_at }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="text-center gk yg">{{ order.updated_at }}</div>
    </td>
    <td class="v_ wk xe vm co">
        <div class="gp">
            <span style="text-transform: capitalize;" :class="[getStatusClass(order.delivery_status)]" class="
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
                {{ order.delivery_status }}
            </span>
        </div>
    </td>
    <td class="v_ wk xe vm co ut">
        <button v-if="checkIfOrderDeliveryStatusIsPending(order)" @click="openAssignationMenu = !openAssignationMenu"
            class="yu xm rounded-full border border-indigo-500 bg-indigo-500 mx-2">
            <i class="fa-solid fa-truck uu of db flex text-gray-100 justify-center items-center"></i>
        </button>
        <button @click="openInfoModal = !openInfoModal"
            class="yu xm rounded-full border  mx-4 border-green-600 bg-green-600">
            <i class="fa-solid fa-info uu of db flex justify-center text-gray-100 items-center"></i>
        </button>
    </td>

    <TransitionRoot v-if="checkIfOrderDeliveryStatusIsPending(order)" as="template" :show="openAssignationMenu">
        <Dialog as="div" class="relative z-10" @close="openAssignationMenu = false">
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
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-3xl sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <i class="fa fa-warning text-red-600 text-2xl"></i>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                            Assign order to a carrier! </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to assign this order
                                                to one of the carrier?</p>
                                            <p class="text-sm text-gray-500">INTENT ID:{{ order.intent_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                <ul role="list" class="divide-y divide-gray-200">

                                    <li v-for="(carrier, index) in carriers.data" :key="index">
                                        <div class="block hover:bg-gray-50">
                                            <div class="flex items-center px-4 py-4 sm:px-6">
                                                <div class="min-w-0 flex-1 flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-12 w-12 rounded-full"
                                                            :src="carrier.media[0].original_url" alt="" />
                                                    </div>
                                                    <div
                                                        class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4 items-center">
                                                        <div>
                                                            <p class="text-sm font-medium text-indigo-600 truncate">{{
                                                                    carrier.user.name
                                                            }}</p>
                                                            <p class="mt-2 flex items-center text-sm text-gray-500">

                                                                <span class="truncate">{{ carrier.user.email }}</span>
                                                            </p>
                                                        </div>
                                                        <div class=" md:block text-right">
                                                            <div>
                                                                <button type="button"
                                                                    @click="assignToCarrier(carrier, order)"
                                                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-green-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-green-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Assign</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <Pagination :styleClass="'justify-center m-4'" :links="carriers.links" class="mt-6">
                                </Pagination>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="openAssignationMenu = false" ref="cancelButtonRef">Cancel</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>

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
                                            <p class="text-sm text-gray-500">
                                                Buyer name: {{ order.user.name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Buyer email: {{ order.user.email }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Buyer registration date: {{ order.user.created_at }}
                                            </p>
                                        </div>
                                        <ul role="list" class="divide-y divide-gray-200">
                                            <li v-for="(product, index) in order.products_with_trashed" :key="index"
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
    name: 'DiplomaOrderItem',

    props: {
        order: {
            type: Object,
            required: true
        },
        carriers: {
            type: Object,
            required: true
        },
    },

    data() {
        return {
            openAssignationMenu: false,
            openInfoModal: false,
        };
    },

    mounted() {
        this.openAssignationMenu = false;
        this.openInfoModal = false;
    },

    methods: {
        getStatusClass(status) {
            if (status === 'assigned') {
                return 'bg-yellow-400';
            } else if (status === 'pending') {
                return 'bg-orange-500';
            }
            else if (status === 'completed') {
                return 'bg-green-500';
            }
        },
        assignToCarrier(carrier, order) {
            this.openAssignationMenu = false;
            this.openInfoModal = false;
            Inertia.post(route('admin.order.assign'), {
                carrier_id: carrier.id,
                order_id: order.id,
            });
        },
        checkIfOrderDeliveryStatusIsPending(order) {
            if (order.delivery_status === 'pending') {
                return true;
            } else {
                return false;
            }
        },

    },
};
</script>

<style scoped>
</style>
