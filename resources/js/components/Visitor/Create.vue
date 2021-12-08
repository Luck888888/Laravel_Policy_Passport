<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" v-model="name" placeholder="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" v-model="age" placeholder="age" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" v-model="job" placeholder="job" class="form-control">
        </div>
        <div class="mb-3">
            <input :disabled="!isDisabled" @click.prevent="$store.dispatch('store',{name: name, age: age, job: job})"
                   type="submit" value="Add" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
export default {
    name: "Create",

    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },

    methods: {},

    computed: {
        isDisabled() {
            return this.name && this.age && this.job
        }
    }

}
</script>

<style scoped>

</style>
