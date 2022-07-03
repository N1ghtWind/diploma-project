<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <div class="header flex items-end justify-between mb-12 text-center">
                <div class="title w-full">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">
                        Add Product
                    </h1>
                </div>
            </div>
            <form class="p-2 max-w-3xl m-auto" method="POST" enctype="multipart/form-data" action="{{ route('company.product.store') }}">
                @csrf
                <!-- Session Status -->
                @if (session('status'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium">{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                {{-- name	description	quantity_unit	price	created_at	updated_at --}}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                    <input type="text" id="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product title..." name="name" required>
                </div>


                <div class="mb-6">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">Product
                        Description</label>
                    <textarea type="text" id="desc" rows="4"
                        class="shadow-sm bg-gray-50 border  resize-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product description..." name="desc" required></textarea>
                </div>

                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" autocomplete="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="quantity"
                        class="resize-none block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                    <input type="text" id="quantity"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product description..." name="quantity" required></input>
                </div>
                <x-input-prefix />


                <div class="flex justify-center mt-8">
                    <div class="rounded-lg bg-white w-full">
                        <label for="image" class="inline-block text-gray-700 font-medium">Product Image</label>
                        <p class="text-gray-400 my-2">(jpg,png,svg,jpeg)</p>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex cursor-pointer flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
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
                                <input accept="image/*" value="" type="file" name="image" id="image"
                                    class="opacity-0" />
                            </label>
                        </div>

                    </div>
                </div>
                <div class="w-full mb-3"></div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add
                    Product</button>
            </form>
        </div>

    </div>

</x-app-layout>
