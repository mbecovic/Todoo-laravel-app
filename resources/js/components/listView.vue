<template>
    <div>
        <div class="first:pt-5" v-for="task in tasks">
            <list-item :task="task" v-on:taskUpdated="$emit('reloadList')"></list-item>
        </div>
    </div>
</template>

<script>
import ListItem from "./listItem";
export default {
    components: {ListItem},
    props: ['tasks'],
}
</script>
