<template>

    <Head>
        <title>My products</title>
        <link rel="stylesheet" :href="css" />
    </Head>
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
                                    aria-label="Select date range" aria-haspopup="true"> <span
                                        class="flex items-center">
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
                                            class="flex items-center w-full xo px-3 py-1 cursor-pointer">
                                            <svg class="mr-2 flex-shrink-0 fill-current text-indigo-500 invisible"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>Today</span> </button> <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer">
                                            <svg class="flex-shrink-0 mr-2 fill-current text-indigo-500 invisible"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>Last 7 Days</span> </button> <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer text-indigo-500">
                                            <svg class="flex-shrink-0 mr-2 fill-current text-indigo-500" width="12"
                                                height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg>
                                            <span>Last Month</span> </button>
                                        <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer" width="12"
                                            height="9" viewBox="0 0 12 9">
                                            <path
                                                d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                            </path>

                                            <span>Last 12 Months</span>
                                        </button>
                                        <button tabindex="0"
                                            class="flex items-center w-full xo py-1 px-3 cursor-pointer">
                                            <svg class="flex-shrink-0 mr-2 fill-current text-indigo-500 invisible"
                                                width="12" height="9" viewBox="0 0 12 9">
                                                <path
                                                    d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z">
                                                </path>
                                            </svg> <span>All Time</span> </button>
                                    </div>
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
                            <a :href="$route('company.product.create')">

                                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white"><i
                                        class="fa-solid fa-plus w-4 fill-current bh flex-shrink-0"></i>
                                    <span class="block pl-2">Add Product</span> </button>
                            </a>

                        </div>

                    </div>

                    <!-- Table -->
                    <div v-if="my_products.data.length">
                        <div class="bg-white by rounded-sm border border-slate-200 ry">
                            <header class="flex items-center content-center gap-12 px-5 py-4">
                                <h2 class="font-semibold text-slate-800">All Products <span class="text-slate-400 gk">
                                        {{ count_of_my_products }}
                                    </span>
                                </h2>
                                <div v-show="checkIfOneOfCheckBoxSelected()">
                                    <button @click="DeleteSelected()"
                                        class="btn text-white ntext-white border-rose-400 hover--border-rose-700 bg-rose-500 hover:bg-rose-700">
                                        Delete
                                    </button>
                                </div>
                            </header>
                            <div>
                                <div class="overflow-x-auto">
                                    <table class="table-auto w-full lg lb">
                                        <thead
                                            class="leading-6 text-xs uppercase text-slate-500 hq ck border-slate-200">
                                            <tr>
                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                    <div class="flex items-center"> <label class="inline-flex"> <span
                                                                class="absolute w-px h-px p-0 -m-px overflow-hidden react whitespace-nowrap border-0">Select
                                                                all</span> <input v-model="select_all_checked" @click="toggleSelectAll()"
                                                                id="parent-checkbox" class="to" type="checkbox">
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
                                        <tbody v-for="(product, index) in my_products.data" :key="index"
                                            class="text-sm">
                                            <TableItem :product="product"></TableItem>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="flex fh _z jn js">

                            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                                <Link v-if="my_products.prev_page_url" :href="my_products.prev_page_url" rel="prev"
                                    class="relative inline-flex  items-center px-4 py-2 text-sm font-medium text-indigo-500 bg-white border border-gray-300 leading-5 rounded-md hover:text-indigo-600 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-indigo-700 transition ease-in-out duration-150">
                                « Previous
                                </Link>
                                <span v-else
                                    class="relative inline-flex mx-2 items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    « Previous
                                </span>

                                <Link v-if="my_products.next_page_url" :href="my_products.next_page_url" rel="prev"
                                    class="relative inline-flex  items-center px-4 py-2 text-sm font-medium text-indigo-500 bg-white border border-gray-300 leading-5 rounded-md hover:text-indigo-600 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-indigo-700 transition ease-in-out duration-150">
                                Next »
                                </Link>
                                <span v-else
                                    class="relative inline-flex mx-2 items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    Next »
                                </span>
                            </nav>
                            <div class="text-sm text-slate-500 gp jy"> Showing <span class="gk ys">{{
                                    my_products.data.length
                            }}
                                </span>
                                of <span class="gk ys">{{ count_of_my_products }}</span> results
                            </div>
                        </div>
                    </div>
                    <h1 class="text-base font-medium text-center" v-else>No proudcts</h1>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import TableItem from "./components/TableItem.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "DiplomaIndex",
    components: {
        TableItem
    },
    props: {
        my_products: {
            type: Object,
            required: true,
        },
        count_of_my_products: {
            type: Number,
            required: true,
        },
        css: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            data_my_products: null,
            select_all_checked: false,

        };
    },


    mounted() {
        this.select_all_checked = false;
        this.data_my_products = this.my_products;
        this.data_my_products.data.forEach((product) => {
            product.selected = false;
        });
    },

    methods: {
        toggleSelectAll() {
            this.select_all_checked = !this.select_all_checked;
            this.my_products.data.forEach((product) => {
                product.selected = this.select_all_checked;
            });
        },

        checkIfOneOfCheckBoxSelected() {
            const oneofTheValueIsChecked = this.my_products.data.some(function (e) {
                return e.selected;
            });
            return oneofTheValueIsChecked;
        },

        DeleteSelected() {
            const selected_products = this.my_products.data.filter((product) => {
                return product.selected;
            });
            const selected_products_ids = selected_products.map((product) => {
                return product.id;
            });
            Inertia.post(route('company.product.destroy', { product: 0 }), {
                _method: "delete",
                products: selected_products_ids,
            });
             this.select_all_checked = false;
        },

    },
};
</script>

<style scoped>
</style>
