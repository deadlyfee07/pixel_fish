<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PIXEL FISH')</title>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-background text-on-surface font-body-md text-body-md min-h-screen flex flex-col">
    @auth
        @include('layouts.navbar')
    @endauth

    <div class="flex flex-1 overflow-hidden relative @auth pt-20 @endauth max-w-[1440px] mx-auto min-h-screen w-full">
        @auth
            @include('layouts.sidebar')
        @endauth

        <main class="@auth flex-1 md:ml-64 px-4 py-6 md:p-margin-lg bg-background w-full overflow-y-auto @endauth">
            @yield('content')
        </main>
    </div>

    @stack('footer')
</body>
</html>
