
<script setup>
import Layout from "../Layout.vue";
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

</script>

<template>
    <Layout sitename="Admin">
        <h1 class="text-gray-700">Dashboard</h1>
        <div style="width: 95%;">
            <Bar :chart-options="chartOptions" :chart-data="chartData" :chart-id="chartId"
                :dataset-id-key="datasetIdKey" :plugins="plugins" :css-classes="cssClasses" :styles="styles"
                :width="width" :height="height" />
        </div>
        <div>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="px-4 py-5 bg-indigo-400 shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-300 truncate">
                        Order Count
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-200">
                        {{ count_order }}
                    </dd>
                </div>
                <div class="px-4 py-5 bg-indigo-400 shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-300 truncate">
                        Product Count
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-200">
                        {{ count_product }}
                    </dd>
                </div>
                <div class="px-4 py-5 bg-indigo-400 shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-300 truncate">
                        User Count
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-200">
                        {{ count_user }}
                    </dd>
                </div>
            </dl>
        </div>

    </Layout>
</template>
<script>
export default {
    props: {
        get_daily_created_orders_last_week: {
            type: Object,
            required: true,
        },
        count_order: {
            type: Number,
            required: true,
        },
        count_product: {
            type: Number,
            required: true,
        },
        count_user: {
            type: Number,
            required: true,
        },
        chartId: {
            type: String,
            default: 'bar-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        width: {
            type: Number,
            default: 400
        },
        height: {
            type: Number,
            default: 400
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => { }
        },
        plugins: {
            type: Array,
            default: () => []
        }


    },
    components: {
        Layout,
    },
    mounted() {
    },
    data() {
        return {
            toggleActive: false,
            chartData: {
                labels: this.get_daily_created_orders_last_week.map(item => {
                    return item.date
                }),

                datasets: [
                    {
                        label: 'Daily Created Orders Last Week',
                        backgroundColor: '#8da2fb',
                        data: this.get_daily_created_orders_last_week.map(item => {
                            return item.count
                        })
                    }
                ]
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false
            }


        };
    },

    methods: {
        toggleSideBar() {
            this.toggleActive = !this.toggleActive;
        },
    },
};
</script>
