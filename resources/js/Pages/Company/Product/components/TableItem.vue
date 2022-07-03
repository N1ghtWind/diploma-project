<template>
    <tr>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
            <div class="flex items-center">
                <label class="inline-flex">
                    <span class="
              absolute
              w-px
              h-px
              p-0
              -m-px
              overflow-hidden
              react
              whitespace-nowrap
              border-0
            ">Select</span>
                    <input v-model="product.selected" class="table-item to" type="checkbox" />
                </label>
            </div>
        </td>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
            <div class="flex items-center text-slate-800">
                <div class="
            flex-shrink-0 flex
            items-center
            justify-center
            h-30
            w-20
            mr-2
            _f
          ">
                    <img class="rq w-full" :src="product.media[0].original_url" alt="product" />
                </div>
            </div>
        </td>
        <td class="first:pl-5 px-2 last:pr-5 py-3 whitespace-nowrap">
            <div>
                {{ product.created_at }}
            </div>
        </td>
        <td class="first:pl-5 px-2 last:pr-5 py-3 whitespace-nowrap">
            <div>
                {{ product.name }}
            </div>
        </td>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
            <div class="gk gk yg">€ {{ product.price }}</div>
        </td>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
            <div class="text-center text-slate-800">
                {{ product.quantity_unit }}
            </div>
        </td>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
            <div class="inline-flex gk pe yh rounded-full gp vk vy">
                {{ product.status }}
            </div>
        </td>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
            <div class="gp">
                {{ product.updated_at }}
            </div>
        </td>
        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
            <div @click="openModal = !openModal" class="flex items-center">
                <button class="text-slate-400 xm fe" aria-expanded="false">
                    <svg class="uu of fill-current" viewBox="0 0 32 32">
                        <path d="M16 20l-5.4-5.4 1.4-1.4 4 4 4-4 1.4 1.4z"></path>
                    </svg>
                </button>
            </div>
        </td>
    </tr>
    <div v-show="openModal" class="table-row" id="description-01" role="region">
        <td colspan="10" class="px-2 first:pl-5 last:pr-5 py-3">
            <div class="flex justify-between items-center gap-4">
                <div class="">
                    <span class="font-semibold">Description: </span>
                    <div class="">
                        <span class="font-semibold"></span> {{ product.description }}
                    </div>
                </div>
                <a :href="$route('company.product.edit', {product: product.id})" as="button" class="btn text-white ntext-white border-yellow-400 hover--border-yellow-700 bg-amber-500 hover:bg-amber-700"> Edit </a>
            </div>

        </td>
    </div>
</template>

<script>
export default {
    name: "DiplomaTableItem",
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            openModal: this.product.openModal,
        };
    },

    mounted() {

    },

    methods: {},
};
</script>

<style scoped>
</style>
