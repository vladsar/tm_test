<script>
import moment from "moment";

export default {
    name: "TaskListItem",
    props: {
        task: {
            type: Object,
            required: true,
        }
    },
    computed: {
        formattedDate() {
            return moment(this.task.created_at).format('MMMM Do, h:mm A');
        },
        completedClass() {
            return this.task.is_completed ? 'completed' : '';
        }
    },
    methods: {
        toggleCompleted() {
            const newIsCompleted = !this.task.is_completed;

            axios.put(`/api/tasks/${this.task.id}`, {
                is_completed: newIsCompleted,
            })
                .then(response => {
                    this.task.is_completed = newIsCompleted;
                })
                .catch(error => {
                    this.task.is_completed = !newIsCompleted;
                });
        }
    },
}
</script>

<template>
    <div :class="completedClass" class="list-group-item list-group-item-action py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="flex-fill checkbox-wrapper">
                <input type="checkbox"
                       v-model="task.is_completed" @click.prevent="toggleCompleted"/>
            </div>
            <div class="flex-fill min-w-0">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">{{ task.title }}</strong>
                    <small class="text-muted">{{ formattedDate }}</small>
                </div>
                <div class="col-10 mb-1 small text-ellipsis">{{ task.description }}</div>
                <router-link :to="'/tasks/' + task.id + '/edit'" class="edit-task-button float-right">Edit</router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-ellipsis {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.checkbox-wrapper {
    max-width: 30px;
    min-width: 30px;
}

.completed {
    text-decoration: line-through;
    color: #6c757d;
    background-color: #f8f9fa;
}

.min-w-0 {
    min-width: 0 !important;
}

.edit-task-button{
    position: absolute;
    right:15px;
    bottom:10px;
    color: #6c757d;
    font-size: 12px;
    text-decoration: none;
}
</style>
