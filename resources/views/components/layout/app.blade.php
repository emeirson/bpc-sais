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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">

    <x-layout.nav />

    <x-layout.sidebar />

    <main class="md:ml-64 h-auto pt-16">
        @if (session('success'))
            <x-shared.success-banner message="{{ session('success') }}" />
        @endif
        {{ $slot }}
    </main>


    @livewireScripts
</body>

</html>
