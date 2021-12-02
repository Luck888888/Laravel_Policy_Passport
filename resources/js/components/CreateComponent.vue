<template>
    <div class="w-25 mx-auto">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" id="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="age" id="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="job" id="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addVisitor" class="btn btn-primary" value="Добавить">
        </div>
        <SomeComponent :obj="obj"></SomeComponent>
    </div>
</template>

<script>
import SomeComponent from "./SomeComponent";
export default {
    name: "CreateComponent",

    data() {
        return {
            name: null,
            age: null,
            job: null,
            obj:{
                color:'red',
                number: 35,
                isPublished: false,
            }
        }
    },

    mounted() {
        //this.$parent.$refs.index.indexLog()
    },

    components:{
        SomeComponent,
    },

    methods: {
        addVisitor() {
            //console.log(this.name, this.age, this.job)
            axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.name = null
                    this.age = null
                    this.job = null
                    this.$parent.$refs.index.getVisitor()
                })
        }
    }
}
</script>

<style scoped>

</style>
