@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Echo.channel('status-liked')
    // // OrderShipped
    // //App\\Events\\StatusLiked
    // .listen('OrderShipped', (e) => {
    //     console.log(e.order.name);
    // });

    Echo.channel('status-liked')
    .listen('OrderShipped', (e) => {
        //
        console.log(e);

    });
</script>
@endsection
