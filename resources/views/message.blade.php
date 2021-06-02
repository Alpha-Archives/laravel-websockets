<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    {{-- <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" /> --}}
    {{-- <link rel="stylesheet prefetch" --}}
        {{-- href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" /> --}}
</head>

<body>
     <div id="frame">
        <div id="sidepanel">
            <div id="contacts">
                <ul>
                    <li class="contact border-bottom" v-for="user in users">
                        <div class="wrap">
                            <span class="contact-status online"></span>
                            <img src="{{ asset('imgs/avatar.jpg')}}" alt="" />
                            <div class="meta">
                                <p class="name"> @{{ user.name }} <code v-if="user.typing">is typing</code></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="content">
            <div class="messages">
                <chat-messages :messages="messages"></chat-messages>
            </div>
            <div class="message-input">
                <chat-form @messagesent="addMessage" :user="{{ auth()->user() }}"></chat-form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script>
        // $(window).load(function() {
          $('.messages').animate({ scrollTop: $(document).height() }, 'fast');
        //   $('.messages').animate({ scrollTop: $(document).height() }, 'fast');
        // });
    </script>
</body>

</html>
