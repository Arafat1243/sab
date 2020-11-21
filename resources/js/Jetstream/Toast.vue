<template>
    <transition name="slide-fade">
        <div v-if="toast && visible && !popstate" class="fixed flex max-w-xs w-full mt-4 mr-4 top-0 right-0 bg-red-500 rounded shadow p-4 text-white z-50" :class="toast.success ? 'bg-indigo-400' : 'bg-error-500'">
            <div class="mr-2">
                <icon aclass="w-6 h-6" :name="toast.success ? 'check' : 'error'"></icon>
            </div>
            <div class="flex-1">{{toast.message}}</div>
            <div class="ml-2">
                <button @click="visible = false" class="align-top focus:outline-none">
                    <icon name="close" aclass="w-6 h-6"></icon>
                </button>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    props:{
        toast: Object,
        popstate: Boolean
    },
    data(){
        return {
            visible: false,
            timeout: ''
        }
    },
    watch:{
        toast:{
            deep: true,
            handler(){
                this.visible = true
                if(this.timeout){
                    clearTimeout(this.timeout);
                }
                this.timeout = setTimeout(() => this.visible = false,2000)
            }
        }
    }
}
</script>
<style scoped>
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(150px);
  opacity: 0;
}
</style>