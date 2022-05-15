<x-guest-layout>
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
                    <x-register-tab route="#" :active="request()->routeIs('register-company')">Company</x-register-tab>
                    <x-register-tab route="#" :active="request()->routeIs('register-carrier')">Carrier</x-register-tab>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

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
</x-guest-layout>
