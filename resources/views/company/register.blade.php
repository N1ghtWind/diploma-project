<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current my-12 text-gray-500" />
            </a>
        </x-slot>
        <x-slot name="register_option">
            <div class="p-2">
                <h1 class="text-4xl text-center font-bold text-gray-800 mb-4">
                    Register as:
                </h1>
                <div class="flex items-center my-3 p-2 rounded-md bg-gray-800 text-gray-100">
                    <x-register-tab route="{{ route('register') }}" :active="request()->routeIs('register')">Client</x-register-tab>
                    <x-register-tab route="{{ route('register.company') }}" :active="request()->routeIs('register.company')">Company</x-register-tab>
                    <x-register-tab route="{{ route('register.carrier') }}" :active="request()->routeIs('register.carrier')">Carrier</x-register-tab>
                </div>
                {{-- <ul
                    class="text-sm shadow-lg flex font-medium text-center text-gray-500 rounded-lg divide-x divide-gray-200 dark:divide-gray-200 dark:text-gray-400">
                    <li class="w-full">
                        <a href="{{ route('register-carrier') }}"
                            class="inline-block p-4 w-full text-gray-900 bg-white hover:text-gray-700 hover:bg-gray-200 dark:hover:text-white whitespace-nowrap dark:bg-gray-100 dark:hover:bg-gray-800">Register
                            as carrier</a>

                    </li>
                    <li class="w-full">
                        <a href="{{ route('register') }}"
                            class="inline-block p-4 w-full text-gray-900 bg-white hover:text-gray-700 hover:bg-gray-200 dark:hover:text-white whitespace-nowrap dark:bg-gray-100 dark:hover:bg-gray-800">Register
                            as client</a>
                    </li>
                </ul> --}}
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form enctype="multipart/form-data" method="POST" action="{{ route('register.company') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Account owner name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- Company Name -->
            <div class="mt-4">
                <x-label for="company_name" :value="__('Company Name')" />

                <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required />
            </div>


            <div class="flex justify-center mt-8">
                <div class="rounded-lg shadow-xl bg-gray-50 w-full">
                        <label for="logo" class="inline-block text-gray-700 font-medium">Company Logo
                            Image</label>
                        <p class="text-gray-400 my-2">(jpg,png,svg,jpeg)</p>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                        Select a photo</p>
                                </div>
                                <input accept="image/*" value="{{ old('logo') }}" type="file" name="logo" id="logo" class="opacity-0" />
                            </label>
                        </div>

                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
