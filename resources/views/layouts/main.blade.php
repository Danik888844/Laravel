<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>

<div>
    <a href="{{ route('index') }}">Main</a>

    @auth()
        <div>
            <a href="{{ route('users.show', auth()->user()) }}">
                <b>{{ auth()->user()->name }}</b>
            </a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>Exit</button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}">Enter</a>

        @if(\Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif

    @endauth
</div>

@yield('content')
</body>
</html>
