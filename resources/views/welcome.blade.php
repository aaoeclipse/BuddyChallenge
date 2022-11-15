<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-800">
    <div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-10 px-6 py-4 sm:block w-screen text-end">
                @auth
                    <a href="{{ url('/home') }}" class="text-lg text-gray-100 ">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-lg text-gray-100 ">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-lg text-gray-100 ">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="m-20">
        <div id="app">
            <h1 class="text-center text-3xl text-white font-bold py-10">Welcome!</h1>
            <example-component test="Vue Component with props"></example-component>
        </div>
    </div>


</body>

</html>
