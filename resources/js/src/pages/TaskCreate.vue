<script>
import ErrorList from "@/components/ErrorList.vue";

export default {
    name: "TaskCreate",
    components: {ErrorList},
    data() {
        return {
            errors: [],
            title: "",
            description: "",
        };
    },
    methods: {
        createTask() {
            this.errors = [];

            if (!this.title) {
                this.errors.push("Title required.");
            }

            if (!this.description) {
                this.errors.push("Description required.");
            }

            if (this.errors.length > 0) {
                return;
            }

            axios.post("/api/tasks", {
                title: this.title,
                description: this.description,
            }).then(response => {
                this.$router.push({path: "/"});
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = Object.values(error.response.data.errors)
                        .reduce((acc, val) => acc.concat(val), []);
                }
            });
        },
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
            <h1 class="h6">Create a new task</h1>

            <div class="mt-4 mb-3">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" type="text" v-model="title" id="title">
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" v-model="description" id="description"></textarea>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" @click.prevent="createTask">Create</button>
                <router-link to="/" class="btn btn-light text-muted">Cancel</router-link>
            </div>
        </div>
    </div>
</template>
