<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="visitor in people">
                <th scope="row">{{ visitor.id }}</th>
                <td>
                    <router-link :to="{name: 'visitor.show', params: {id: visitor.id}}"> {{
                            visitor.name
                        }}
                    </router-link>
                </td>
                <td>{{ visitor.age }}</td>
                <td>{{ visitor.job }}</td>
                <td>
                    <router-link :to="{name: 'visitor.edit', params: { id: visitor.id}}">Edit</router-link>
                </td>
                <td>
                    <a @click.prevent="$store.dispatch('deleteVisitor',visitor.id)" href="#"
                       class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",

    mounted() {
        this.$store.dispatch('getPeople')
    },

    methods: {},

    computed: {
        people() {
            return this.$store.getters.people
        }
    }
}
</script>

<style scoped>

</style>
