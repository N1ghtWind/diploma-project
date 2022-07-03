<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
</script>

<template>
    <div style="width: calc(100% - 80px)" class="flex min-h-screen w-full bg-white font-sans  focus-visible:outline-none">
        <div class="sidebar" :class="{ open: toggleActive }" ref="sidebar">
            <div class="logo-details">
                <i class="fa-brands fa-css3-alt icon"></i>

                <div class="logo_name">Diploma</div>
                <i class="bx bx-menu" @click="toggleSideBar" id="btn"></i>
            </div>
            <ul class="nav-list">
                <li>
                    <Link class="focus-visible:outline-none" :href="$route('dashboard.index')">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                    </Link>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <Link  class="focus-visible:outline-none" :href="$route('admin.products.index')">
                    <i class="bx bxs-package"></i>
                    <span class="links_name">Products</span>
                    </Link>
                    <span class="tooltip">Products</span>
                </li>
                <li>
                    <Link  class="focus-visible:outline-none" :href="$route('user.index')">
                    <i class="bx bx-user"></i>
                    <span class="links_name">User</span>
                    </Link>
                    <span class="tooltip">User</span>
                </li>
                <!-- <li>
          <a href="#">
            <i class="bx bx-chat"></i>
            <span class="links_name">Messages</span>
          </a>
          <span class="tooltip">Messages</span>
        </li> -->
                <li>
                    <Link  class="focus-visible:outline-none" :href="$route('order.index')">
                    <i class="bx bx-cart-alt"></i>
                    <span class="links_name">Order</span>
                    </Link>
                    <span class="tooltip">Order</span>
                </li>
                <li>
                    <Link  class="focus-visible:outline-none" :href="$route('admin.messages.index')">
                    <i class="bx bx-message"></i>
                    <span class="links_name">Message</span>
                    </Link>
                    <span class="tooltip">Message</span>
                </li>

                <li>
                    <Link  class="focus-visible:outline-none" method="post" :href="$route('admin.logout')">
                    <i class="bx bx-exit"></i>
                    <span class="links_name">Logout</span>
                    </Link>
                    <span class="tooltip">Logout</span>
                </li>
            </ul>
        </div>
        <main style="width: -webkit-fill-available"
            class="flex min-h-screen flex-1 flex-col rounded-l-[48px] bg-white p-8">
            <nav class="flex items-center gap-x-6">
                <div class="flex w-3/5 items-center justify-between">
                    <h1 class="text-[30px] font-bold text-gray-700">{{ sitename }}</h1>
                </div>
                <div class="flex w-2/5 items-center justify-end">
                    <div class="flex items-center gap-x-2.5 px-4">
                        <Menu v-slot="{ open }" as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton @click="open = !open"
                                    class="bg-gray-100 rounded-full focus-visible:outline-none flex items-center text-gray-400 hover:text-gray-600">
                                    <span class="sr-only">Open options</span>
                                    <button
                                        class="relative flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:text-indigo-500">
                                        <svg class="h-7 w-7 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M17.25 12V10C17.25 7.1005 14.8995 4.75 12 4.75C9.10051 4.75 6.75 7.10051 6.75 10V12L4.75 16.25H19.25L17.25 12Z">
                                            </path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M9 16.75C9 16.75 9 19.25 12 19.25C15 19.25 15 16.75 15 16.75">
                                            </path>
                                        </svg>
                                        <div v-show="this.$page.props.notifications.admin.count > 0" class="absolute bottom-6 right-1 flex h-5 w-5">
                                            <span
                                                class="absolute border-0 outline-none inline-flex h-full w-full animate-ping rounded-full bg-indigo-400 opacity-75" />
                                            <span style="font-size: 14px"
                                                class="h-5 w-5 block text-white rounded-full bg-indigo-400">{{ $page.props.notifications.admin.count }}</span>
                                        </div>
                                    </button>
                                </MenuButton>
                            </div>
                            <div v-show="open">
                            <transition enter-active-class="transition ease-out duration-100"
                                enter-from-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-from-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95">
                                <MenuItems static
                                    class="origin-top-right absolute right-0 mt-2 w-max rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div v-show="this.$page.props.notifications.admin.count > 0" class="py-1">
                                        <MenuItem v-for="(notification,index) in this.$page.props.notifications.admin.data" :key="index" v-slot="{ active }">
                                        <a href="#"
                                            :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']"
                                            class="flex items-center px-4 py-3 border-b hover:bg-gray-100">
                                            <p class="text-gray-600 text-sm mx-2 flex gap-8 justify-between">
                                                <span class="font-bold" href="#">{{ notification.data.user.name }} <span class="font-normal"> made an order.</span></span>
                                                <span class="text-gray-400">{{ notification.diff_time }}</span>
                                            </p>
                                        </a>
                                        </MenuItem>
                                        <a @click="markNotificationAsRead()"
                                            class="block cursor-pointer rounded-md bg-indigo-500 text-white text-center font-bold py-2">Mark
                                            all as read</a>
                                    </div>
                                </MenuItems>
                            </transition>
                            </div>
                        </Menu>
                    </div>
                    <button
                        class="flex h-11 items-center justify-center rounded-full bg-gray-100 px-2 text-gray-400 hover:text-indigo-500">
                        <img :src="$page.props.auth.user.media.url" alt="" class="h-8 w-8 rounded-full object-cover" />
                        <span class="pl-2 text-sm">{{ $page.props.auth.user.name }}</span>
                    </button>
                </div>
            </nav>
            <div class="gap-x-6 py-8">
                <slot />
            </div>
        </main>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
    props: {
        sitename: {
            type: String,
            default: "",
        },
    },
    data() {
        return {
            toggleActive: false,
        };
    },

    methods: {
        toggleSideBar() {
            this.toggleActive = !this.toggleActive;
        },
        markNotificationAsRead() {
            Inertia.post(route('admin.notifications.read'), {

            });
        },
    },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700");

