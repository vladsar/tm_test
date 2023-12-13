<script>
import ErrorList from "@/components/ErrorList.vue";

export default {
    name: "TaskEdit",
    components: {ErrorList},
    data() {
        return {
            errors: [],
            id: this.$route.params.id,
            task: {},
        };
    },
    methods: {
        async getTask() {
            const {data} = await axios.get(`/api/tasks/${this.id}`);
            this.task = data.data;
        },
        updateTask() {
            this.errors = [];

            if (!this.task.title) {
                this.errors.push("Title required.");
            }

            if (!this.task.description) {
                this.errors.push("Description required.");
            }

            if (this.errors.length > 0) {
                return;
            }

            axios.put("/api/tasks/" + this.task.id, {
                title: this.task.title,
                description: this.task.description,
                is_completed: this.task.is_completed,
            }).then(response => {
                this.$router.push({path: "/"});
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = Object.values(error.response.data.errors)
                        .reduce((acc, val) => acc.concat(val), []);
                }
            });
        },
        deleteTask() {
            if (!confirm("Are you sure you want to delete this task?")) {
                return;
            }

            axios.delete("/api/tasks/" + this.task.id)
                .then(response => {
                    this.$router.push({path: "/"});
                });
        },
    },
    beforeMount() {
        this.getTask();
    },
}
</script>

<template>
    <error-list :errors="errors"></error-list>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <router-link to="/" class="h4 m-0 text-decoration-none">Tasks</router-link>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h6">Edit task</h1>
                <button class="btn btn-sm btn-danger" @click.prevent="deleteTask">Delete</button>
            </div>

            <div class="mt-4 mb-3">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" type="text" v-model="task.title" id="title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" v-model="task.description" id="description"></textarea>
            </div>

            <input type="checkbox" v-model="task.is_completed" id="is_completed"/>
            <label for="is_completed" class="form-label ms-2 mb-4">Completed</label>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" @click.prevent="updateTask">Update</button>
                <router-link to="/" class="btn btn-light text-muted">Cancel</router-link>
            </div>
        </div>
    </div>
</template>
