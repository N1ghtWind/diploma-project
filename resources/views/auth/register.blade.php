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
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nickname')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>


            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required />
            </div>


            <!-- City -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="city">
                    City
                </label>
                <select name="city" id="city"
                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid transition ease-in-out m-0 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    aria-label="Default select example">
                    @foreach ($cities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required />
            </div>

            <!-- Full Name -->
            <div class="mt-4">
                <x-label for="full_name" :value="__('Full Name')" />

                <x-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')"
                    required />
            </div>

            <!-- Zip -->
            <div class="mt-4">
                <x-label for="zip" :value="__('Zip')" />

                <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('address')"
                    required />
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
</x-app-layout>
