<template>
    <div class="py-12">
    <div v-show="true" class="rounded-md flex items-center max-w-screen-xl mx-auto bg-amber-400 jusitfy-between px-5 py-4 mb-4 border border-yellow-500 text-white text-lg font-medium">
        <div class="w-full flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class=" w-6 h-6 mr-2" viewBox="0 0 1792 1792">
                <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                </path>
            </svg>
            We use cookies! Something not ideal might be happening.
        </div>
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                <span class="sr-only">
                    Dismiss
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 text-white" viewBox="0 0 1792 1792">
                    <path d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    <main class="relative">
        <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                    <aside class="lg:col-span-2">
                        <nav class="space-y-1">
                            <Link :href="$route('carrier.settings.index')" :class="[$route().current('carrier.settings.index') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']" class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
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

                    <form class="divide-y divide-gray-200 lg:col-span-10" action="#" method="POST">
                        <!-- Profile section -->
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                            <div>
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                                <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly</p>
                            </div>

                            <div class="mt-6 flex flex-col lg:flex-row gap-32">
                                <div class="flex-grow">
                                    <!-- One side here -->
                                    <div>
                                        <label for="business_mail" class="block text-sm font-medium my-1 text-gray-700">Business contact email</label>
                                        <div class="relative rounded-md shadow-sm max-w-md">
                                            <input type="text" name="business_mail" id="business_mail" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 pr-2 sm:text-sm rounded-md" placeholder="Business contact email">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="bio" class="block text-sm font-medium my-1 text-gray-700">Bio</label>
                                        <div class="relative rounded-md shadow-sm max-w-md">
                                            <textarea type="text" name="bio" id="bio" class="focus:ring-indigo-500 resize-none focus:border-indigo-500 block w-full pl-2 pr-2 sm:text-sm rounded-md" placeholder="Enter your bio here..."></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                                    <p class="text-sm font-medium text-gray-700 text-center mb-3" aria-hidden="true">Photo</p>
                                    <div class="mt-1 lg:hidden">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                                <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt="">
                                            </div>
                                            <div class="ml-5 rounded-md shadow-sm">
                                                <div class="group relative rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                                        <span>Change</span>
                                                        <span class="sr-only"> user photo</span>
                                                    </label>
                                                    <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden relative overflow-hidden lg:block">
                                        <img class="relative w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt="">
                                        <label @mouseover="hoverImage(true)" @mouseleave="hoverImage(false)" :class="image_hover ? 'opacity-100' : 'opacity-0'" for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white">
                                            <span>Change</span>
                                            <span class="sr-only"> user photo</span>
                                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex align-baseline items-center gap-3">
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Average rating:</h2>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <p class="ml-2 text-sm font-medium text-yellow-400">4.95 out of 5</p>
                                </div>
                            </div>

                        </div>

                        <!-- Privacy section -->
                        <div class="pt-6 divide-y divide-gray-200">
                            <div class="px-4 sm:px-6">
                                <div>
                                    <h2 class="text-lg leading-6 font-medium text-gray-900">Privacy</h2>
                                    <p class="mt-1 text-sm text-gray-500">Change your privacy settings...</p>
                                </div>
                                <ul role="list" class="mt-2 divide-y divide-gray-200">
                                    <li class="py-4 flex items-end justify-between">
                                        <div class="flex flex-col">
                                            <p class="text-sm font-medium text-gray-900 py-2" id="privacy-option-1-label">Available to hire</p>
                                            <p class="text-sm text-gray-500" id="privacy-option-1-description">Current status:
                                                <span v-if="is_online" class="bg-teal-500 p-1 font-medium rounded-full text-white">Online</span>
                                                <span v-else class="bg-rose-500 p-1 font-medium rounded-full text-white">Offline</span>
                                            </p>
                                        </div>
                                        <!-- Enabled: "bg-indigo-500", Not Enabled: "bg-gray-200" --> <!--24px magasság 44px szélesség 36px-->
                                        <button @click="changeAvailabilityStatus" :class="[is_online ? 'bg-teal-500' : ' bg-rose-500']" type="button" class="ml-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="privacy-option-1-label" aria-describedby="privacy-option-1-description">
                                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                            <span aria-hidden="true" :class="[is_online ? 'translate-x-5' : 'translate-x-0']" class="inline-block h-5 w-5 rounded-full bg-gray-200  shadow transform ring-0 transition ease-in-out duration-200"></span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                                <button type="submit" class="ml-5 bg-indigo-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
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
        is_online: {
            type: Boolean,
            required: true,
        },
    },

    data() {
        return {
            user_online: this.is_online,
            image_hover: false,
        };
    },

    mounted() {

    },

    methods: {
        changeAvailabilityStatus() {
            this.user_online = !this.user_online;
            Inertia.post(route('carrier.settings.store'), {
                is_online: this.user_online
            });
        },
        hoverImage(parameter) {
            this.image_hover = parameter;
        },

    },
};
</script>

<style scoped>

</style>
