// window._ = require('lodash');


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}



// window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');
// const client = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-channels-key',
//     client: client
// });

// window.Echo = new Echo({
//     client: client,
//     // broadcaster: 'pusher',
//     //process.env.MIX_PUSHER_APP_KEY,
//     key: 'websocket',
//     wsHost: window.location.hostname,
//     wsPort: 6001,
// });

// Echo.channel('status-liked')
// // OrderShipped
// //App\\Events\\StatusLiked
// .listen('OrderShipped', (e) => {
//     console.log(e.order.name);
// });
