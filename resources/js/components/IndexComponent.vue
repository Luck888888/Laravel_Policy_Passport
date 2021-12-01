<template>
    <div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="visitor in visitors">
                <tr :class="isEdit(visitor.id) ? 'd-none' : ''">
                    <th scope="row">{{ visitor.id }}</th>
                    <td>{{ visitor.name }}</td>
                    <td>{{ visitor.age }}</td>
                    <td>{{ visitor.job }}</td>
                    <td><a href="#"
                           @click.prevent="changeEditVisitorId(visitor.id, visitor.name,visitor.age,visitor.job )"
                           class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deleteVisitor(visitor.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(visitor.id) ? '' : 'd-none'">
                    <th scope="row">{{ visitor.id }}</th>
                    <td><input type="text" v-model="name" class="form-control"></td>
                    <td><input type="number" v-model="age" class="form-control"></td>
                    <td><input type="text" v-model="job" class="form-control"></td>
                    <td><a href="#" @click.prevent="updateVisitor(visitor.id)" class="btn btn-success">Update</a></td>
                    <td><a href="#" @click.prevent="deleteVisitor(visitor.id)" class="btn btn-danger">Delete</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            visitors: null,
            editVisitorId: null,
            name: null,
            age: null,
            job: null
        }
    },

    mounted() {
        this.getVisitor()
    },

    methods: {
        getVisitor() {
            axios.get('/api/people')
                .then(res => {
                    this.visitors = res.data
                })
        },

        updateVisitor(id) {
            this.editVisitorId = null
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.getVisitor()
                })
        },

        deleteVisitor(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.getVisitor()
                })
        },

        changeEditVisitorId(id, name, age, job) {
            this.editVisitorId = id
            this.name = name
            this.age = age
            this.job = job
        },

        isEdit(id) {
            return this.editVisitorId === id
        }
    }
}
</script>

<style scoped>

</style>
