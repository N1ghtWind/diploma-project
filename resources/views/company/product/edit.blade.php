<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">
                        Edit Product
                    </h1>
                </div>
            </div>
            <div class="w-full gap-4 grid grid-cols-1 lg:grid-cols-3">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <img src="{{ asset('assets/products/apple.webp') }}" alt="">
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Name*</label>
                                        <input type="text" name="first_name" id="first_name"
                                            autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name"
                                            class="block text-sm font-medium text-gray-700">Price</label>
                                        <div class="relative">
                                            <input id="icon" name="price"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                type="text">
                                            <div
                                                class="absolute tm tg flex right-auto top-0 bottom-0 left-0 items-center pointer-events-none">
                                                <i class="fas fa-euro-sign flex-shrink-0 w-4 h-4 mr-2 ml-3 align-middle text-gray-600"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                            address</label>
                                        <input type="text" name="email_address" id="email_address"
                                            autocomplete="email"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Country /
                                            Region</label>
                                        <select id="country" name="country" autocomplete="country"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street_address"
                                            class="block text-sm font-medium text-gray-700">Street address</label>
                                        <input type="text" name="street_address" id="street_address"
                                            autocomplete="street-address"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city"
                                            class="block text-sm font-medium text-gray-700">City</label>
                                        <input type="text" name="city" id="city"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="state" class="block text-sm font-medium text-gray-700">State
                                            / Province</label>
                                        <input type="text" name="state" id="state"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP
                                            / Postal</label>
                                        <input type="text" name="postal_code" id="postal_code"
                                            autocomplete="postal-code"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
