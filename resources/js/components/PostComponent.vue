<template>
    <div>
        <SinglePostComponent></SinglePostComponent>
        <CreateComponent></CreateComponent>
        <IndexComponent></IndexComponent>

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

    components: {
        SinglePostComponent,
        CreateComponent,
        IndexComponent
    },

}
</script>

<style scoped>

</style>
