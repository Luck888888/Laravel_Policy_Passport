<template>
    <tr :class="this.$parent.isEdit(visitor.id) ? 'd-none' : ''">
        <th scope="row">{{ visitor.id }}</th>
        <td>{{ visitor.name }}</td>
        <td>{{ visitor.age }}</td>
        <td>{{ visitor.job }}</td>
        <td><a href="#" @click.prevent="changeEditVisitorId(visitor.id, visitor.name,visitor.age,visitor.job )"
               class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deleteVisitor(visitor.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<script>
export default {
    name: "ShowComponent",

    props: [
        'visitor'
    ],

    methods: {
        deleteVisitor(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.$parent.getVisitor()
                })
        },

        changeEditVisitorId(id, name, age, job) {
            this.$parent.editVisitorId = id
            let editName = `edit_${id}`
            let fullEditName = this.$parent.$refs[editName][0];
            fullEditName.name = name
            fullEditName.age = age
            fullEditName.job = job
        },
    }


}
</script>

<style scoped>

</style>
