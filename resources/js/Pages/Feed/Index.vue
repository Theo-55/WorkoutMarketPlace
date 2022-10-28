<template>
    <authenticated-layout>
        <div class="w-2/4 mx-auto mt-10">
            <search @search="getSearch"></search>
        </div>
    <div class="grid grid-cols-1" v-for="post in posts.data" :key="post.id">
        <div class="flex justify-center my-12">
            <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center" >
                <div class="py-3 px-6 border-b border-gray-300">
                    {{ post.Title }}
                </div>
                <svg class="h-8 w-8 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 11v 8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" /></svg>
                <div class="p-6" >
                    <h5 class="text-gray-900 text-xl font-medium mb-2"></h5>
                    <p class="text-gray-700 text-base mb-4">
                        {{ post.body }}
                    </p>
                    <Link
                        type="button"
                        :href="route('view.Post', { id: post.id})"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    >View</Link>

                </div>
                <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                    2 days ago
                </div>
            </div>
        </div>
    </div>

        <div class="mt-4 mx-auto " >
                <Link
                    class="px-1"
                    v-for="link in posts.links"
                    :href="link.url"
                    v-html="link.label"
                />

        </div>
    </authenticated-layout>

</template>

<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from '@inertiajs/inertia-vue3';
import Search from "@/Pages/Feed/Partials/Search.vue"
export default {
    components: {AuthenticatedLayout, Link, Search},
    props: {
      posts: {
          type: Object
      }
    },
    mounted() {
        console.log('Hello');
    }
};

</script>
