<template>
  <div class="input-group wrap mb-2">
    <input
      class="ml-2 rounded"
      type="text"
      placeholder="Write your message..."
      v-model="newMessage"
      @keyup.enter="sendMessage"
      @keyup="sendTypingEvent"
    />
    <div class="input-group-append">
      <button id="btn-chat" @click="sendMessage" class="rounded m-1 submit">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"],

  data() {
    return {
      newMessage: ""
    };
  },

  methods: {
    sendTypingEvent() {
      Echo.join("chat").whisper("typing", this.user);
    },

    sendMessage() {
      this.$emit("messagesent", {
        user: this.user,
        message: this.newMessage
      });

      this.newMessage = "";
    }
  }
};
</script>
