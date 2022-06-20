
<script setup>
import Pagination from "../components/Pagination.vue";
</script>
<template>
  <Head>
    <link rel="stylesheet" :href="css" />
  </Head>
  <Layout sitename="Products">
    <div class="bg-white by rounded-sm border border-slate-200">
      <header class="mn mr flex gap-4 items-center">
        <h2 class="g_ text-slate-800">
          All Products: <span class="yu gk">{{ products_count }}</span>
        </h2>
        <div v-if="$page.props.flash.success" class="text-blue-600 mb-4">
          {{ $page.props.flash.success }}
        </div>
        <div v-show="checkIfOneOfCheckBoxSelected()">
          <button
            @click="DeleteSelected"
            class="
              btn
              text-white
              border-rose-400
              hover--border-rose-700
              bg-rose-500
              hover:bg-rose-700
            "
          >
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
                      <input
                        @click="toggleSelectAll"
                        id="parent-checkbox"
                        class="to"
                        type="checkbox"
                      />
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
                <th class="v_ wk xe vm co"><div class="g_">Price</div></th>
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
                <td class="v_ wk xe vm co ut">
                  <div class="flex items-center">
                    <label class="inline-flex">
                      <span class="tc">Select</span>
                      <input
                        class="table-item to"
                        v-model="product.selected"
                        type="checkbox"
                      />
                    </label>
                  </div>
                </td>
                <td class="v_ wk xe vm co ut">
                  <div class="flex items-center td">
                    <button>
                      <svg class="ue on ap db ym" viewBox="0 0 16 16">
                        <path
                          d="M8 0L6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934h-6L8 0z"
                        ></path>
                      </svg>
                    </button>
                  </div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="flex items-center">
                    <div class="h-20 w-20 ap mr-2 _f">
                      <img
                        class=""
                        :src="product.media[0].original_url"
                        alt="User 01"
                      />
                    </div>
                    <div class="gk text-slate-800">{{ product.name }}</div>
                  </div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="text-center">{{ product.description }}</div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="text-center">{{ product.quantity_unit }}</div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="gp">{{ product.price }}</div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="text-center gk yj">{{ product.created_at }}</div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="text-center gk yg">{{ product.updated_at }}</div>
                </td>
                <td class="v_ wk xe vm co">
                  <div class="gp">
                    <span
                      class="
                        bg-emerald-500
                        px-4
                        py-2
                        rounded-full
                        text-gray-200
                        font-semibold
                        text-sm
                        block
                        m-auto
                        text-center
                        align-center
                        w-max
                        transition
                        duration-300
                        ease
                      "
                    >
                      Approved
                    </span>
                  </div>
                </td>
                <td class="v_ wk xe vm co ut">
                  <button class="yu xm rounded-full">
                    <span class="tc">Menu</span>
                    <svg class="uu of db" viewBox="0 0 32 32">
                      <circle cx="16" cy="16" r="2"></circle>
                      <circle cx="10" cy="16" r="2"></circle>
                      <circle cx="22" cy="16" r="2"></circle>
                    </svg>
                  </button>
                </td>
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
