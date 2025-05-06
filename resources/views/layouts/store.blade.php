<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $store->name ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700|work-sans:400,600,700" rel="stylesheet" />

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
            <nav class="flex items-center justify-between">
                <a href="{{ route('welcome') }}" class="text-xl">
                    {{ $store->name }}
                </a>

                <div class="flex items-center gap-4">
                    <a
                        href="#"
                        class="inline-block px-5 py-1.5 border border-transparent hover:border-stone-300 rounded-sm text-sm leading-normal"
                    >
                        {{ __('Contact') }}
                    </a>

                    <a
                        href="#"
                        class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal"
                    >
                        {{ __('Share') }}
                    </a>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer>
            <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
                <p class="mt-10 text-center text-sm/6">
                    &copy; {{ date('Y') }} localpantry.shop. All rights reserved.
                </p>
            </div>
        </footer>
    </body>
</html>
