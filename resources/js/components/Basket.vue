<template>
  <li class="text-center">
    <div class="relative">
      <a
        href=""
        class="
          block
          py-2
          pr-4
          pl-3
          text-gray-700
          border-b border-gray-100
          hover:bg-gray-50
          md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0
          dark:text-gray-400
          md:dark:hover:text-white
          dark:hover:bg-gray-700 dark:hover:text-white
          md:dark:hover:bg-transparent
          dark:border-gray-700
        "
      >
        <i class="fa-solid fa-basket-shopping"></i>
        <span class="block text-xs">{{price === 0 ? '' : '€' + price}}</span>
        <span
          class="
            top-0
            ml-4
            absolute
            text-md
            border-none
            w-3.5
            h-3.5
            border-2 border-white
            dark:border-gray-800
            rounded-full
          "
          >{{count === 0 ? '' : count}}</span
        >
      </a>
    </div>
  </li>
</template>

<script>
export default {
  data() {
    return {
        count: 0,
        price: 0,
    };
  },

  mounted() {
  },

  methods: {},
};
</script>

<style scoped>
</style>
