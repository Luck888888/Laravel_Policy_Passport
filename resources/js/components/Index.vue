<template>
    <div>
        <router-link :to="{name: 'visitor.index'}"><a class="btn btn-outline-primary btn-lg">Пользователи</a>
        </router-link>
        <router-link :to="{name: 'visitor.create'}"><a class="btn btn-outline-primary btn-lg">Добавить</a></router-link>
        <div class="mb-3"></div>
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
