<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">
                        Add Product
                    </h1>
                </div>
            </div>
            <form method="POST" action="">
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
                    <label for="quantity"
                        class="resize-none block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                    <input type="text" id="quantity"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product description..." name="quantity" required></input>
                </div>
                <x-input-prefix />
                <div class="w-full mb-3"></div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Product</button>
            </form>
        </div>

    </div>

</x-app-layout>
