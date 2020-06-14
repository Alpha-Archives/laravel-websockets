require("./bootstrap");

window.Vue = require("vue");

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    data: {
        messages: [],
        users: [],
    },

    created() {
        this.fetchMessages();

        Echo.join("chat")
            .here((users) => {
                this.users = users;
            })
            .joining((user) => {
                this.users.push(user);
            })
            .leaving((user) => {
                this.users = this.users.filter((u) => u.id !== user.id);
            })
            .listenForWhisper("typing", ({ id, name }) => {
                this.users.forEach((user, index) => {
                    if (user.id === id) {
                        user.typing = true;
                        this.$set(this.users, index, user);
                    }
                });
            })
            .listen("MessageSent", (event) => {
                this.messages.push({
                    message: event.message.message,
                    user: event.user,
                });

                this.users.forEach((user, index) => {
                    if (user.id === event.user.id) {
                        user.typing = false;
                        this.$set(this.users, index, user);
                    }
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get("/messages").then((response) => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post("/messages", message).then((response) => {
                console.log(response.data);
            });
        },
    },
});
