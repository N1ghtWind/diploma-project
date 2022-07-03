<script setup>
import ActiveDeliveryItem from './components/ActiveDeliveryItem.vue';
</script>

<template>
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <main>
                <div class="pl-10 pr-10 sm:pl-6 sm:pr-6 pt-8 pb-8 max-w-screen-2xl w-full ml-auto mr-auto">
                    <div class="sm:mb-0 mb-1">
                        <h1 style="letter-spacing: -0.01em;" class="md:text-3xl letter font-bold text-slate-800">
                            Active deliveries</h1>
                    </div>
                </div>
                <ul v-if="Object.keys(active_deliveries).length" role="list" class="divide-y divide-gray-200">
                    <li v-for="delivery in active_deliveries" :key="delivery.id"
                        class="relative border border-gray-200 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <ActiveDeliveryItem :delivery="delivery"/>
                    </li>
                </ul>
                <div v-else class="text-center text-gray-500">
                    <p class="text-sm">No active deliveries</p>
                </div>

            </main>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
    props: {
        active_deliveries: {
            type: Object,
            default: () => ({})
        }
    },

    updated() {
        if (this.$page.props.flash.success !== null) {
            this.$toast.open({
                message: this.$page.props.flash.success,
                type: 'success',
                position: 'top-right',

            });
        }
    },

    data() {
        return {

        };
    },

    mounted() {
    },

    methods: {
    },
};
</script>

<style scoped>
</style>
