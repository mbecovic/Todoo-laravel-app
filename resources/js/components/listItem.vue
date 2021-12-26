<template>
    <div class="bg-gray-800 flex justify-center items-center py-6 border-b border-gray-500">
        <input class="rounded-full border mx-6 p-2 bg-transparent focus:ring-offset-0 focus:ring-0 cursor-pointer" type="checkbox" @change="updateTask()" v-model="task.done">
        <div class="flex-1 mr-4">
            <p class="text-gray-300" :class="[ task.done ? 'line-through text-gray-600' : '' ]">{{ task.title }}</p>
        </div>
        <div class="mx-4">
            <svg @click="deleteTask()" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    props: ['task'],
    methods:{
        updateTask(){
            axios.put('/api/tasks/' + this.task.id, {
                done: this.task.done
            }).then( response => {
                if (response === 200){
                    this.$emit('taskUpdated')
                }
                console.log(response)
            }).catch(error => {
                console.log(error)
            })
        },
        deleteTask() {
            if (confirm("Are you sure?")) {
                axios.delete('/api/tasks/' + this.task.id)
                    .then(response => {
                        if (response.status === 200) {
                            this.$emit('taskUpdated')
                            console.log(response)
                        }
                    })
                    .catch(error => (console.log(error)));
            }
        }
    }
}
</script>
