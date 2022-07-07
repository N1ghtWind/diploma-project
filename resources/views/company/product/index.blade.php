<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="py-12">
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <main>
                <div class="pl-10 pr-10 sm:pl-6 sm:pr-6 pt-8 pb-8 max-w-screen-2xl w-full ml-auto mr-auto">

                    <!-- Page header -->
                    <div class="sm: justify-between sm:items-center sm:flex mb-8 flex">
                        <!-- Left: Title -->
                        <div class="sm:mb-0 mb-1">
                            <h1 style="letter-spacing: -0.01em;" class="md:text-3xl letter font-bold text-slate-800">
                                Your
                                Products 📦</h1>
                        </div>

                        <!-- Right: Actions -->
                        <div
                            class="sm:justify-end flex sm:grid-flow-row sm:auto-cols-max gap-2 grid-flow-col justify-start ">
                            <div class="table-items-action hidden">
                                <div class="flex items-center">
                                    <div class="xl:block xl:italic xl:text-sm xl:whitespace-nowrap xl:mr-2 "><span
                                            class="table-items-count"></span>
                                        items selected</div> <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-px-3dium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                                </div>
                            </div>

                            <div class="relative">



                                <div class="bg-white border mt-1 z-10 top-full right-0 absolute pt-1 pb-1 w-full overflow-hidden border-slate-200"
                                    style="display: none;">
                                    <div class="text-sm"> <button tabindex="0"
                                            class="flex items-center w-full xo px-3 py-1 cursor-pointer"
                                            :class="selected === 0 & amp; & amp;
                                            'text-indigo-500'">
                                            <svg class="mr-2 flex-shrink-0 fill-current text-indigo-500 invisible"
                                                :class="selected !== 0 & amp; & amp;
                                                'invisible'"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>Today</span> </button> <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer"
                                            :class="selected === 1 & amp; & amp;
                                            'text-indigo-500'">
                                            <svg class="flex-shrink-0 mr-2 fill-current text-indigo-500 invisible"
                                                :class="selected !== 1 & amp; & amp;
                                                'invisible'"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>Last 7 Days</span> </button>

                                        <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer" width="12"
                                            height="9" viewBox="0 0 12 9">
                                            <path
                                                d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                            </path>

                                            <span>Last 12 Months</span>
                                        </button>
                                        <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer"
                                            :class="selected === 4 & amp; & amp;
                                            'text-indigo-500'">
                                            <svg class="flex-shrink-0 mr-2 fill-current text-indigo-500 invisible"
                                                :class="selected !== 4 & amp; & amp;
                                                'invisible'"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>All Time</span> </button>
                                    </div>
                                </div>
                            </div>
                            <div class="relative inline-flex">
                            </div>
                            <a href="{{ route('company.product.create') }}">

                                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white"><i
                                        class="fa-solid fa-plus w-4 fill-current bh flex-shrink-0"></i>
                                    <span class="block pl-2">Add Product</span> </button>
                            </a>

                        </div>

                    </div>

                    <!-- Table -->
                    <div class="bg-white by rounded-sm border border-slate-200 ry">
                        <header class="px-5 py-4">
                            <h2 class="font-semibold text-slate-800">All Products <span
                                    class="text-slate-400 gk">{{ $count_of_my_products }}</span></h2>
                        </header>
                        <div>
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full lg lb">
                                    <thead class="leading-6 text-xs uppercase text-slate-500 hq ck border-slate-200">
                                        <tr>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="flex items-center"> <label class="inline-flex"> <span
                                                            class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Select
                                                            all</span> <input id="parent-checkbox" class="to"
                                                            type="checkbox">
                                                    </label> </div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Image</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Date added:</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Name:</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Price:</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Quantity unit:</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Status</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold">Last modified:</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        @forelse($my_products as $key => $product)
                                            <div>
                                                <tr>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <div class="flex items-center"> <label class="inline-flex">
                                                                <span
                                                                    class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Select</span>
                                                                <input class="table-item to" type="checkbox"> </label>
                                                        </div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="flex items-center text-slate-800">
                                                            <div
                                                                class="flex-shrink-0 flex items-center justify-center h-30 w-20 mr-2 _f">
                                                                <img class="rq w-full"
                                                                    src="{{ $product->media->first()->getUrl() }}"
                                                                    alt="product">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="first:pl-5 px-2 last:pr-5 py-3 whitespace-nowrap">
                                                        <div>
                                                            {{ Carbon\Carbon::parse($product->created_at)->format('Y-m-d H:i:s') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="gk  gk yg">{{ $product->price }}€</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="text-center text-slate-800">
                                                            {{ $product->quantity_unit }}</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="inline-flex gk pe yh rounded-full gp vk vy">
                                                            {{ $product->status }}</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="gp">
                                                            {{ Carbon\Carbon::parse($product->updated_at)->format('Y-m-d H:i:s') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <div class="flex items-center">
                                                            <button class="text-slate-400 xm fe"
                                                                aria-expanded="false">
                                                                <svg class="uu of fill-current" viewBox="0 0 32 32">
                                                                    <path d="M16 20l-5.4-5.4 1.4-1.4 4 4 4-4 1.4 1.4z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr id="description-01" role="region" style="display: none;">
                                                    <td colspan="10" class="px-2 first:pl-5 last:pr-5 py-3">
                                                        <div class="flex items-center hq vf ia"> <svg
                                                                class="w-4 h-4 flex-shrink-0 fill-current text-slate-400 mr-2">
                                                                <path
                                                                    d="M1 16h3c.3 0 .5-.1.7-.3l11-11c.4-.4.4-1 0-1.4l-3-3c-.4-.4-1-.4-1.4 0l-11 11c-.2.2-.3.4-.3.7v3c0 .6.4 1 1 1zm1-3.6l10-10L13.6 4l-10 10H2v-1.6z">
                                                                </path>
                                                            </svg>
                                                            <div class="gz">Excepteur sint occaecat cupidatat non
                                                                proident, sunt in culpa qui officia deserunt mollit anim
                                                                id est
                                                                laborum.</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </div>
                                        @empty
                                            <h1>No proudcts</h1>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="flex fh _z jn js">

                        {{ $my_products->links() }}
                        <div class="text-sm text-slate-500 gp jy"> Showing <span
                                class="gk ys">{{ count($my_products) }}</span>
                            of <span class="gk ys">{{ $count_of_my_products }}</span> results
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>
