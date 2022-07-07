<x-app-layout>
    <script>
        localStorage.theme = 'light';
        document.documentElement.classList.remove('dark');
    </script>
    <div class="py-12">
        <div class="">
            <main class="p-16 w-full rounded-3xl shadow-md mx-auto flex container bg-white">
                <div class="w-full gap-4 grid grid-cols-1 lg:grid-cols-2">
                    <div class="space-y-8 lg:space-y-10">
                        <div class="relative max-w-md m-auto">
                            <div class="nc-NcImage border drop-shadow-md aspect-w-11 aspect-h-12 rounded-3xl overflow-hidden"
                                data-nc-id="NcImage"><img src="{{ $product->getFirstMedia()->getUrl() }}"
                                    class="object-cover w-full h-full" alt="nc-imgs"></div>
                            <div
                                class="bg-black/50  flex items-center justify-center rounded-full text-white absolute left-3 top-3  w-8 h-8 md:w-10 md:h-10">
                                <svg class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.53 20.4201H6.21C3.05 20.4201 2 18.3201 2 16.2101V7.79008C2 4.63008 3.05 3.58008 6.21 3.58008H12.53C15.69 3.58008 16.74 4.63008 16.74 7.79008V16.2101C16.74 19.3701 15.68 20.4201 12.53 20.4201Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M19.52 17.0999L16.74 15.1499V8.83989L19.52 6.88989C20.88 5.93989 22 6.51989 22 8.18989V15.8099C22 17.4799 20.88 18.0599 19.52 17.0999Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M11.5 11C12.3284 11 13 10.3284 13 9.5C13 8.67157 12.3284 8 11.5 8C10.6716 8 10 8.67157 10 9.5C10 10.3284 10.6716 11 11.5 11Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </div><button
                                class="bg-black/50 px-3.5 h-10 flex items-center justify-center rounded-full text-white absolute right-3 top-3 "><svg
                                    class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button>
                        </div>
                        <div class="w-full rounded-2xl">
                            <button
                                class="flex justify-between w-full p-4 font-medium text-left bg-neutral-100 rounded-lg hover:bg-neutral-200 focus:outline-none focus-visible:ring focus-visible:ring-neutral-500 focus-visible:ring-opacity-75"
                                id="headlessui-disclosure-button-:rf:" type="button" aria-expanded="true"
                                aria-controls="headlessui-disclosure-panel-:rg:"><span>Descriptions</span><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" class="transform rotate-180 w-5 h-5 text-neutral-500">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <p class="px-4 pt-4 pb-2 text-neutral-500 text-sm" id="headlessui-disclosure-panel-:rg:">
                                {{ $product->description }}</p>
                            <div class="mt-5 md:mt-8">
                                <button
                                    class="flex justify-between w-full p-4 font-medium text-left bg-neutral-100 rounded-lg hover:bg-neutral-200 focus:outline-none focus-visible:ring focus-visible:ring-neutral-500 focus-visible:ring-opacity-75"
                                    id="headlessui-disclosure-button-:rh:" type="button" aria-expanded="true"
                                    aria-controls="headlessui-disclosure-panel-:ri:"><span>Details</span><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" class="transform rotate-180 w-5 h-5 text-neutral-500">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10 lg:pt-0 xl:pl-10 border-t-2 border-neutral-200 lg:border-t-0">
                        <div class="">
                            <div class="pb-9 space-y-5">
                                <div class="flex justify-between items-center">
                                    <span class="relative">
                                    </span>
                                    <div class="flow-root">
                                        <div class="flex text-neutral-700 text-sm -mx-3 -my-1.5">
                                            <div class="relative inline-block text-left"><button
                                                    class="py-1.5 px-3 flex rounded-lg hover:bg-neutral-300 cursor-pointer "
                                                    title="More" id="headlessui-menu-button-:rj:" type="button"
                                                    aria-haspopup="true" aria-expanded="false"><svg
                                                        class="w-4 h-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.44 8.8999C20.04 9.2099 21.51 11.0599 21.51 15.1099V15.2399C21.51 19.7099 19.72 21.4999 15.25 21.4999H8.73998C4.26998 21.4999 2.47998 19.7099 2.47998 15.2399V15.1099C2.47998 11.0899 3.92998 9.2399 7.46998 8.9099"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 15.0001V3.62012" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M15.35 5.85L12 2.5L8.65002 5.85" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg></button></div>
                                            <div class="">
                                                <div class="relative inline-block text-left"><button
                                                        class=" py-1.5 px-3 flex rounded-lg hover:bg-neutral-100 cursor-pointer "
                                                        title="More" id="headlessui-menu-button-:rk:"
                                                        type="button" aria-haspopup="true"
                                                        aria-expanded="false"><svg class="w-4 h-4 sm:h-5 sm:w-5"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                            <path
                                                                d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                            <path
                                                                d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                        </svg></button></div>
                                                <div class="nc-NcModal"></div>
                                                <div class="nc-NcModal"></div>
                                                <div class="nc-NcModal"></div>
                                                <div class="nc-NcModal"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h2 class="text-2xl border-0 sm:text-3xl lg:text-4xl font-semibold">
                                    {{ $product->name }}</h2>
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-8 text-sm">
                                    <div class="flex items-center ">
                                        <div
                                            class="wil-avatar relative flex-shrink-0 inline-flex items-center justify-center text-neutral-100 uppercase font-semibold shadow-inner h-9 w-9 ring-1 ring-white">
                                            <img class="absolute inset-0 w-full h-full object-cover"

                                                src="{{ $product?->user?->userable?->getMedia()?->first()?->getUrl() }}"
                                                alt="">
                                            <span class="wil-avatar__name">J</span>
                                        </div>
                                        <span class="ml-2.5 text-neutral-500 flex flex-col"><span
                                                class="text-sm">Company</span><span
                                                class="text-neutral-900 font-medium flex items-center"><span>{{ $product->user->userable->name }}</span><span
                                                    class="ml-1"><svg class="w-4 h-4" viewBox="0 0 17 17"
                                                        fill="none">
                                                        <path
                                                            d="M7.66691 2.62178C8.12691 2.22845 8.88025 2.22845 9.34691 2.62178L10.4002 3.52845C10.6002 3.70178 10.9736 3.84178 11.2402 3.84178H12.3736C13.0802 3.84178 13.6602 4.42178 13.6602 5.12845V6.26178C13.6602 6.52178 13.8002 6.90178 13.9736 7.10178L14.8802 8.15512C15.2736 8.61512 15.2736 9.36845 14.8802 9.83512L13.9736 10.8884C13.8002 11.0884 13.6602 11.4618 13.6602 11.7284V12.8618C13.6602 13.5684 13.0802 14.1484 12.3736 14.1484H11.2402C10.9802 14.1484 10.6002 14.2884 10.4002 14.4618L9.34691 15.3684C8.88691 15.7618 8.13358 15.7618 7.66691 15.3684L6.61358 14.4618C6.41358 14.2884 6.04025 14.1484 5.77358 14.1484H4.62025C3.91358 14.1484 3.33358 13.5684 3.33358 12.8618V11.7218C3.33358 11.4618 3.19358 11.0884 3.02691 10.8884L2.12691 9.82845C1.74025 9.36845 1.74025 8.62178 2.12691 8.16178L3.02691 7.10178C3.19358 6.90178 3.33358 6.52845 3.33358 6.26845V5.12178C3.33358 4.41512 3.91358 3.83512 4.62025 3.83512H5.77358C6.03358 3.83512 6.41358 3.69512 6.61358 3.52178L7.66691 2.62178Z"
                                                            fill="#38BDF8" stroke="#38BDF8" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M6.08691 8.98833L7.69358 10.6017L10.9136 7.375"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg></span></span></span>
                                    </div>
                                </div>
                            </div>
                            <h2 class="text-indigo-500 font-bold text-2xl border-0">Price: €{{ $product->price }}
                            </h2>
                            {{-- <div class="py-9">
                                <div class="space-y-5">
                                    <div class="text-neutral-500 dark:text-neutral-400 flex items-center space-x-2 ">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.75 13.25C20.75 18.08 16.83 22 12 22C7.17 22 3.25 18.08 3.25 13.25C3.25 8.42 7.17 4.5 12 4.5C16.83 4.5 20.75 8.42 20.75 13.25Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M12 8V13" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9 2H15" stroke="currentColor" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg><span class="leading-none mt-1">Auction ending in:</span>
                                    </div>
                                    <div class="flex space-x-5 sm:space-x-10">
                                        <div class="flex flex-col "><span
                                                class="text-2xl sm:text-2xl font-semibold">9</span><span
                                                class="sm:text-lg text-neutral-500 dark:text-neutral-400">Days</span>
                                        </div>
                                        <div class="flex flex-col "><span
                                                class="text-2xl sm:text-2xl font-semibold">9</span><span
                                                class="sm:text-lg text-neutral-500 dark:text-neutral-400">hours</span>
                                        </div>
                                        <div class="flex flex-col "><span
                                                class="text-2xl sm:text-2xl font-semibold">53</span><span
                                                class="sm:text-lg text-neutral-500 dark:text-neutral-400">minutes</span>
                                        </div>
                                        <div class="flex flex-col "><span
                                                class="text-2xl sm:text-2xl font-semibold">42</span><span
                                                class="sm:text-lg text-neutral-500">seconds</span></div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="p-0 border-0">
                                <div class="mt-8">
                                    <h3 class="text-2xl mb-1 sm:text-2xl font-semibold">Share your social network</h3>
                                    <p class="font-sans text-sm text-gray-500">For get lots of traffic from social
                                        network share this product</p>
                                    <ul class="flex mt-4">
                                        <li
                                            class="flex items-center text-center rounded-full hover:bg-emerald-500 mr-2 transition ease-in-out duration-500">
                                            <button aria-label="facebook" class="react-share__ShareButton"
                                                style="background-color: transparent; border: none; padding: 0px; font: inherit; color: inherit; cursor: pointer;"><svg
                                                    viewBox="0 0 64 64" width="32" height="32">
                                                    <circle cx="32" cy="32" r="31"
                                                        fill="#3b5998"></circle>
                                                    <path
                                                        d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z"
                                                        fill="white"></path>
                                                </svg></button>
                                        </li>
                                        <li
                                            class="flex items-center text-center border border-gray-100 rounded-full hover:bg-emerald-500 mr-2 transition ease-in-out duration-500">
                                            <button quote="KachaBazar" aria-label="twitter"
                                                class="react-share__ShareButton"
                                                style="background-color: transparent; border: none; padding: 0px; font: inherit; color: inherit; cursor: pointer;"><svg
                                                    viewBox="0 0 64 64" width="32" height="32">
                                                    <circle cx="32" cy="32" r="31"
                                                        fill="#00aced"></circle>
                                                    <path
                                                        d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z"
                                                        fill="white"></path>
                                                </svg></button>
                                        </li>
                                        <li
                                            class="flex items-center text-center border border-gray-100 rounded-full hover:bg-emerald-500 mr-2 transition ease-in-out duration-500">
                                            <button quote="KachaBazar" aria-label="reddit"
                                                class="react-share__ShareButton"
                                                style="background-color: transparent; border: none; padding: 0px; font: inherit; color: inherit; cursor: pointer;"><svg
                                                    viewBox="0 0 64 64" width="32" height="32">
                                                    <circle cx="32" cy="32" r="31"
                                                        fill="#ff4500"></circle>
                                                    <path
                                                        d="m 52.8165,31.942362 c 0,-2.4803 -2.0264,-4.4965 -4.5169,-4.4965 -1.2155,0 -2.3171,0.4862 -3.128,1.2682 -3.077,-2.0247 -7.2403,-3.3133 -11.8507,-3.4782 l 2.5211,-7.9373 6.8272,1.5997 -0.0102,0.0986 c 0,2.0281 1.6575,3.6771 3.6958,3.6771 2.0366,0 3.6924,-1.649 3.6924,-3.6771 0,-2.0281 -1.6575,-3.6788 -3.6924,-3.6788 -1.564,0 -2.8968,0.9758 -3.4357,2.3443 l -7.3593,-1.7255 c -0.3213,-0.0782 -0.6477,0.1071 -0.748,0.4233 L 32,25.212062 c -4.8246,0.0578 -9.1953,1.3566 -12.41,3.4425 -0.8058,-0.7446 -1.8751,-1.2104 -3.0583,-1.2104 -2.4905,0 -4.5152,2.0179 -4.5152,4.4982 0,1.649 0.9061,3.0787 2.2389,3.8607 -0.0884,0.4794 -0.1462,0.9639 -0.1462,1.4569 0,6.6487 8.1736,12.0581 18.2223,12.0581 10.0487,0 18.224,-5.4094 18.224,-12.0581 0,-0.4658 -0.0493,-0.9248 -0.1275,-1.377 1.4144,-0.7599 2.3885,-2.2304 2.3885,-3.9406 z m -29.2808,3.0872 c 0,-1.4756 1.207,-2.6775 2.6894,-2.6775 1.4824,0 2.6877,1.2019 2.6877,2.6775 0,1.4756 -1.2053,2.6758 -2.6877,2.6758 -1.4824,0 -2.6894,-1.2002 -2.6894,-2.6758 z m 15.4037,7.9373 c -1.3549,1.3481 -3.4816,2.0043 -6.5008,2.0043 l -0.0221,-0.0051 -0.0221,0.0051 c -3.0209,0 -5.1476,-0.6562 -6.5008,-2.0043 -0.2465,-0.2448 -0.2465,-0.6443 0,-0.8891 0.2465,-0.2465 0.6477,-0.2465 0.8942,0 1.105,1.0999 2.9393,1.6337 5.6066,1.6337 l 0.0221,0.0051 0.0221,-0.0051 c 2.6673,0 4.5016,-0.5355 5.6066,-1.6354 0.2465,-0.2465 0.6477,-0.2448 0.8942,0 0.2465,0.2465 0.2465,0.6443 0,0.8908 z m -0.3213,-5.2615 c -1.4824,0 -2.6877,-1.2002 -2.6877,-2.6758 0,-1.4756 1.2053,-2.6775 2.6877,-2.6775 1.4824,0 2.6877,1.2019 2.6877,2.6775 0,1.4756 -1.2053,2.6758 -2.6877,2.6758 z"
                                                        fill="white"></path>
                                                </svg></button>
                                        </li>
                                        <li
                                            class="flex items-center text-center border border-gray-100 rounded-full hover:bg-emerald-500 mr-2 transition ease-in-out duration-500">
                                            <button quote="KachaBazar" aria-label="whatsapp"
                                                class="react-share__ShareButton"
                                                style="background-color: transparent; border: none; padding: 0px; font: inherit; color: inherit; cursor: pointer;"><svg
                                                    viewBox="0 0 64 64" width="32" height="32">
                                                    <circle cx="32" cy="32" r="31"
                                                        fill="#25D366"></circle>
                                                    <path
                                                        d="m42.32286,33.93287c-0.5178,-0.2589 -3.04726,-1.49644 -3.52105,-1.66732c-0.4712,-0.17346 -0.81554,-0.2589 -1.15987,0.2589c-0.34175,0.51004 -1.33075,1.66474 -1.63108,2.00648c-0.30032,0.33658 -0.60064,0.36247 -1.11327,0.12945c-0.5178,-0.2589 -2.17994,-0.80259 -4.14759,-2.56312c-1.53269,-1.37217 -2.56312,-3.05503 -2.86603,-3.57283c-0.30033,-0.5178 -0.03366,-0.80259 0.22524,-1.06149c0.23301,-0.23301 0.5178,-0.59547 0.7767,-0.90616c0.25372,-0.31068 0.33657,-0.5178 0.51262,-0.85437c0.17088,-0.36246 0.08544,-0.64725 -0.04402,-0.90615c-0.12945,-0.2589 -1.15987,-2.79613 -1.58964,-3.80584c-0.41424,-1.00971 -0.84142,-0.88027 -1.15987,-0.88027c-0.29773,-0.02588 -0.64208,-0.02588 -0.98382,-0.02588c-0.34693,0 -0.90616,0.12945 -1.37736,0.62136c-0.4712,0.5178 -1.80194,1.76053 -1.80194,4.27186c0,2.51134 1.84596,4.945 2.10227,5.30747c0.2589,0.33657 3.63497,5.51458 8.80262,7.74113c1.23237,0.5178 2.1903,0.82848 2.94111,1.08738c1.23237,0.38836 2.35599,0.33657 3.24402,0.20712c0.99159,-0.15534 3.04985,-1.24272 3.47963,-2.45956c0.44013,-1.21683 0.44013,-2.22654 0.31068,-2.45955c-0.12945,-0.23301 -0.46601,-0.36247 -0.98382,-0.59548m-9.40068,12.84407l-0.02589,0c-3.05503,0 -6.08417,-0.82849 -8.72495,-2.38189l-0.62136,-0.37023l-6.47252,1.68286l1.73463,-6.29129l-0.41424,-0.64725c-1.70875,-2.71846 -2.6149,-5.85116 -2.6149,-9.07706c0,-9.39809 7.68934,-17.06155 17.15993,-17.06155c4.58253,0 8.88029,1.78642 12.11655,5.02268c3.23625,3.21036 5.02267,7.50812 5.02267,12.06476c-0.0078,9.3981 -7.69712,17.06155 -17.14699,17.06155m14.58906,-31.58846c-3.93529,-3.80584 -9.1133,-5.95471 -14.62789,-5.95471c-11.36055,0 -20.60848,9.2065 -20.61625,20.52564c0,3.61684 0.94757,7.14565 2.75211,10.26282l-2.92557,10.63564l10.93337,-2.85309c3.0136,1.63108 6.4052,2.4958 9.85634,2.49839l0.01037,0c11.36574,0 20.61884,-9.2091 20.62403,-20.53082c0,-5.48093 -2.14111,-10.64081 -6.03239,-14.51915"
                                                        fill="white"></path>
                                                </svg></button>
                                        </li>
                                        <li
                                            class="flex items-center text-center border border-gray-100 rounded-full hover:bg-emerald-500 mr-2 transition ease-in-out duration-500">
                                            <button quote="KachaBazar" aria-label="linkedin"
                                                class="react-share__ShareButton"
                                                style="background-color: transparent; border: none; padding: 0px; font: inherit; color: inherit; cursor: pointer;"><svg
                                                    viewBox="0 0 64 64" width="32" height="32">
                                                    <circle cx="32" cy="32" r="31"
                                                        fill="#007fb1"></circle>
                                                    <path
                                                        d="M20.4,44h5.4V26.6h-5.4V44z M23.1,18c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1 c1.7,0,3.1-1.4,3.1-3.1C26.2,19.4,24.8,18,23.1,18z M39.5,26.2c-2.6,0-4.4,1.4-5.1,2.8h-0.1v-2.4h-5.2V44h5.4v-8.6 c0-2.3,0.4-4.5,3.2-4.5c2.8,0,2.8,2.6,2.8,4.6V44H46v-9.5C46,29.8,45,26.2,39.5,26.2z"
                                                        fill="white"></path>
                                                </svg></button>
                                        </li>
                                    </ul>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
