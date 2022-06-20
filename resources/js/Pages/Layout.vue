<template>
  <div style="width: calc(100% - 80px);" class="flex min-h-screen w-full bg-white font-sans">
    <div class="sidebar" :class="{ open: toggleActive }" ref="sidebar">
      <div class="logo-details">
        <i class="fa-brands fa-css3-alt icon"></i>

        <div class="logo_name">Diploma</div>
        <i class="bx bx-menu" @click="toggleSideBar" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <Link :href="$route('dashboard.index')">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </Link>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <Link :href="$route('admin.products.index')">
            <i class="bx bxs-package"></i>
            <span class="links_name">Products</span>
          </Link>
          <span class="tooltip">Products</span>
        </li>
        <li>
          <Link :href="$route('user.index')">
            <i class="bx bx-user"></i>
            <span class="links_name">User</span>
          </Link>
          <span class="tooltip">User</span>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-chat"></i>
            <span class="links_name">Messages</span>
          </a>
          <span class="tooltip">Messages</span>
        </li> -->
        <li>
          <Link :href="$route('order.index')">
            <i class="bx bx-cart-alt"></i>
            <span class="links_name">Order</span>
          </Link>
          <span class="tooltip">Order</span>
        </li>
        <li>
          <Link :href="$route('settings.index')">
            <i class="bx bx-cog"></i>
            <span class="links_name">Setting</span>
          </Link>
          <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
          <a href="#">
            <span class="links_name">Sign out</span>
            <i class="bx bx-log-out" id="log_out"></i>
          </a>
        </li>
      </ul>
    </div>
    <main style="width: -webkit-fill-available;"
      class="flex min-h-screen flex-1 flex-col rounded-l-[48px] bg-white p-8"
    >
      <nav class="flex items-center gap-x-6">
        <div class="flex w-3/5 items-center justify-between">
          <h1 class="text-[30px] font-bold text-gray-700">{{ sitename }}</h1>
          <div class="flex items-center gap-x-2">
            <div class="relative">
              <span
                class="
                  pointer-events-none
                  absolute
                  inset-y-0
                  flex
                  items-center
                  px-3
                "
              >
                <svg
                  class="h-6 w-6 stroke-current text-gray-400"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M19.25 19.25L15.5 15.5M4.75 11C4.75 7.54822 7.54822 4.75 11 4.75C14.4518 4.75 17.25 7.54822 17.25 11C17.25 14.4518 14.4518 17.25 11 17.25C7.54822 17.25 4.75 14.4518 4.75 11Z"
                  ></path>
                </svg>
              </span>
              <input
                type="text"
                placeholder="Search"
                class="
                  rounded-10
                  bg-gray-100
                  py-3
                  pr-4
                  pl-10
                  text-sm text-gray-400
                  focus:text-gray-700 focus:outline-none
                "
              />
            </div>
          </div>
        </div>
        <div class="flex w-2/5 items-center justify-end">
          <div class="flex items-center gap-x-2.5 px-4">
            <button
              class="
                relative
                flex
                h-11
                w-11
                items-center
                justify-center
                rounded-full
                bg-gray-100
                text-gray-400
                hover:text-indigo-500
              "
            >
              <svg
                class="h-7 w-7 stroke-current"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M17.25 12V10C17.25 7.1005 14.8995 4.75 12 4.75C9.10051 4.75 6.75 7.10051 6.75 10V12L4.75 16.25H19.25L17.25 12Z"
                ></path>
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M9 16.75C9 16.75 9 19.25 12 19.25C15 19.25 15 16.75 15 16.75"
                ></path>
              </svg>
              <div class="absolute bottom-6 right-1 flex h-5 w-5">
                <span
                  class="
                    absolute
                    inline-flex
                    h-full
                    w-full
                    animate-ping
                    rounded-full
                    bg-indigo-400
                    opacity-75
                  "
                />
                <span
                  style="font-size: 14px"
                  class="h-5 w-5 block text-white rounded-full bg-indigo-400"
                  >99</span
                >
              </div>
            </button>
          </div>
          <button
            class="
              flex
              h-11
              items-center
              justify-center
              rounded-full
              bg-gray-100
              px-2
              text-gray-400
              hover:text-indigo-500
            "
          >
            <img
              src="/img/avatar-1.jpeg"
              alt=""
              class="h-8 w-8 rounded-full object-cover"
            />
            <span class="pl-2 text-sm">Jozsi</span>
            <svg class="h-6 w-6 stroke-current" fill="none" viewBox="0 0 24 24">
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M15.25 10.75L12 14.25L8.75 10.75"
              ></path>
            </svg>
          </button>
        </div>
      </nav>
      <div class="gap-x-6 py-8">
        <slot />
      </div>
    </main>
  </div>
</template>

<script>
export default {
  props: {
    sitename: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      series: [
        {
          name: "Daily orders",
          data: [31, 40, 28, 51, 42, 109, 100],
        },
      ],

      chartOptions: {
        chart: {
          height: 350,
          type: "area",
          legend: { show: false },
          toolbar: {
            show: false,
          },
        },

        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "smooth",
        },
        xaxis: {
          type: "datetime",
          categories: [
            "2018-09-19T00:00:00.000Z",
            "2018-09-19T01:30:00.000Z",
            "2018-09-19T02:30:00.000Z",
            "2018-09-19T03:30:00.000Z",
            "2018-09-19T04:30:00.000Z",
            "2018-09-19T05:30:00.000Z",
            "2018-09-19T06:30:00.000Z",
          ],
        },
        tooltip: {
          x: {
            format: "dd/MM/yy HH:mm",
          },
        },
      },

      toggleActive: false,
    };
  },

  methods: {
    toggleSideBar() {
      this.toggleActive = !this.toggleActive;
    },
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700");
* {
  font-family: "Montserrat", sans-serif;
}
/* Google Font Link */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.sidebar {
  position: relative;
  left: 0;
  top: 0;
  width: 78px;
  background: #11101d;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open {
  width: 250px;
}
.sidebar .logo-details {
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon {
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name {
  opacity: 1;
}
.sidebar .logo-details #btn {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn {
  text-align: right;
}
.sidebar i {
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list {
  margin-top: 20px;
}
.sidebar li {
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip {
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip {
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip {
  display: none;
}
.sidebar input {
  font-size: 15px;
  color: #fff;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input {
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #fff;
}
.sidebar.open .bx-search:hover {
  background: #1d1b31;
  color: #fff;
}
.sidebar .bx-search:hover {
  background: #fff;
  color: #11101d;
}
.sidebar li a {
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #11101d;
}
.sidebar li a:hover {
  background: #fff;
}
.sidebar li a .links_name {
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name {
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i {
  transition: all 0.5s ease;
  color: #11101d;
}
.sidebar li i {
  height: 50px;
  line-height: 50px;
  border-radius: 12px;
}
.sidebar li.profile {
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile {
  width: 250px;
}
.sidebar li .profile-details {
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img {
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job {
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job {
  font-size: 12px;
}
.sidebar .profile #log_out {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out {
  width: 50px;
  background: none;
}
.home-section {
  position: relative;
  background: #e4e9f7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section {
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text {
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px;
}
@media (max-width: 420px) {
  .sidebar li .tooltip {
    display: none;
  }
}
</style>
