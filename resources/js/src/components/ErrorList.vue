<script>
export default {
    name: "ErrorList",
    props: {
        errors: {
            type: Array,
            required: true,
        },
    },
}
</script>

<template>
    <p v-if="errors.length" class="text-danger">
        <b>Please correct the following error(s):</b>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </p>
</template>
