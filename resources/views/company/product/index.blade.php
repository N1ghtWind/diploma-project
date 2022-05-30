<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/products/index.css') }}"> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
                                <button
                                    class="btn justify-between min-w-44 bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600"
                                    aria-label="Select date range" aria-haspopup="true" :aria-expanded="open"
                                    aria-expanded="false"> <span class="flex items-center">
                                        <i
                                            class="fa-solid fa-calendar text-slate-500 fill-current flex-shrink-0 w-4 h-4 mr-2">
                                        </i>

                                        <span>Last
                                            Month
                                        </span>

                                    </span>
                                    <i class="fa-solid fa-angle-down flex-shrink-0 ml-1 fill-current h-3 w-3"></i>
                                </button>


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
                                            </svg> <span>Last 7 Days</span> </button> <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer text-indigo-500"
                                            :class="selected === 2 & amp; & amp;
                                            'text-indigo-500'">
                                            <svg class="flex-shrink-0 mr-2 fill-current text-indigo-500"
                                                :class="selected !== 2 & amp; & amp;
                                                'invisible'"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>Last Month</span> </button> <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer"
                                            :class="selected === 3 & amp; & amp;
                                            'text-indigo-500'"
                                            :class="selected !== 3 & amp; & amp;
                                            'invisible'"
                                            width="12" height="9" viewBox="0 0 12 9">
                                            <path
                                                d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                            </path>
                                            </svg> <span>Last 12 Months</span>
                                        </button> <button tabindex="0"
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
                                            </svg> <span>All Time</span> </button> </div>
                                </div>
                            </div>
                            <div class="relative inline-flex">
                                <button
                                    class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600">
                                    <span
                                        class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Filter</span>
                                    <wbr>
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                                        <path
                                            d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z">
                                        </path>
                                    </svg>
                                </button>
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
                            <h2 class="font-semibold text-slate-800">All Orders <span
                                    class="text-slate-400 gk">442</span></h2>
                        </header>
                        <div>
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full lg lb">
                                    <thead class="leading-6 text-xs uppercase text-slate-500 hq ck border-slate-200">
                                        <tr>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="flex items-center"> <label class="inline-flex"> <span
                                                            class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Select
                                                            all</span> <input id="parent-checkbox"
                                                            class="to" type="checkbox">
                                                    </label> </div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Order</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Date</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Customer</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Total</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Status</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold">Items</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Location</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">Payment type</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"> <span
                                                    class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Menunu</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="flex items-center"> <label class="inline-flex"> <span
                                                            class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Select</span>
                                                        <input class="table-item to" type="checkbox"> </label> </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center text-slate-800">
                                                    <div
                                                        class="flex-shrink-0 flex items-center justify-center h-30 w-20 mr-2 _f">
                                                        <img class="rq w-full"
                                                            src="{{ asset('products/aspirin.jpg') }}" alt="product">
                                                    </div>
                                                </div>
                                            </td>


                                            {{-- </div>
                            <div class="gk yj">#143567</div>
                        </div>
                        </td> --}}
                                            <td class="first:pl-5 px-2 last:pr-5 py-3 whitespace-nowrap">
                                                <div>22/01/2021</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="gk text-slate-800">Dominik Lamakani</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left gk yg">$129.00</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="inline-flex gk pe yh rounded-full gp vk vy">Refunded</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="gp">1</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="text-left">🇨🇳 Shanghai, CN</div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center"> <svg
                                                        class="w-4 h-4 fill-current text-slate-400 flex-shrink-0 mr-2"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.3 4.5c1.9-1.9 5.1-1.9 7 0 .7.7 1.2 1.7 1.4 2.7l2-.3c-.2-1.5-.9-2.8-1.9-3.8C10.1.4 5.7.4 2.9 3.1L.7.9 0 7.3l6.4-.7-2.1-2.1zM15.6 8.7l-6.4.7 2.1 2.1c-1.9 1.9-5.1 1.9-7 0-.7-.7-1.2-1.7-1.4-2.7l-2 .3c.2 1.5.9 2.8 1.9 3.8 1.4 1.4 3.1 2 4.9 2 1.8 0 3.6-.7 4.9-2l2.2 2.2.8-6.4z">
                                                        </path>
                                                    </svg>
                                                    <div>Subscription</div>
                                                </div>
                                            </td>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="flex items-center"> <button class="text-slate-400 xm fe"
                                                        :class="{ 'az': open }" :aria-expanded="open"
                                                        aria-controls="description-01" aria-expanded="false"> <span
                                                            class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Mennu</span>
                                                        <svg class="uu of fill-current" viewBox="0 0 32 32">
                                                            <path d="M16 20l-5.4-5.4 1.4-1.4 4 4 4-4 1.4 1.4z"></path>
                                                        </svg> </button> </div>
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
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est
                                                        laborum.</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        // document.addEventListener("alpine:init", () => {
                        //     Alpine.data("handleSelect", () => ({
                        //         selectall: !1,
                        //         selectAction() {
                        //             countEl = document.querySelector(".table-items-action"), countEl && (checkboxes =
                        //                 document.querySelectorAll("input.table-item:checked"), document
                        //                 .querySelector(".table-items-count").innerHTML = checkboxes.length,
                        //                 checkboxes.length > 0 ? countEl.classList.remove("hidden") : countEl
                        //                 .classList.add("hidden"))
                        //         },
                        //         toggleAll() {
                        //             this.selectall = !this.selectall, checkboxes = document.querySelectorAll(
                        //                 "input.table-item"), [...checkboxes].map(e => {
                        //                 e.checked = this.selectall
                        //             }), this.selectAction()
                        //         },
                        //         uncheckParent() {
                        //             this.selectall = !1, document.getElementById("parent-checkbox").checked = !1, this
                        //                 .selectAction()
                        //         }
                        //     }))
                        // })
                    </script>
                    <div class="flex fh _z jn js">
                        <nav class="rw _a _e" role="navigation" aria-label="Navigation">
                            <ul class="flex justify-center">
                                <li class="ml-3 first--ml-0"> <a class="btn bg-white border-slate-200 yv fr" href="#0"
                                        disabled="disabled">&lt;- Previous</a> </li>
                                <li class="ml-3 first--ml-0"> <a
                                        class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500"
                                        href="#0">Next
                                        -&gt;</a> </li>
                            </ul>
                        </nav>
                        <div class="text-sm text-slate-500 gp jy"> Showing <span class="gk ys">1</span> to
                            <span class="gk ys">10</span> of <span class="gk ys">467</span> results
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>
