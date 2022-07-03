
<script setup>
import Pagination from "../components/Pagination.vue";
import { ref } from 'vue'
import ProductItem from "./components/ProductItem.vue";
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
</script>
<template>

    <Head>
        <link rel="stylesheet" :href="css" />
    </Head>
    <Layout sitename="Products">
        <div class="px-4 max-w-2xl m-auto" v-if="$page.props.flash.error">
            <div v-for="(error, index) in $page.props.flash.error" :key="index"
                class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class="font-medium">{{ error }}</span>
            </div>
        </div>
        <div class="bg-white by rounded-sm border border-slate-200">
            <header class="mn mr flex gap-4 items-center">
                <h2 class="g_ text-slate-800">
                    All Products: <span class="yu gk">{{ products_count }}</span>
                </h2>
                <div v-show="checkIfOneOfCheckBoxSelected()">
                    <button @click="DeleteSelected" class="
              btn
              text-white
              border-rose-400
              hover--border-rose-700
              bg-rose-500
              hover:bg-rose-700
            ">
                        Delete
                    </button>
                </div>
            </header>
            <div>
                <div class="lz">
                    <table class="av oq">
                        <thead class="gb g_ gq text-slate-500 hq ck cx border-slate-200">
                            <tr>
                                <th class="v_ wk xe vm co ut">
                                    <div class="flex items-center">
                                        <label class="inline-flex">
                                            <span class="tc">Select all</span>
                                            <input @click="toggleSelectAll" id="parent-checkbox" class="to"
                                                type="checkbox" />
                                        </label>
                                    </div>
                                </th>
                                <th class="v_ wk xe vm co ut">
                                    <span class="tc">Favourite</span>
                                </th>
                                <!-- name,description,quantity_unit,price,created_at,updated_at -->
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Name</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Description</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Quantity Unit</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Price</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Created At:</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Updated At:</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Status</div>
                                </th>
                                <th class="v_ wk xe vm co"><span class="tc">Menu</span></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm lg lb">
                            <tr v-for="(product, index) in products.data" :key="index">
                                <ProductItem :product="product" />
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination :links="products.links" class="mt-6"></Pagination>

    </Layout>
</template>




<style scoped>
</style>
<script>
import Layout from "../Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
    props: {
        css: {
            type: String,
            default: "",
        },
        products: {
            type: Object,
            default: () => ({}),
        },
        products_count: {
            type: Number,
            default: 0,
        },
    },
    components: {
        Layout,
    },
    data() {
        return {
            select_all_checked: false,
            products_data: null,
        };
    },

    updated() {
        if (this.$page.props.flash.success !== null) {
            this.$toast.open({
                message: this.$page.props.flash.success,
                type: 'success',
                position: 'top-right',

            });
        }
    },

    mounted() {

        this.products_data = this.products.data;
        this.products.data.forEach((product) => {
            product.selected = false;
        });
    },

    methods: {
        toggleSelectAll() {
            this.select_all_checked = !this.select_all_checked;
            this.products.data.forEach((product) => {
                product.selected = this.select_all_checked;
            });
        },

        checkIfOneOfCheckBoxSelected() {
            const oneofTheValueIsChecked = this.products.data.some(function (e) {
                return e.selected;
            });
            return oneofTheValueIsChecked;
        },

        DeleteSelected() {
            const selected_products = this.products.data.filter((product) => {
                return product.selected;
            });
            const selected_products_ids = selected_products.map((product) => {
                return product.id;
            });
            Inertia.post("/admin/products/delete", {
                _method: "delete",
                products: selected_products_ids,
            });
        },
    },
};
</script>
