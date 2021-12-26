<template>
    <div class="bg-gray-800 flex justify-center items-center my-4 py-5 rounded-md">
        <div class="rounded-full border bg-gray-500 mx-6 p-2 flex justify-center items-center"></div>
        <div class="flex-1">
            <input v-model="title" v-on:keyup.enter="addItem" class="pl-0 bg-transparent w-full border-0 focus:ring-0 focus:border-0" type="text" placeholder="Create a new task...">
<!--            <button class="p-2 text-white" v-on:keyup.enter="addItem" :class="[ title ? 'bg-green-500' : 'bg-gray-500' ]">Add Item</button>-->
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return {
            title: ""
        }
    },
    methods: {
        addItem(){
            if (this.title !== ""){
                axios.post('/api/tasks', {
                    title: this.title
                }).then( response => {
                    if (response.status === 200){
                        this.title = "";
                        this.$emit('reloadList');
                    }
                }).catch( error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>
