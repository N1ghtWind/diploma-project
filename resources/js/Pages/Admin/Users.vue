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

        <div class="bg-white by rounded-sm border border-slate-200">
            <header class="mn mr flex gap-4 items-center">
                <h2 class="g_ text-slate-800">
                    All Users: <span class="yu gk">{{ user_count }}</span>
                </h2>

            </header>
            <div>
                <div class="lz">
                    <table class="av oq">
                        <thead class="gb g_ gq text-slate-500 hq ck cx border-slate-200">
                            <tr>
                                <th class="v_ wk xe vm co ut">
                                    <span class="tc">Favourite</span>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">ID</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Picture</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_ text-center">Name</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Email verification date</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">Registration date:</div>
                                </th>
                                <th class="v_ wk xe vm co">
                                    <div class="g_">User type:</div>
                                </th>
                                <th class="v_ wk xe vm co"><span class="tc">Menu</span></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm lg lb">
                            <tr v-for="(user, index) in users.data" :key="index">
                                <UserItem :user="user" />
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
