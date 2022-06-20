<template>
  <div class="flex justify-center mx-2">
    <button :class="[disabled_decrease ? 'bg-gray-400' : 'bg-indigo-400']" :disabled="disabled_decrease" @click="decrease(product)"
      class="mx-2 rounded-sm text-white font-bold text-center w-8"
    >
      -
    </button>
    <div
      class="
        text-center
        p-2
        align-middle
        leading-6
        mx-2
        border
        text-sm
        w-8
        font-medium
      "
      style="height: 42px"
    >
     {{ product.quantity }}
    </div>
    <button :class="[disabled_increase ? 'bg-gray-400' : 'bg-indigo-400']" :disabled="disabled_increase" @click="increase(product)"
      class="mx-2  rounded-sm text-white font-bold text-center w-8"
    >
      +
    </button>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
  },

  data() {
    return {
            disabled_increase: false,
            disabled_decrease: false,
    };
  },

  mounted() {},

  methods: {
    manageItem(url, method, product) {
      Inertia.post(
        url,
        {
          _method: method,
          id: product.id,
          quantity: product.quantity,
          name: product.name,
          price: product.price,
        },
        {
          preserveScroll: true,
        }
      );
    },

    increase(product) {
      if (product.quantity < 10) {
        this.disabled_increase = true;
        product.quantity = product.quantity + 1;
        this.manageItem("/cart", "put", product);
        this.timeout = setTimeout(() => {
            this.disabled_increase = false;
        }, 1000);
      }
    },
    decrease(product) {
      this.disabled_decrease = true;
      if (product.quantity > 1) {
        product.quantity = product.quantity - 1;
        this.manageItem("/cart", "put", product);
      } else {
        product.quantity = 0;
        this.manageItem("/cart", "delete", product);
      }
      this.timeout = setTimeout(() => {
            this.disabled_decrease = false;
        }, 1000);
    },
  },
};
</script>

<style scoped>
</style>
