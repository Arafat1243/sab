<template>
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <inertia-link :href="links[0].url || '#'" :class="links[0].url? 'text-blue-600 bg-white hover:text-gray-500 active:bg-gray-100 active:text-blue-600':'pointer-events-none text-gray-300'" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300  transition ease-in-out duration-150">
            {{links[0].label}}
            </inertia-link>
            <inertia-link :href="links[links.length - 1].url || '#'" :class="links[links.length - 1].url ? 'text-blue-600 bg-white hover:text-gray-500 active:bg-gray-100 active:text-blue-600':'pointer-events-none text-gray-300'" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300  transition ease-in-out duration-150">
            Next
            </inertia-link>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
            <p class="text-sm leading-5 text-gray-700">
                Total
                <span class="font-medium">{{total}}</span>
                results
            </p>
            </div>
            <div>
            <nav class="relative z-0 inline-flex shadow-sm">
                <inertia-link v-for="(link,i) in links" :key="i" :href="link.url || '#'" :class="activeClass(i,link,(links.length -1))" class="relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 transition ease-in-out duration-150" aria-label="Previous">
                    <!-- Heroicon name: chevron-left -->
                    <svg v-if="i == 0" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <!-- sim[le link] -->
                    <span v-if="(i != 0 && i != (links.length - 1))">{{link.label}}</span>
                    <!-- Heroicon name: chevron-right -->
                    <svg v-if="i == (links.length - 1)" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </inertia-link>
            </nav>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        links: Array,
        total: Number
    },
    methods:{
        activeClass(i,link,l){
            if(i == 0 || i == l){
                if(i == 0){
                    return 'pointer-events-none text-gray-300 rounded-l-md';
                }
                return 'pointer-events-none text-gray-300 rounded-r-md';
            }else{
                return link.active ? 'text-blue-700 hover:text-blue-700' : 'text-gray-700 hover:text-grey-500'
            }
        }
    }
}
</script>