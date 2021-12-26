<template>
    <div class="bg-gray-800 flex justify-center items-center py-4 rounded-b-md">
        <div class="w-44 flex justify-between">
            <button :class="[filter == null ? 'text-blue-500' : 'text-gray-500']" @click="updateTasks()">All</button>
            <button :class="[filter === 'active' ? 'text-blue-500' : 'text-gray-500']" @click="updateTasks('active')">Active</button>
            <button :class="[filter === 'completed' ? 'text-blue-500' : 'text-gray-500']" @click="updateTasks('completed')">Completed</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            filter: null
        }
    },
    methods:{
        updateTasks(filter){
            this.filter = filter
            this.$emit('clicked', filter)
        }
    }
}
</script>
