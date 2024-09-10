<!-- Developed by Moh Nurul Cholil & Fitria Susanti, 2024 -->
@php
    $rute =
        request()->routeIs('home') ||
        request()->routeIs('posts.index') ||
        request()->routeIs('profile.*') ||
        request()->routeIs('posts.show') ||
        request()->routeIs('members.show') ||
        request()->routeIs('members.index') ||
        request()->routeIs('members.category') ||
        request()->routeIs('rules.show') ||
        request()->routeIs('rules.index') ||
        request()->routeIs('aspirations.create') ||
        request()->routeIs('recommendations.create') ||
        request()->routeIs('abouts.index');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Nurl_Chl & Fitriasnt__">
    <meta name="description" content="Ini adalah website yang dikembangkan oleh Nurl_Chl & Fitriasnt__">

    <title>{{ isset($tittle) ? $tittle . ' / ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased selection:bg-emerald-500 selection:text-white">
    
    <div class="min-h-screen bg-gray-100" x-show="!loading">
        @include('components.loading')
        @if ($rute)
            @include('layouts.navigation')
        @endif

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @if (session()->has('success'))
            <x-alert>{{ session('success') }}</x-alert>
        @endif

        @if (session()->has('error'))
            <x-alert-error>{{ session('error') }}</x-alert-error>
        @endif

        @include('layouts.footer')
        @include('components.back-to-top')
    </div>
</body>

</html>
