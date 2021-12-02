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
                <ShowComponent :visitor="visitor"></ShowComponent>
                <EditComponent :visitor="visitor" :ref="`edit_${visitor.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent";
import ShowComponent from "./ShowComponent";

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

    components: {
        EditComponent,
        ShowComponent
    },

    methods: {
        getVisitor() {
            axios.get('/api/people')
                .then(res => {
                    this.visitors = res.data
                })
        },

        changeEditVisitorId(id, name, age, job) {
            this.editVisitorId = id
            let editName = `edit_${id}`
            let fullEditName = this.$refs[editName][0];
            fullEditName.name = name
            fullEditName.age = age
            fullEditName.job = job
        },

        isEdit(id) {
            return this.editVisitorId === id
        },

        indexLog() {
            console.log('this is index component');
        }
    }
}
</script>

<style scoped>

</style>
