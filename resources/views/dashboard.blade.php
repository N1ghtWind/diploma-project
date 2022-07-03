<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white md:p-6 lg:p-12">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <p class="text-4xl font-bold text-gray-800 mb-4">
                        Products
                    </p>

                    <p class="text-2xl font-light text-gray-400">
                        Here you can see the available products by the companies
                    </p>
                </div>
                <div class="text-end">
                    <form
                        class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                        <div class=" relative ">
                            <input type="text" id="&quot;form-subscribe-Search"
                                class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Enter a title" />
                        </div>
                        <button
                            class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                            type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>

            @if ($products->isEmpty())
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 text-center">Nothing was found 😥</h1>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                    @foreach ($products as $product)
                        <form class="h-full" action="{{ route('products.show', ['product' => $product->id]) }}">
                            <button type="submit">
                                <div
                                    class="overflow-hidden border transform transition-all hover:-translate-y-2 duration-300 shadow-md hover:shadow-2xl rounded-lg w-96 md:w-80 lg:w-96 cursor-pointer m-auto">
                                    <img alt="blog photo" src="{{ $product->getFirstMedia()->getUrl() }}"
                                        class="object-cover rounded-xl w-64 m-auto" />
                                    <div class="bg-white  w-full p-4">
                                        <p class="text-indigo-500 text-md font-medium">
                                            €{{ $product->price }}
                                        </p>
                                        <p class="text-gray-800  text-xl font-medium mb-2">
                                            {{ $product->name }}
                                        </p>
                                        <p class="text-gray-400  font-light text-md">
                                            {{ $product->description }}
                                        </p>
                                        <span
                                            class="my-2 block max-w-fit bg-purple-400 p-1 rounded-lg text-white">{{ $product->quantity_unit }}</span>
                                        <div class="flex justify-between items-center mt-4">
                                            <p class="text-gray-800 ">Listed date: <span
                                                    class="text-gray-400">{{ $product->created_at->format('Y.m.d') }}</span>
                                            </p>
                                            <a href="#" class="block relative">
                                                <img alt="profil"
                                                    src="https://benu.rs/images/documents/13244709-1342864532407039-3980967859900892105-n.png"
                                                    class="mx-auto object-cover w-20 " />
                                            </a>
                                        </div>
                                        <add-cart-button :id="{{ $product->id }}"></add-cart-button>
                                    </div>
                                </div>
                            </button>
                        </form>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
