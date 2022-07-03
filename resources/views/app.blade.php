<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Scripts -->

    {{-- JQUERY --}}
    <script src="{{ asset('js/jquery.js') }}"></script>


    {{-- FONTAWSOME --}}

    <script src="https://kit.fontawesome.com/9ebe564d03.js" crossorigin="anonymous"></script>

    {{-- FLOWBITE --}}
    <script defer src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    {{-- JQUERY WAYPOINTS --}}
    <script defer src="{{ asset('js/jquery.waypoints.min.js') }}"></script>

    {{-- JQUERY WAYPOINTS ANIMATE --}}
    <script defer src="{{ asset('js/easy-waypoint-animate.js') }}"></script>

    {{-- APP JS --}}
    <script defer src="{{ asset('js/app.js') }}"></script>

    {{-- WOW JS --}}
    <script defer src="{{ asset('js/wow.js') }}"></script>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://js.stripe.com/v3"></script>
    {{-- <script defer src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
    @inertiaHead
    {{-- CUSTOM JS --}}
    <script defer src="{{ asset('js/custom.js') }}"></script>
    <script defer src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-gray-200 px-2 sm:px-4 py-2.5  dark:bg-gray-800">
            <div class="px-4 flex flex-wrap justify-between items-center mx-auto">
                <div class="flex items-center">
                    <a href="{{ URL::to('') }}">
                        <img src="{{ asset('assets/logo.png') }}" class="mr-3 h-6 sm:h-9"
                            alt="Flowbite Logo">
                    </a>
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Diploma</span>
                </div>

                <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <ul
                            class="flex flex-col items-center mt-4 text-lg md:flex-row md:space-x-8 md:mt-0 md:text-lg md:font-medium">
                            @auth
                                <li>
                                    <div class="relative" x-data="{ open: false }" @click.outside="open = false"
                                        @close.stop="open = false">
                                        <div @click="open = ! open">
                                            <button
                                                class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">{{ Auth::user()->name }}
                                                <div class="ml-2">
                                                    <i class="fa-solid fa-angle-down text-sm"></i>
                                                </div>
                                            </button>
                                        </div>
                                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0
                              divide-y  bg-gray-700 divide-gray-600"
                                            @click="open = false">
                                            <div class="rounded-t-md ring-1 text-white ring-black ring-opacity-5 py-1 hover:bg-gray-500 bg-gray-700 divide-gray-600 hover:text-white">
                                                <a class="block px-4 py-2 text-sm leading-5 font-semibold text-gray-100 transition duration-150 ease-in-out"
                                                    href="{{  route('carrier.settings.index')  }}">Settings</a>
                                            </div>
                                            <div
                                                class="rounded-b-md ring-1 text-white ring-black ring-opacity-5 py-1 hover:bg-gray-500 bg-gray-700 divide-gray-600 hover:text-white">
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="block px-4 py-2 text-sm leading-5 font-semibold text-gray-100 transition duration-150 ease-in-out"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                         this.closest('form').submit();">
                                                        Sign out</a>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endauth
                            @auth
                                <li>
                                    <a href="{{ route('products.index') }}"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Products</a>
                                </li>
                                @can('create', App\Models\Product::class)
                                    <li>

                                        <a href="{{ route('company.product.index') }}"
                                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                            My products</a>
                                    </li>
                                @endcan
                                @can('viewAny', App\Models\ActiveDelivery::class)
                                    <li>
                                        <a href="{{ route('active-deliveries.index') }}"
                                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                            Active Deliveries</a>
                                    </li>
                                @endcan

                                @can('viewAny', App\Models\ActiveDelivery::class)
                                    <li>
                                        <a href="{{ route('deliveries.history') }}"
                                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                            History</a>
                                    </li>
                                @endcan
                                <li>
                                    <a href="{{ route('cart.index') }}"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"><i
                                            class="fa-solid fa-basket-shopping"></i></a>
                                </li>

                            @endauth
                            @guest
                                <li>

                                    <a href="{{ route('login') }}"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register</a>
                                </li>
                            @endguest



                        </ul>
                    </div>
                </div>
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden block">
                <div class="pt-2 pb-3 space-y-1">
                    <a class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base text-gray-500 hover:bg-gray-100 font-medium bg-gray-800 focus:outline-none focus:text-indigo-800 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out"
                        href="{{ route('products.index') }}">
                        Dashboard
                    </a>
                </div>
                @auth
                    @can('create', App\Models\Product::class)
                        <div class="pt-2 pb-3 space-y-1">
                            <a class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base text-gray-500 hover:bg-gray-100 font-medium bg-gray-800 focus:outline-none focus:text-indigo-800 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out"
                                href="{{ route('company.product.index') }}">
                                My Products
                            </a>
                        </div>
                    @endcan
                    <basket></basket>
                @endauth

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">


                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="http://forum.test/logout">
                            <input type="hidden" name="_token" value="rh6BfdxkXNS1bCeXTPmoMaQsZMahmRvT1Tl7Jfh6">
                            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out"
                                href="http://forum.test/logout"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Page Content -->
        <main>
            @routes
            @inertia
        </main>
    </div>
</body>

</html>
