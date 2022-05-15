<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div> --}}
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
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
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                    <a href="#" class="w-full block h-full">
                        <img alt="blog photo" src="https://www.tailwind-kit.com/images/blog/1.jpg"
                            class="max-h-40 w-full object-cover" />
                        <div class="bg-white  w-full p-4">
                            <p class="text-indigo-500 text-md font-medium">
                                Video
                            </p>
                            <p class="text-gray-800  text-xl font-medium mb-2">
                                Work at home
                            </p>
                            <p class="text-gray-400  font-light text-md">
                                Work at home, remote, is the new age of the job, every person can work at home....
                            </p>
                            <div class="flex items-center mt-4">
                                <a href="#" class="block relative">
                                    <img alt="profil" src="https://www.tailwind-kit.com/images/person/6.jpg"
                                        class="mx-auto object-cover rounded-full h-10 w-10 " />
                                </a>
                                <div class="flex flex-col justify-between ml-4 text-sm">
                                    <p class="text-gray-800 ">
                                        Jean Jacques
                                    </p>
                                    <p class="text-gray-400">
                                        20 mars 2029 - 6 min read
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                    <a href="#" class="w-full block h-full">
                        <img alt="blog photo" src="https://www.tailwind-kit.com/images/blog/2.jpg"
                            class="max-h-40 w-full object-cover" />
                        <div class="bg-white  w-full p-4">
                            <p class="text-indigo-500 text-md font-medium">
                                Oui
                            </p>
                            <p class="text-gray-800  text-xl font-medium mb-2">
                                test
                            </p>
                            <p class="text-gray-400  font-light text-md">
                                The new supercar is here, 543 cv and 140 000$ !!
                            </p>
                            <span class="my-2 block max-w-fit bg-purple-400 p-1 rounded-lg text-white">324g</span>
                            <div class="flex items-center mt-4">
                                <p class="text-gray-800 ">Listed date:</p>
                                <p class="text-gray-400">2022.03.18</p>
                                <a href="#" class="block relative">
                                    <img alt="profil"
                                        src="https://benu.rs/images/documents/13244709-1342864532407039-3980967859900892105-n.png"
                                        class="mx-auto object-cover w-20 " />
                                </a>
                                {{-- <div class="flex flex-col justify-between ml-4 text-sm">
                                    <p class="text-gray-800 ">
                                        Jean Jacques
                                    </p>
                                    <p class="text-gray-400">
                                        20 mars 2029 - 16 min read
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                    <a href="#" class="w-full block h-full">
                        <img alt="blog photo" src="/images/blog/3.jpg" class="max-h-40 w-full object-cover" />
                        <div class="bg-white w-full p-4">
                            <p class="text-indigo-500 text-md font-medium">
                                Oui
                            </p>
                            <p class="text-gray-800  text-xl font-medium mb-2">
                                test
                            </p>
                            <p class="text-gray-400  font-light text-md">
                                The new supercar is here, 543 cv and 140 000$ !!
                            </p>
                            <div class="flex items-center mt-4">
                                <a href="#" class="block relative">
                                    <img alt="profil" src="/images/person/6.jpg"
                                        class="mx-auto object-cover rounded-full h-10 w-10 " />
                                </a>
                                <div class="flex flex-col justify-between ml-4 text-sm">
                                    <p class="text-gray-800 ">
                                        Jean Jacques
                                    </p>
                                    <p class="text-gray-400 ">
                                        20 mars 2029 - 6 min read
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
