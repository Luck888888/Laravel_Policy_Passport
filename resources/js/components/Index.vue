<template>
  <div>
      <router-link :to="{name: 'visitor.index'}">Visitors</router-link>
      <router-link :to="{name: 'visitor.create'}">Add</router-link>
      <router-view></router-view>
  </div>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
