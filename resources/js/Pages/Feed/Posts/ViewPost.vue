<template>

        <h1> Welcome to a Posts View</h1>

</template>
<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
export default{
    components: {AuthenticatedLayout},
    props:{
        userPost: Object
    },
    mounted() {
        console.log('post view mounted');
    }
}
</script>
