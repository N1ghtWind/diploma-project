
<script setup>
import Pagination from "../components/Pagination.vue";
import { ref } from 'vue'
import ProductItem from "./components/ProductItem.vue";
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
</script>

<template>
    <Layout sitename="Messages">
        <div v-for="(message,index) in messages.data" :key="index"
            class="flex my-2 m-auto py-2 flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 border-gray-400">
            <div class="flex flex-col justify-between p-4 leading-normal w-full">
                <div class="flex justify-between text-gray-400">
                    <h2 class="mb-2 text-md font-bold tracking-tight text-gray-900 ">{{ message.name }}</h2>
                        <p>{{ message.diff_time }}</p>
                </div>
                <h2 class="mb-2 text-md font-bold tracking-tight text-gray-900 ">{{ message.email }}</h2>
                    <p class="mb-3 font-normal text-gray-700 ">
                        {{ message.message }}
                    </p>
            </div>
        </div>
        <Pagination :links="messages.links" class="mt-6 flex justify-center"></Pagination>
    </Layout>
</template>
<script>
import Layout from "../Layout.vue";
export default {
    props: {
        messages: {
            type: Object,
            required: true
        },

    },
    components: {
        Layout,
    },
    data() {
        return {
        };
    },
    methods: {
        toggleSideBar() {
            this.toggleActive = !this.toggleActive;
        },
    },
};
</script>
