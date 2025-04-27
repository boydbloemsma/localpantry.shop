<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $store->name ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
<header class="p-4 bg-white shadow-md">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">{{ $store->name ?? 'LocalPantry' }}</h1>
    </div>
</header>

<main class="max-w-6xl mx-auto mt-8 p-4">
    @yield('content')
</main>

<footer class="p-4 mt-12 text-center text-sm text-gray-500">
    &copy; {{ date('Y') }} LocalPantry
</footer>
</body>
</html>

