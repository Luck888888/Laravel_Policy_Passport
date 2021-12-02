<template>
<div>
    <div>Color:{{ obj.color }}</div>
    <div>Number:{{ obj.number }}</div>
    <div>Is published:{{ obj.isPublished ? 'Published' :'Not published'}}</div>
</div>
</template>

<script>
export default {
    name: "SomeComponent",

    data(){
        return{}
    },

    props:[
        'obj'
    ],


}
</script>

<style scoped>

</style>
