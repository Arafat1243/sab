<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Single Project 
            </h2>
        </template>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="w-full flex flex-wrap justify-start items-center p-2">
                    <div class="image order-0 w-full shadow rounded"
                    :style="'background-image: url(' + project.image_url + ')'"
                    ></div>
                <h1 class="text-2xl font-bold my-2 flex justify-start items-center">{{project.title}}
                     <samp class="rounded-3xl text-white px-2 py-1 text-center text-sm ml-2" :class="getStatus(project.status,project.deleted_at).color">
                        {{getStatus(project.status,project.deleted_at).text}}
                    </samp>
                </h1>
                <div class="block w-full" v-html="project.discraption"></div>
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
        project: Object
    },
    methods:{
        getStatus(status, deleted_at){
      let content = {};
      if(deleted_at !== null){
        content.color = 'bg-red-500';
        content.text = 'Deactivate';
      }else{
        if(status){
          content.color = 'bg-indigo-500';
          content.text = 'Completed';
        }else{
          content.color = 'bg-yellow-500';
          content.text = 'Ongoing';
        }
      }
      return content;
    }
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