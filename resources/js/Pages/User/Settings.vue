<template>
    <div class="py-12">
    <main class="relative">
        <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
             <div v-if="$page.props.flash.error">
                <div v-for="(error, index) in $page.props.flash.error" :key="index" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">{{ error }}</span>
                </div>
            </div>
             <div v-if="$page.props.flash.success" class="p-4 m-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium"> {{ $page.props.flash.success }}</span>
            </div>
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                    <aside class="lg:col-span-2">
                        <nav class="space-y-1">
                            <Link :href="$route('user.settings.index')" :class="[$route().current('user.settings.index') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']" class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                                <svg :class="[$route().current('user.settings.index') ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500']" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="truncate"> Profile </span>
                            </Link>
                            <!-- :href="$route('carrier.settings.account')" -->
                             <Link :href="$route('user.settings.account')" :class="[$route().current('user.settings.account') ? 'bg-indigo-50 border-indigo-500 text-indigo-700 hover:bg-indigo-50 hover:text-indigo-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900']" class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium">
                                <!-- Heroicon name: outline/cog -->
                                <svg :class="[$route().current('user.settings.account') ? 'text-indigo-500 group-hover:text-indigo-500' : 'text-gray-400 group-hover:text-gray-500']" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="truncate"> Account </span>
                            </Link>
                        </nav>
                    </aside>

                    <div class="divide-y divide-gray-200 lg:col-span-10">
                        <!-- Profile section -->
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                            <div>
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                                <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly</p>
                            </div>

                            <div class="mt-6 flex flex-col lg:flex-row gap-32">

                                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                                    <p class="text-sm font-medium text-gray-700 text-center mb-3" aria-hidden="true">Profile picture</p>
                                    <div class="mt-1 lg:hidden">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                                <img class="rounded-full h-full w-full" :src="userImage ?? default_image" alt="">
                                            </div>
                                            <div class="ml-5 rounded-md shadow-sm">
                                                <div class="group relative rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                                        <span>Change</span>
                                                        <span class="sr-only"> user photo</span>
                                                    </label>
                                                    <input @change="onFileChange" @input="avatar = $event.target.files[0]" id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden relative overflow-hidden lg:block">
                                        <img class="relative w-40 h-40" :src="userImage ?? default_image" alt="">
                                        <label @mouseover="hoverImage(true)" @mouseleave="hoverImage(false)" :class="image_hover ? 'opacity-100' : 'opacity-0'" for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white">
                                            <span>Change</span>
                                            <span class="sr-only"> user photo</span>
                                            <input @change="onFileChange" @input="avatar = $event.target.files[0]" type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Privacy section -->
                        <div class="pt-6 divide-y divide-gray-200">
                            <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                                <button @click="saveData()" class="ml-5 bg-indigo-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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
        user_profile_picture : {
            type: String,
            default: null,
        },
        is_carrier: {
            type: Boolean,
            required: true,
        },
        default_image: {
            type: String,
            required: true,
        },

    },

    data() {
        return {
            image_hover: false,
            show_alert: true,
            user_data: {
                user_bio: this.user_bio,
                user_contact: this.user_contact,
            },
            userImage: this.user_profile_picture,
            avatar: null,
        };
    },

    mounted() {

    },

    methods: {
        hoverImage(parameter) {
            this.image_hover = parameter;
        },
        saveData() {
            Inertia.post(route('user.settings.update_profile'), {
                _method: 'put',
                image: this.avatar,
            },
            {
            forceFormData: true,
            }
            );
            this.avatar = null;
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files
            if (!files.length) {
            return
            }

            this.createImage(files[0])
        },
        createImage(file) {
            if (file.type.match(['image.*'])) {
                var reader = new FileReader()
                var vm = this
                reader.onload = (e) => {
                vm.userImage = e.target.result
                }
                reader.readAsDataURL(file)
            }
            else {
                return
            }
        },

    },
};
</script>

<style scoped>

</style>
