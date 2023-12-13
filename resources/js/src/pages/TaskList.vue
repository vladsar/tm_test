<script>
import TaskListItem from "@/components/TaskListItem.vue";

export default {
    name: "TaskList",
    components: {
        TaskListItem,
    },
    data() {
        return {
            tasks: {},
        };
    },
    methods: {
        async getTasks() {
            const {data} = await axios.get("/api/tasks");
            this.tasks = data.data;
        },
    },
    beforeMount() {
        this.getTasks();
    },
}
</script>

<template>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Tasks</h4>
        <router-link to="/tasks/create" class="btn btn-sm btn-primary">Create task</router-link>
    </div>
    <div class="bg-white list-group border-bottom">
        <task-list-item v-for="task in tasks" :task="task"></task-list-item>
    </div>
</template>
