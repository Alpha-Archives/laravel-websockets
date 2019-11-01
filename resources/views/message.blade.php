<!DOCTYPE html>
<html class="">

<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex" />

    <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
    <link rel="stylesheet prefetch"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
</head>

<body>
    <div id="frame">
        <div id="sidepanel">
            <div class="p-3" id="profile">
                <div class="wrap">
                    <img id="profile-img" src="{{ asset('imgs/avatar.jpg')}}" class="online" alt="" />
                    <p>Mike Ross</p>
                </div>
            </div>

            <div class="border-bottom"></div>

            <div id="contacts">
                <ul>
                    <li class="contact border-bottom">
                        <div class="wrap">
                            <span class="contact-status online"></span>
                            <img src="{{ asset('imgs/avatar.jpg')}}" alt="" />
                            <div class="meta">
                                <p class="name">Louis Litt <code>is typing</code></p>
                            </div>
                        </div>
                    </li>
                    <li class="contact border-bottom">
                        <div class="wrap">
                            <span class="contact-status online"></span>
                            <img src="{{ asset('imgs/avatar.jpg')}}" alt="" />
                            <div class="meta">
                                <p class="name">Harvey Specter <code>is typing</code></p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
        <div class="content">
            <div class="messages">
                <ul>
                    <li class="sent">
                        <img src="{{ asset('imgs/avatar.jpg')}}" alt="" />
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!
                        </p>
                    </li>
                    <li class="replies">
                        <img src="{{ asset('imgs/avatar.jpg')}}" alt="" />
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                    </li>
                </ul>
            </div>
            <div class="message-input">
                <div class="input-group wrap mb-2">
                    <input class="ml-2 rounded" type="text" placeholder="Write your message..." />
                    <div class="input-group-append">
                        <button class="rounded m-1 submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('.messages').animate({ scrollTop: $(document).height() }, 'fast');
    </script>
</body>

</html>
