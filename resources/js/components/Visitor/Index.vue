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
            <tr v-for="visitor in visitors">
                <th scope="row">{{ visitor.id }}</th>
                <td>
                    <router-link :to="{name: 'visitor.show', params: {id: visitor.id}}"> {{ visitor.name }}</router-link>
                </td>
                <td>{{ visitor.age }}</td>
                <td>{{ visitor.job }}</td>
                <td>
                    <router-link :to="{name: 'visitor.edit', params: { id: visitor.id}}">Edit</router-link>
                </td>
                <td>
                    <a @click.prevent="deleteVisitor(visitor.id)" href="#" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            visitors: null,
        }
    },

    mounted() {
        this.getVisitors()
    },

    methods: {
        getVisitors() {
            axios.get('api/people')
                .then(res => {
                    this.visitors = res.data.data
                })
        },

        deleteVisitor(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.getVisitors()
                })
        }
    }
}
</script>

<style scoped>

</style>
