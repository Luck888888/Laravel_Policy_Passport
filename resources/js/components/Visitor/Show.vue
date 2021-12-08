<template>
    <div v-if="person">
        <div>
            Name: {{ person.name }}
        </div>
        <div>
            Age: {{ person.age }}
        </div>
        <div>
            Job: {{ person.job }}
        </div>
        <router-link :to="{name: 'visitor.edit', params: { id: person.id}}"><a class="btn btn-outline-success">Edit</a>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "Show",

    mounted() {
        this.$store.dispatch('getVisitor', this.$route.params.id)
    },

    computed: {
        person() {
            return this.$store.getters.person
        }
    }

}
</script>

<style scoped>

</style>
