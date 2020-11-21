<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Single Service
            </h2>
        </template>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="w-full flex flex-wrap justify-start items-center p-2">
                    <div class="image order-0 w-full shadow"
                    :style="'background-image: url(' + service.image_url + ')'"
                    ></div>
                <h1 class="text-2xl font-bold my-2">{{service.title}}</h1>
                <div class="block w-full" v-html="service.discraption"></div>
                </div>
            </div>
        </div>
        </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props:{
        service: Object
    },
    components:{
        AppLayout
    }
}
</script>
<style scoped>
.image{
    background-position: center;
    background-size: cover;
    background-origin: border-box;
    background-repeat: no-repeat;
    height: 30rem;
}
</style>