<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Muslim project</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

    </head>
    <body>
        <div class="wrapper home-outter">
            <div class="navbaar">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/home') }}" >Home</a>
                        @else
                            <a href="{{ url('/login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <div class="content">
                <h4> Welcome to Muslim project!</h4>
            </div>
        </div>
    </body>
</html>
