<template>
    <div class="wrapper container m-auto p-4">
        <div class="task-list-wrapper d-flex flex-column">
            <router-view/>
        </div>
    </div>
</template>

<style scoped>
.wrapper {
    max-width: 600px;
    margin: auto;
    padding: 30px 0 20px 0;
}
</style>
