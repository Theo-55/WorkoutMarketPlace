<template>

        <authenticated-layout>
            <h1> {{post.body}}</h1>
        </authenticated-layout>

</template>
<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default{
    components: {AuthenticatedLayout},
    props:{
        post: {
            type: Object
        }
    },
    mounted() {
        console.log(this.post.body);
    }
}
</script>
