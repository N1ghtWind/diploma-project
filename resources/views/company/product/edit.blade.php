<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">
                        Edit Product
                    </h1>
                </div>
            </div>
            @if (session('status'))
                <div class="p-4 mb-4 text-sm max-w-2xl m-auto text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
            @endif
            <div class="my-8">
                <span
                    class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded   my-4">{{ ucfirst($product->status) }}</span>
            </div>
            <div class="w-full gap-4 grid grid-cols-1 lg:grid-cols-3">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <img src="{{ $product->media->first()->getUrl() }}" alt="">
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('company.product.update', ['product' => $product]) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700">Name*</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name"
                                            value="{{ $product->name }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="price"
                                            class="block text-sm font-medium text-gray-700">Price</label>
                                        <div class="relative">
                                            <input id="price" name="price" value="{{ $product->price }}"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md px-8"
                                                type="text">
                                            <div
                                                class="absolute tm tg flex right-auto top-0 bottom-0 left-0 items-center pointer-events-none">
                                                <i class="fas fa-euro-sign flex-shrink-0 w-4 h-4 mr-2 ml-3 align-middle text-gray-600"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="6" cols="5" value=""
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $product->description }}</textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="category_id"
                                            class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="category_id" name="category_id" autocomplete="category_id"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="quantity_unit"
                                            class="block text-sm font-medium text-gray-700">Quantity unit</label>
                                        <input type="text" name="quantity_unit" id="quantity_unit"
                                            value="{{ $product->quantity_unit }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div
                                        class="flex justify-center items-center w-full col-span-6 sm:col-span-6 lg:col-span-6">
                                        <label for="dropzone-file"
                                            class="flex flex-col justify-center items-center w-full h-64 bg-white rounded-lg border-2 border-gray-300 border-dashed cursor-pointer  hover:bg-gray-100">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <svg class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click
                                                        to upload</span></p>
                                                <p class="text-xs text-gray-500">PNG, JPG or GIF (1/1 Aspect ratio)</p>
                                            </div>
                                            <input name="image" id="dropzone-file" type="file" class="hidden" />
                                        </label>
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
