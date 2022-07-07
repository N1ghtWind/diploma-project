<template>
  <Head>
    <title>Cart</title>
    <link rel="stylesheet" :href="css" />
  </Head>
  <div class="py-12">
    <div class="mb-3 max-w-7xl m-auto">

    </div>
    <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
      <div class="mt-6 text-left">
        <Link
          class="text-sm font-medium text-indigo-500 hover:text-indigo-600"
          :href="$route('products.index')"
          ><i class="fa-solid fa-arrow-left"></i> Back To Shopping</Link
        >
      </div>
      <div
        v-show="!$page.props.flash.success"
        class="flex flex-col lg:flex-row tez tnb justify-center"
      >
        <!-- Cart items -->
        <div class="mb-6 lg:mb-0 w-full">
          <header class="mb-2">
            <!-- Title -->
            <h1 class="custom-font text-slate-800 font-bold">
              Shopping Cart ({{ Object.keys(cart_items).length }}) 🛒
            </h1>
          </header>
          <ul v-if="Object.keys(cart_items).length">
            <li
              v-for="(cart_item, index) in cart_items"
              :key="index"
              class="flex items-center py-6 border-b-1 border-slate-200"
            >
              <a
                class="block mb-4 sm:mb-0 mr-5 w-32 xl:w-full flex-shrink-0"
                href="#0"
              >
                <img
                  class="rounded-sm"
                  :src="cart_item.associatedModel.media[0].original_url"
                  width="200"
                  height="142"
                  alt="Product 01"
                />
              </a>
              <div class="flex-grow">
                <a href="#0">
                  <h3 class="gx font-semibold text-slate-800 mb-1">
                    {{ cart_item.associatedModel.name }}
                  </h3>
                </a>
                <div class="text-sm mb-2">
                  {{ cart_item.associatedModel.description }}
                </div>
                <div class="flex flex-wrap fg items-center">
                  <div class="flex flex-wrap items-center lt mr-2">
                    <div class="flex items-center lt">
                      <div class="flex lv">
                        <button>
                          <span class="position_">1 star</span>
                          <svg
                            class="w-4 h-4 fill-current text-amber-500"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"
                            ></path>
                          </svg>
                        </button>
                        <button>
                          <span class="position_">2 stars</span>
                          <svg
                            class="w-4 on fill-current text-amber-500"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"
                            ></path>
                          </svg>
                        </button>
                        <button>
                          <span class="position_">3 stars</span>
                          <svg
                            class="w-4 on fill-current text-amber-500"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"
                            ></path>
                          </svg>
                        </button>
                        <button>
                          <span class="position_">4 stars</span>
                          <svg
                            class="w-4 on fill-current text-amber-500"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"
                            ></path>
                          </svg>
                        </button>
                        <button>
                          <span class="position_">5 stars</span>
                          <svg
                            class="w-4 on fill-current text-slate-300"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"
                            ></path>
                          </svg>
                        </button>
                      </div>
                      <div
                        class="inline-flex text-sm font-medium text-amber-600"
                      >
                        4.2
                      </div>
                    </div>
                    <div class="text-slate-400">·</div>
                    <div class="px-2">
                      <div
                        class="
                          inline-flex
                          text-sm
                          font-medium
                          bg-emerald-100
                          text-emerald-600
                          rounded-full
                          text-center
                          px-2
                          py-0.5
                        "
                      >
                        €{{ cart_item.associatedModel.price }}
                      </div>
                    </div>
                    <CartItem v-show="!isFormProcessing" :product="cart_item" />
                  </div>
                  <button
                    @click="removeItem(cart_item)"
                    class="text-sm btn p-2 text-white"
                    :class="[
                      isFormProcessing
                        ? 'bg-gray-500 hover:bg-gray-500'
                        : 'bg-rose-500 hover:bg-rose-600',
                    ]"
                    :disabled="isFormProcessing"
                  >
                    Remove
                  </button>
                </div>
              </div>
            </li>
          </ul>
          <h1 v-else>Nothing was found 😓</h1>
        </div>

        <!-- Sidebar -->
        <div class="as ri teb">
          <div
            class="bg-white vl by rounded-sm border border-slate-200 tev tnu"
          >
            <div class="text-slate-800 font-semibold mb-2">Order Summary</div>
            <!-- Order details -->
            <ul class="mb-4">
              <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                <div>Products</div>
                <div class="font-medium text-slate-800">
                  €{{ total_price_without_fee.toFixed(2) }}
                </div>
              </li>
              <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                <div>Shipping</div>
                <div class="font-medium text-slate-800">Free</div>
              </li>
              <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                <div>Taxes</div>
                <div class="font-medium text-slate-800">
                  € {{ (total_price - total_price_without_fee).toFixed(2) }}
                </div>
              </li>
              <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                <div>Total due (including fees)</div>
                <div class="font-medium text-emerald-600">
                  €{{ total_price.toFixed(2) }}
                </div>
              </li>
            </ul>
            <!-- Promo box -->

            <form
              v-show="intent !== null"
              :action="form_route"
              method="POST"
              id="payment-form"
              @submit.prevent="submitForm"
            >
              <input type="hidden" name="_token" :value="$page.props._token" />
              <div class="mb-6">
                <div id="payment-element"></div>
                <div id="card-errors" role="alert"></div>
              </div>
              <div class="mb-4">
                <button
                  class="btn oq hb xs yo"
                  id="card-button"
                  :data-secret="intent"
                  href="#0"
                >
                  Buy Now - €{{ total_price.toFixed(2) }}
                </button>
              </div>
              <div class="gb text-slate-500 gz text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                <a class="bu xz" href="#0">Terms</a>.
              </div>
            </form>
          </div>
        </div>
      </div>
      <div v-show="$page.props.flash.success" class="bg-white p-6 md:mx-auto">
        <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
          <path
            fill="currentColor"
            d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"
          ></path>
        </svg>
        <div class="text-center">
          <h3
            class="
              md:text-2xl
              text-base text-gray-900
              font-semibold
              text-center
            "
          >
            Payment Done!
          </h3>
          <p class="text-gray-600 my-2">
            {{ $page.props.flash.success }}
          </p>
          <p>Have a great day!</p>
          <div class="py-10 text-center">
            <Link
              :href="$route('products.index')"
              class="
                px-12
                bg-indigo-600
                hover:bg-indigo-500
                text-white
                font-semibold
                py-3
              "
            >
              GO BACK
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import CartItem from "./components/CartItem.vue";

