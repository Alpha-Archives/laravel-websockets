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
import { forEach } from "lodash";

window.Pusher = require("pusher-js");

Pusher.logToConsole = true;
window.Echo = new Echo({
    broadcaster: "pusher",
    key: "websocket",
    encrypted: false,
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: false
});

// listen for event
window.Echo.channel("status-liked").listen("OrderShipped", event => {
    console.log("dfasdfasdf");
    console.log(event.message);
});

let notificationCount = 0;
let notificationsWrapper = $("#notifications");
let notification_counter = $("#notification_count");

prevNotifications.forEach(element => {
    notificationCount++;
    console.log(element);

    notificationsWrapper.append(
        `<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
  <i class="fas fa-envelope mr-2"></i> ${element.data.message}
  <span class="float-right text-muted text-sm">3 mins</span>
</a>
`
    );

    notification_counter.html(notificationCount);
});

// listen for notifications
window.Echo.private(`App.User.${uid}`).notification(notification => {
    // window.Echo.private(`App.User.1`).notification(notification => {
    // console.log(notification.type);
    // console.log(notification);
    notificationCount++;
    notificationsWrapper.append(
        `<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
  <i class="fas fa-envelope mr-2"></i> ${notification.message}
  <span class="float-right text-muted text-sm">3 mins</span>
</a>
`
    );
});
