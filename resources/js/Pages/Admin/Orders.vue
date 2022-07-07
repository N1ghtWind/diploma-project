<script setup>
import Pagination from "../components/Pagination.vue";
import OrderItem from "./components/OrderItem.vue";
</script>

<template>
    <Head>
        <link rel="stylesheet" :href="css" />
    </Head>
    <Layout sitename="Orders">
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
                    All Orders: <span class="yu gk">{{ orders_count }}</span>
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

                                <!-- name,description,quantity_unit,price,created_at,updated_at -->
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Intent ID</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Paid amount</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Status</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Created At:</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Updated At:</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Delivery status</div>
                                </th>
                                <th class="v_ wk xe vm co"><span class="tc">Menu</span></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm lg lb">
                            <tr v-for="(order, index) in orders.data" :key="index">
                                <OrderItem :carriers="carriers" :order="order" />
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination :links="orders.links" class="mt-6"></Pagination>
    </Layout>
</template>
<script>
import Layout from "../Layout.vue";
import Dt from "../components/DataTable.vue";
export default {
    components: {
        Layout,
    },
    props: {
        orders: {
            type: Object,
            default: () => ({}),
        },
        orders_count: {
            type: Number,
            default: 0,
        },
        css: {
            type: String,
            default: "",
        },
        carriers: {
            type: Object,
            default: () => ({}),
        },
    },

    data() {
        return {

        };
    },
    methods: {
        checkIfOneOfCheckBoxSelected() {
        },
        DeleteSelected() {
        },

        toggleSelectAll() {

        },
    },
};
</script>
