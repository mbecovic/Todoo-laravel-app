<template>
    <div>
        <h1 class="text-4xl tracking-widest my-5">TODO</h1>
        <add-item-form v-on:reloadList="fetchAllTasks()"></add-item-form>
        <list-view :tasks="tasks" v-on:reloadList="fetchAllTasks()"></list-view>
        <items-filter @clicked="fetchAllTasks"></items-filter>
        <p class="text-center my-2">Press Enter to create a task!</p>
    </div>
</template>

<script>
import ListView from "./listView";
import AddItemForm from "./addItemForm";
import ItemsFilter from "./itemsFilter";
export default {
    components: {
        ItemsFilter,
        AddItemForm,
        ListView
    },
    mounted() {
        this.fetchAllTasks();
    },
    data() {
        return {
              tasks: []
        }
    },
    created() {
        this.fetchAllTasks();
    },
    methods: {
        fetchAllTasks(filter=null){
            console.log(filter)
            axios.get('/api/tasks?filter='+ filter)
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>
