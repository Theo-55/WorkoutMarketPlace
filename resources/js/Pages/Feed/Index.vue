<template>
    <authenticated-layout>

    <div class="grid grid-cols-1" v-for="post in posts">
        <div class="flex justify-center my-12">
            <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center" >
                <div class="py-3 px-6 border-b border-gray-300">
                    {{ post.Title }}
                </div>
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
    </authenticated-layout>

</template>

<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {AuthenticatedLayout, Link},
    props: {
      posts: {
          type: Object
      },
        name: {
          type: String,
        }
    },
    mounted() {
        console.log('Hello');
    }
};

</script>
