<template>
    <div class="py-12">

        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <div v-if="$page.props.flash.error">
                <div v-for="(error, index) in $page.props.flash.error" :key="index"
                    class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">{{ error }}</span>
                </div>
            </div>
            <div v-if="$page.props.errors">
                <div v-for="(error, index) in $page.props.errors" :key="index"
                    class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">{{ error }}</span>
                </div>
            </div>
            <main>
                <div class="bg-white py-2 px-2 overflow-hidden sm:px-6 lg:px-4 lg:py-4">
                    <div class="relative max-w-xl mx-auto">
                        <div class="text-center">
                            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Contact sales
                            </h2>
                            <p class="mt-4 text-lg leading-6 text-gray-500">Please send us message, if you have any
                                problem</p>
                        </div>
                        <div class="mt-12">
                            <form @submit.prevent class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">

                                <div class="sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <div class="mt-1">
                                        <input v-model="email" id="email" name="email" type="email" autocomplete="email"
                                            class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" />
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <div class="mt-1">
                                        <input v-model="name" id="name" name="name" type="text" autocomplete="name"
                                            class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <div class="mt-1">
                                        <textarea v-model="message" id="message" name="message" rows="4"
                                            class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md" />
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button @click="sendMessage"
                                        class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send
                                        us message!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>


<script>
import { Inertia } from "@inertiajs/inertia";
export default {

    data() {
        return {
            email: '',
            message: '',
            name: '',
        };
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

    mounted() {
    },

    methods: {
        sendMessage() {
            Inertia.post(route('contact-us.store'), {
                email: this.email,
                name: this.name,
                message: this.message
            });
        },

    },
}
</script>
