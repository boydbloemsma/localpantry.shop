<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,700|work-sans:400,600,700" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-50 text-stone-800 p-6 lg:p-8 min-h-screen font-sans">
        @include('layouts.navigation')

        <div class="py-10 bg-stone-100 rounded-xl min-h-screen">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Page Heading -->
                @isset($header)
                    <header class="pb-8">
                        {{ $header }}
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
