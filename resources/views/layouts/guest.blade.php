<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel')  }} @if(!empty($title)) - {{ $title }} @endif</title>
        <meta name="description" content="{{ $description ?? __('Discover local artisans on localpantry.shop') }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
        <meta property="og:description" content="{{ $description ?? __('Discover local artisans on localpantry.shop') }}">
        <meta property="og:url" content="{{ url()->current() }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
        <meta name="twitter:description" content="{{ $description ?? __('Discover local artisans on localpantry.shop') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,700|work-sans:400,600,700" rel="stylesheet" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        @production
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" data-site="UJYTWJBR" defer></script>
            <!-- / Fathom -->
        @endproduction

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-50 text-stone-800 p-6 lg:p-8 min-h-screen font-sans">
        <header class="w-full text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between">
                    <a href="{{ route('welcome') }}" class="text-xl">
                        localpantry<span class="text-sm">.shop</span>
                    </a>

                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal"
                        >
                            {{ __('Dashboard') }}
                        </a>
                    @else
                        <div class="flex items-center gap-4">
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-1.5 border border-transparent hover:border-stone-300 rounded-sm text-sm leading-normal"
                            >
                                {{ __('Log in') }}
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal"
                                >
                                    {{ __('Register') }}
                                </a>
                            @endif
                        </div>
                    @endauth
                </nav>
            @endif
        </header>

        {{ $slot }}

        <footer>
            <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
                <nav class="-mb-6 flex flex-wrap justify-center gap-x-12 gap-y-3 text-sm/6" aria-label="Footer">
                    <a href="{{ route('about') }}" class="hover:text-stone-900">
                        {{ __('About') }}
                    </a>
                    <a href="{{ route('contact.create') }}" class="hover:text-stone-900">
                        {{ __('Contact') }}
                    </a>
                    <a href="{{ route('privacy') }}" class="hover:text-stone-900">
                        {{ __('Privacy Policy') }}
                    </a>
                    <a href="{{ route('terms') }}" class="hover:text-stone-900">
                        {{ __('Terms of Use') }}
                    </a>
                </nav>

                <p class="mt-10 text-center text-sm/6">
                    &copy; 2025 localpantry.shop. All rights reserved.
                </p>
            </div>
        </footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
