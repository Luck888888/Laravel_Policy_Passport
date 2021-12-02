<template>
    <div>
        <SinglePostComponent></SinglePostComponent>
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>

    </div>
</template>

<script>
import SinglePostComponent from "./SinglePostComponent";
import CreateComponent from "./CreateComponent";
import IndexComponent from "./IndexComponent";

export default {
    name: "PostComponent",

    data() {
        return {}
    },

    mounted() {
        console.log(this.$refs);

    },

    methods:{
        parentLog(){
            console.log('this is parent component');
        }
    },

    components: {
        SinglePostComponent,
        CreateComponent,
        IndexComponent
    },

}
</script>

<style scoped>

</style>