* {
    font-family: "Montserrat", sans-serif;
}

/* Google Font Link */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;

}
*:focus-visible {
    outline: none;
}

.sidebar {
    position: relative;
    left: 0;
    top: 0;
    width: 78px;
    background: #11101d;
    padding: 6px 14px;
    z-index: 99;
    transition: all 0.5s ease;
}

.sidebar.open {
    width: 250px;
}

.sidebar .logo-details {
    height: 60px;
    display: flex;
    align-items: center;
    position: relative;
}

.sidebar .logo-details .icon {
    opacity: 0;
    transition: all 0.5s ease;
}

.sidebar .logo-details .logo_name {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    opacity: 0;
    transition: all 0.5s ease;
}

.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name {
    opacity: 1;
}

.sidebar .logo-details #btn {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    font-size: 22px;
    transition: all 0.4s ease;
    font-size: 23px;
    text-align: center;
    cursor: pointer;
    transition: all 0.5s ease;
}

.sidebar.open .logo-details #btn {
    text-align: right;
}

.sidebar i {
    color: #fff;
    height: 60px;
    min-width: 50px;
    font-size: 28px;
    text-align: center;
    line-height: 60px;
}

.sidebar .nav-list {
    margin-top: 20px;
}

.sidebar li {
    position: relative;
    margin: 8px 0;
    list-style: none;
}

.sidebar li .tooltip {
    position: absolute;
    top: -20px;
    left: calc(100% + 15px);
    z-index: 3;
    background: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 400;
    opacity: 0;
    white-space: nowrap;
    pointer-events: none;
    transition: 0s;
}

.sidebar li:hover .tooltip {
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
    top: 50%;
    transform: translateY(-50%);
}

.sidebar.open li .tooltip {
    display: none;
}

.sidebar input {
    font-size: 15px;
    color: #fff;
    font-weight: 400;
    outline: none;
    height: 50px;
    width: 100%;
    width: 50px;
    border: none;
    border-radius: 12px;
    transition: all 0.5s ease;
    background: #1d1b31;
}

.sidebar.open input {
    padding: 0 20px 0 50px;
    width: 100%;
}

.sidebar .bx-search {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 22px;
    background: #1d1b31;
    color: #fff;
}

.sidebar.open .bx-search:hover {
    background: #1d1b31;
    color: #fff;
}

.sidebar .bx-search:hover {
    background: #fff;
    color: #11101d;
}

.sidebar li a {
    display: flex;
    height: 100%;
    width: 100%;
    border-radius: 12px;
    align-items: center;
    text-decoration: none;
    transition: all 0.4s ease;
    background: #11101d;
}

.sidebar li a:hover {
    background: #fff;
}

.sidebar li a .links_name {
    color: #fff;
    font-size: 15px;
    font-weight: 400;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: 0.4s;
}

.sidebar.open li a .links_name {
    opacity: 1;
    pointer-events: auto;
}

.sidebar li a:hover .links_name,
.sidebar li a:hover i {
    transition: all 0.5s ease;
    color: #11101d;
}

.sidebar li i {
    height: 50px;
    line-height: 50px;
    border-radius: 12px;
}

.sidebar li.profile {
    position: fixed;
    height: 60px;
    width: 78px;
    left: 0;
    bottom: -8px;
    padding: 10px 14px;
    background: #1d1b31;
    transition: all 0.5s ease;
    overflow: hidden;
}

.sidebar.open li.profile {
    width: 250px;
}

.sidebar li .profile-details {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
}

.sidebar li img {
    height: 45px;
    width: 45px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 10px;
}

.sidebar li.profile .name,
.sidebar li.profile .job {
    font-size: 15px;
    font-weight: 400;
    color: #fff;
    white-space: nowrap;
}

.sidebar li.profile .job {
    font-size: 12px;
}

.sidebar .profile #log_out {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    background: #1d1b31;
    width: 100%;
    height: 60px;
    line-height: 60px;
    border-radius: 0px;
    transition: all 0.5s ease;
}

.sidebar.open .profile #log_out {
    width: 50px;
    background: none;
}

.home-section {
    position: relative;
    background: #e4e9f7;
    min-height: 100vh;
    top: 0;
    left: 78px;
    width: calc(100% - 78px);
    transition: all 0.5s ease;
    z-index: 2;
}

.sidebar.open~.home-section {
    left: 250px;
    width: calc(100% - 250px);
}

.home-section .text {
    display: inline-block;
    color: #11101d;
    font-size: 25px;
    font-weight: 500;
    margin: 18px;
}

@media (max-width: 420px) {
    .sidebar li .tooltip {
        display: none;
    }
}
</style>
