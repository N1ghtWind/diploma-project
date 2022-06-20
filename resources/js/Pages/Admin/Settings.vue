<template>
  <Layout sitename="Settings">
    <h1 class="text-gray-700">Settings</h1>
    <!-- <div class="flex w-3/5 flex-col gap-y-8">

        </div> -->
    <div>
      <VueApexCharts
        width="400"
        :options="chartOptions"
        :series="series"
      ></VueApexCharts>
    </div>
  </Layout>
</template>
<script>
import Layout from "../Layout.vue";
export default {
  components: {
    Layout,
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
