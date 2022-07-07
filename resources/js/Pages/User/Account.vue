<template>
    <div class="py-12">
        <main class="relative">
            <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">

                <div v-if="$page.props.errors">
                    <div v-for="(error, index) in $page.props.errors" :key="index" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ error }}</span>
                    </div>
                </div>
                <div v-if="$page.props.flash.success" class="p-4 m-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <span class="font-medium">{{ $page.props.flash.success }}</span>
                </div>
                <div class="bg-white rounded-lg overflow-hidden">
                    <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                        <aside class="lg:col-span-2">
                            <nav class="space-y-1">
                                <!-- Current: "bg-indigo-50 border-teal-500 text-indigo-700 hover:bg-indigo-50 hover:text-teal-700", Default: "border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
                                <Link :href="$route('user.settings.index')"
                                    :class="[$route().current('user.settings.index') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']"
                                    class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                    aria-current="page">
                                <!--
                                Heroicon name: outline/user-circle

                                Current: "text-indigo-500 group-hover:text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500"
                                -->
                                <svg :class="[$route().current('user.settings.index') ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500']"
                                    class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span class="truncate"> Profile </span>
                                </Link>
                                <!-- :href="$route('carrier.settings.account')" -->
                                <Link :href="$route('user.settings.account')"
                                    :class="[$route().current('user.settings.account') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']"
                                    class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                                <!-- Heroicon name: outline/cog -->
                                <svg :class="[$route().current('user.settings.account') ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500']"
                                    class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="truncate"> Account </span>
                                </Link>
                            </nav>
                        </aside>
                        <div class="divide-y divide-gray-200 lg:col-span-10">
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                <div>
                                    <h2 class="text-lg leading-6 font-medium text-gray-900">Account</h2>
                                    <p class="mt-1 text-sm text-gray-500">You can change your account information here
                                    </p>
                                </div>
                                <div class="mt-6 grid grid-cols-4 gap-6">
                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700">
                                            Email address
                                        </label>
                                        <input type="email" name="email" id="email" v-model="data_user.email"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                    </div>

                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            Password
                                        </label>
                                        <input v-model="data_user.password" type="password" name="password" id="password"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="location"
                                            class="block text-sm font-medium text-gray-700">Location</label>
                                        <select v-model="data_user.location" id="location" name="location"
                                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                            <option value="">Select your location</option>

                                            <option v-for="(city, index) in cities"  :value="city" :key="index">
                                                {{ city }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-span-4 sm:col-span-2">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                            <div class="mt-1">
                                                <input type="tel" v-model="data_user.phone" name="phone" id="phone" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        <p class="mt-2 text-sm text-gray-500" id="phone-description">We'll only use for verification</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-6 divide-y divide-gray-200">
                                <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                                    <button @click="updateAccount()"
                                        class="ml-5 bg-indigo-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
    props: {
        cities: {
            type: Array,
            required: true
        },
        user_location: {
            type: String,
            required: true
        },
        user_phone: {
            type: String,
            required: true
        },
        user_email: {
            type: String,
            required: true
        },
    },

    data() {
        return {
            data_user: {
                email: this.user_email,
                phone: this.user_phone,
                location: this.user_location,
                password: '',
            }
         };
    },



    mounted() {
    },

    methods: {
        updateAccount() {
            Inertia.post(route('user.settings.update_profile'), {
                email: this.data_user.email,
                phone: this.data_user.phone,
                location: this.data_user.location,
                password: this.data_user.password
            });
        }
    },
};
</script>

<style scoped>
</style>
