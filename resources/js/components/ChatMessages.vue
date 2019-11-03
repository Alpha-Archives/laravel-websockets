<template>
  <div id="container">
    <ul>
      <!-- <li v-bind:class="{ active: isActive }" :key="message.id" v-for="message in messages"> -->
      <li class="replies" :key="message.id" v-for="message in messages">
        <img src="imgs/avatar.jpg" alt />
        <p>
          {{ message.user.name }}
          <br />
          {{ message.message }}
        </p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["messages"],
  methods: {
    scrollToEnd: function() {
      var container = this.$el.querySelector("#container");
      container.scrollTop = container.scrollHeight;
    }
  },
  created() {
    this.scrollToEnd();
  }
};
</script>
