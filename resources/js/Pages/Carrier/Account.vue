<template>
<div class="py-12">
    <main class="relative">
        <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                    <aside class="lg:col-span-2">
                        <nav class="space-y-1">
                            <!-- Current: "bg-indigo-50 border-teal-500 text-indigo-700 hover:bg-indigo-50 hover:text-teal-700", Default: "border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
                            <Link :href="$route('carrier.settings.index')" :class="[$route().current('carrier.settings.index') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']" class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                                                <!--
                                Heroicon name: outline/user-circle

                                Current: "text-indigo-500 group-hover:text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500"
                                -->
                                <svg :class="[$route().current('carrier.settings.index') ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500']" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="truncate"> Profile </span>
                            </Link>
                            <!-- :href="$route('carrier.settings.account')" -->
                             <Link :href="$route('carrier.settings.account')" :class="[$route().current('carrier.settings.account') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']" class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                                <!-- Heroicon name: outline/cog -->
                                <svg :class="[$route().current('carrier.settings.account') ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500']" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="truncate"> Account </span>
                            </Link>
                        </nav>
                    </aside>
                    <div class="divide-y divide-gray-200 lg:col-span-10">
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                            <div>
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Account</h2>
                                <p class="mt-1 text-sm text-gray-500">You can change your account information here</p>
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

    },
    mounted() {
    },

    methods: {
    },
};
</script>

<style scoped>

</style>
