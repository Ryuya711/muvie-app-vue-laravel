<template>
  <div>
    <h2>{{ message }}</h2>
    <button @click="changeMessage">メッセージを変える</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: '初めまして！'
    }
  },
  methods: {
    changeMessage() {
      this.message = 'こんにちは、Vue.js！';
    }
  }
}
</script>

<style scoped>
button {
  margin-top: 10px;
  padding: 5px 10px;
}
</style>