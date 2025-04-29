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
        <header class="w-full text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 border border-transparent hover:border-stone-300 rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        {{ $slot }}

        <footer>
            <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
                <nav class="-mb-6 flex flex-wrap justify-center gap-x-12 gap-y-3 text-sm/6" aria-label="Footer">
                    <a href="#" class="hover:text-stone-900">About</a>
                    <a href="#" class="hover:text-stone-900">Blog</a>
                    <a href="#" class="hover:text-stone-900">Jobs</a>
                    <a href="#" class="hover:text-stone-900">Press</a>
                    <a href="#" class="hover:text-stone-900">Accessibility</a>
                    <a href="#" class="hover:text-stone-900">Partners</a>
                </nav>

                <p class="mt-10 text-center text-sm/6">
                    &copy; {{ date('Y') }} localpantry.shop. All rights reserved.
                </p>
            </div>
        </footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
