<template>

    <tr :class="this.$parent.isEdit(visitor.id) ? '' : 'd-none'">
        <th scope="row">{{ visitor.id }}</th>
        <td><input type="text" v-model="name" class="form-control"></td>
        <td><input type="number" v-model="age" class="form-control"></td>
        <td><input type="text" v-model="job" class="form-control"></td>
        <td><a href="#" @click.prevent="updateVisitor(visitor.id)" class="btn btn-success">Update</a></td>
        <td><a href="#" @click.prevent="deleteVisitor(visitor.id)" class="btn btn-danger">Delete</a></td>
    </tr>

</template>

<script>
export default {
    name: "EditComponent",

    props: [
        'visitor'
    ],

    data() {
        return {
            name: null,
            age: null,
            job: null
        }
    },

    methods: {

        updateVisitor(id) {
            this.$parent.editVisitorId = null
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.$parent.getVisitor()
                })
        },

        deleteVisitor(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.$parent.getVisitor()
                })
        },

    }

}
</script>

<style scoped>

</style>