export default {
  name: "DiplomaIndex",
  components: {
    CartItem,
  },
  props: {
    cart_items: {
      type: Object,
      required: true,
    },
    total_price: {
      type: Number,
      required: true,
    },
    total_price_without_fee: {
      type: Number,
      required: true,
    },
    intent: {
      type: String,
    },
    payment_intent: {
      type: Object,
    },
    css: {
      type: String,
      required: true,
    },
    form_route: {
      type: String,
      required: true,
    },
    stripe_key: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      isFormProcessing: false,
    };
  },
  created() {},

  watch: {
    intent: function (newVal, oldVal) {
      // watch it
      console.log("Prop changed: ", newVal, " | was: ", oldVal);
      if (newVal !== oldVal) {
        this.initalizePayment(newVal);
      }
    },
  },

  mounted() {
    const appearance = {
      labels: "floating",
    };
    const stripe = Stripe(this.stripe_key, {
      locale: "en",
    });

    const cardButton = document.getElementById("card-button");
    const clientSecret = cardButton.dataset.secret;

    if (this.intent === null) {
      return;
    }
    var elements = stripe.elements({
      clientSecret: clientSecret,
      appearance: appearance,
    });
    const paymentElement = elements.create("payment", {
      clientSecret,
    });
    paymentElement.mount("#payment-element");
    paymentElement.addEventListener("change", ({ error }) => {
      console.log(error);
      const displayError = document.getElementById("card-errors");
      if (error) {
        displayError.textContent = error.message;
      } else {
        displayError.textContent = "";
      }
    });
    // Handle form submission.
    var form = document.getElementById("payment-form");

    var self = this;
    form.addEventListener("submit", async function (event) {
      event.preventDefault();
      self.isFormProcessing = true;
      stripe
        .confirmPayment({
          elements,
          confirmParams: {
            return_url: "https://example.com",
          },
          redirect: "if_required",
        })
        .then(function (result) {
          if (result.error) {
            console.log(result.error);
            self.isFormProcessing = false;
          } else {
            form.submit();
          }
        });
    });
  },
  methods: {
    manageItem(url, method, product) {
      Inertia.post(
        url,
        {
          _method: method,
          id: product.id,
          quantity: this.quantity,
          name: product.name,
          price: product.price,
        },
        {
          preserveScroll: true,
        }
      );
    },
    removeItem(product) {
      this.manageItem("/cart", "delete", product);
    },
    initalizePayment(intent) {
      const appearance = {
        labels: "floating",
      };
      const stripe = Stripe(this.stripe_key, {
        locale: "en",
      });

      const cardButton = document.getElementById("card-button");
      const clientSecret = intent;

      if (this.intent === null) {
        return;
      }

      var elements = stripe.elements({
        clientSecret: clientSecret,
        appearance: appearance,
      });
      const paymentElement = elements.create("payment", {
        clientSecret,
      });
      paymentElement.mount("#payment-element");
      paymentElement.addEventListener("change", ({ error }) => {
        console.log(error);
        const displayError = document.getElementById("card-errors");
        if (error) {
          displayError.textContent = error.message;
        } else {
          displayError.textContent = "";
        }
      });
      var form = document.getElementById("payment-form");
      // Handle form submission.
      var form = document.getElementById("payment-form");

      var self = this;
      form.addEventListener("submit", async function (event) {
        event.preventDefault();
        self.isFormProcessing = true;
        stripe
          .confirmPayment({
            elements,
            confirmParams: {
              return_url: "https://example.com",
            },
            redirect: "if_required",
          })
          .then(function (result) {
            if (result.error) {
              console.log(result.error);
              self.isFormProcessing = false;
            } else {
              form.submit();
            }
          });
      });
    },
  },
};
</script>
