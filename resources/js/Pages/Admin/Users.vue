<script setup>
import UserItem from './components/UserItem.vue';
import Pagination from "../components/Pagination.vue";
</script>

<template>

    <Head>
        <link rel="stylesheet" :href="css" />
    </Head>
    <Layout sitename="Users">
        <div class="px-4 max-w-2xl m-auto" v-if="$page.props.flash.error">
            <div v-for="(error, index) in $page.props.flash.error" :key="index"
                class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class="font-medium">{{ error }}</span>
            </div>
        </div>
        <header class="mn mr flex gap-4 items-center bg-gray-900">
            <h2 class="g_ text-slate-200"> All Users: <span class="yu gk">9</span></h2>
        </header>
        <div class='overflow-x-auto w-full'>
            <table class='mx-auto whitespace-nowrap m-0 w-full bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-900">
                    <!-- ID
                    PICTURE
                    NAME
                    EMAIL VERIFICATION DATE
                    REGISTRATION DATE:
                    USER TYPE: -->
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> ID </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> User </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Picture </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Email verification date </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Registration date </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> User type </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="(user, index) in users.data" :key="index">
                        <UserItem :user="user" />
                    </tr>
                </tbody>
            </table>
        </div>

        <Pagination :links="users.links" class="mt-6 flex justify-center"></Pagination>

    </Layout>



</template>
<script>
import Layout from "../Layout.vue";
export default {
    props: {
        css: {
            type: String,
            default: "",
        },
        users: {
            type: Object,
            default: () => ({}),
        },
        user_count: {
            type: Number,
            default: 0,
        },
    },
    components: {
        Layout,
    },

    mounted() {
        this.users.data.forEach((user) => {
            user.selected = false;
        });
    },
    data() {
        return {
            toggleSelectAll: false,
        };
    },
    methods: {

    },
};
</script>
