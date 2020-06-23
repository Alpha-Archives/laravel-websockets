try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");
    require("overlayscrollbars");
    require("../../vendor/almasaeed2010/adminlte/dist/js/adminlte");

    require("bootstrap");
} catch (e) {
    console.log(e);
}

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "websocket",
    encrypted: false,
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: false
});

window.Echo.channel("status-liked").listen("OrderShipped", event => {
    console.log("dfasdfasdf");
    console.log(event.message);
});

// window.Echo.private(`App.User.${uid}`).notification(notification => {
window.Echo.private(`App.User.1`).notification(notification => {
    // console.log(notification.type);
    console.log(notification.type);
});
