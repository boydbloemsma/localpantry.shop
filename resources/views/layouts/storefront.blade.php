<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{ $meta }}

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
            <nav class="flex items-center justify-between" x-data="{ showToast: false }">
                @if(!empty($logo))
                    {{ $logo }}
                @else
                    <a href="{{ route('welcome') }}" class="text-xl">
                        {{ config('app.name') ?? 'Laravel' }}
                    </a>
                @endif

                <button
                    class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal"
                    @click="
                    if (navigator.share) {
                        navigator.share({ title: document.title, url: window.location.href }).catch(console.error);
                    } else {
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            showToast = true;
                            setTimeout(() => showToast = false, 2000);
                        });
                    }
                "
                >
                    {{ __('Share') }}
                </button>

                <div
                    x-show="showToast"
                    x-transition
                    class="fixed bottom-4 right-4 bg-stone-700 text-white text-sm px-4 py-2 rounded shadow-lg z-50"
                    style="display: none;"
                >
                    {{ __('Link copied to clipboard') }}
                </div>
            </nav>
        </header>

        {{ $slot }}

        <footer>
            <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
                <p class="mt-10 text-center text-sm/6">
                    &copy; 2025 localpantry.shop. All rights reserved.
                </p>
            </div>
        </footer>
    </body>
</html>
