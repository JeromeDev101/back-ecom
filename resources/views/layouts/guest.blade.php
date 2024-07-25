<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fonts Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="relative">
        <!-- Top Left Logo -->
        <img src="{{asset('images/ceit_logo.png')}}" alt="CEIT Logo" class="absolute z-10 hidden w-16 h-16 opacity-75 md:block top-4 left-4 md:w-24 md:h-24">

        <!-- Top Right Logo -->
        <img src="{{asset('images/cvsu_logo.png')}}" alt="CVSU Logo" class="absolute z-10 hidden w-16 h-16 opacity-75 md:block top-4 right-4 md:w-24 md:h-24">

        <div class="relative min-h-screen">
            <div class="absolute inset-0 bg-center bg-cover" style="background-image: url({{asset('images/bg1.jpeg')}});">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900 to-green-200 opacity-70"></div>
            </div>
            <div class="relative font-sans antialiased text-gray-900" >
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>
