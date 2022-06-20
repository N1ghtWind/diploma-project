<template>
  <div v-show="!clicked" class="w-full text-left" @click.stop.prevent="addItem">
    <a
      class="
        btn
        inline-block
        bg-indigo-500
        text-md
        cursor-pointer
        font-medium
        hover:bg-indigo-600
        text-white
        p-3
        rounded
      "
      >Add to Cart</a
    >
  </div>
  <div
    v-show="clicked"
    @click.stop.prevent
    class="custom-number-input h-16 w-full"
  >
    <label
      for="custom-input-number"
      class="w-full text-gray-700 text-sm font-semibold"
      >Quantity
    </label>
    <div
      class="flex flex-row h-12 w-full rounded-lg relative bg-transparent mt-1"
    >
      <button
        @click="decrease"
        data-action="decrement"
        class="
          text-gray-600
          hover:text-gray-700
          h-full
          w-20
          rounded-l
          cursor-pointer
          outline-none
        "
      >
        <span class="m-auto text-2xl font-thin">−</span>
      </button>
      <input
        type="number"
        class="
          outline-none
          focus:outline-none
          text-center
          w-full
          font-semibold
          text-md
          hover:text-black
          focus:text-black
          md:text-basecursor-default
          flex
          items-center
          text-gray-700
        "
        name="custom-input-number"
        :value="this.checkHowManyProductInBasket"
      />
      <button
        @click="increase"
        data-action="increment"
        class="
          text-gray-600
          hover:text-gray-700
          h-full
          w-20
          rounded-r
          cursor-pointer
        "
      >
        <span class="m-auto text-2xl font-thin">+</span>
      </button>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
    checkHowManyProductInBasket: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      clicked: false,
      quantity: 0,
      post: null,
    };
  },

  mounted() {

    if(this.checkHowManyProductInBasket > 0) {
      this.clicked = true;
      this.quantity = this.checkHowManyProductInBasket;
    }
  },
  methods: {
    manageItem(url, method, product) {
      Inertia.post(url, {
        _method: method,
        id: product.id,
        quantity: this.quantity,
        name: product.name,
        price: product.price,
      },
      {
          preserveScroll: true,
      });
    },

    addItem() {
      this.clicked = true;
      this.quantity = this.quantity + 1;
      this.manageItem("/cart", "post", this.product);
    },

    increase() {
      if (this.quantity < 10) {
        this.quantity = this.quantity + 1;
        this.manageItem("/cart", "put", this.product);
      }
    },

    decrease() {
      if (this.quantity > 1) {
        this.quantity = this.quantity - 1;
        this.manageItem("/cart", "put", this.product);
      } else {
        this.clicked = false;
        this.quantity = 0;
        this.manageItem("/cart", "delete", this.product);
      }
    },
  },

};
</script>

<style scoped>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type="number"] {
  -moz-appearance: textfield;
}
</style>
