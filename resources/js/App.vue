<template>
    <div id="app">
        <transition>
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
  export default {
    name: 'App'
  }
</script>

<style scoped>
.v-enter-active, .v-leave-active {
  transition: opacity .5s
}
.v-enter, .v-leave-to {
  opacity: 0
}
</style>