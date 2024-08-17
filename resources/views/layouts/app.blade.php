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
        request()->routeIs('recommendations.create');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($tittle) ? $tittle . ' / ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.cdnfonts.com/css/ica-rubrik-black');
        @import url('https://fonts.cdnfonts.com/css/poppins');

        .custom3d-slide {
            background-color: #D2D2D2;
            background-image:
                repeating-linear-gradient(to right, transparent 0 100px,
                    #25283b22 100px 101px),
                repeating-linear-gradient(to bottom, transparent 0 100px,
                    #25283b22 100px 101px);
        }

        .custom3d-slide::before {
            position: absolute;
            width: min(1400px, 90vw);
            top: 10%;
            left: 50%;
            height: 90%;
            transform: translateX(-50%);
            content: '';
            background-image: url(images/bg.png);
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: top center;
            pointer-events: none;
        }


        .banner {
            width: 100%;
            height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .banner .slider {
            position: absolute;
            width: 180px;
            height: 200px;
            top: 10%;
            left: calc(50% - 100px);
            transform-style: preserve-3d;
            transform: perspective(1000px);
            animation: autoRun 20s linear infinite;
            z-index: 2;
        }

        @keyframes autoRun {
            from {
                transform: perspective(1000px) rotateX(-16deg) rotateY(0deg);
            }

            to {
                transform: perspective(1000px) rotateX(-16deg) rotateY(360deg);
            }
        }

        .banner .slider .item {
            position: absolute;
            inset: 0 0 0 0;
            transform:
                rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg)) translateZ(450px);
        }

        .banner .slider .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner .content {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: min(1080px, 100%);
            height: max-content;
            padding-bottom: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            z-index: 1;
        }

        .banner .content h1 {
            font-family: 'ICA Rubrik';
            font-size: 10em;
            line-height: 1em;
            color: #25283B;
            position: relative;
        }

        .banner .content h1::after {
            position: absolute;
            inset: 0 0 0 0;
            content: attr(data-content);
            z-index: 2;
            -webkit-text-stroke: 2px #d2d2d2;
            color: transparent;
        }

        .banner .content .author {
            font-family: Poppins;
            text-align: right;
            max-width: 200px;
        }

        .banner .content h2 {
            font-size: 3em;
        }

        .banner .content .model {
            background-image: url('images/model.png');
            width: 100%;
            height: 75vh;
            position: absolute;
            bottom: 0;
            left: 0;
            background-size: auto 130%;
            background-repeat: no-repeat;
            background-position: top center;
            z-index: 1;
        }

        @media screen and (max-width: 1023px) {
            .banner .slider {
                width: 160px;
                height: 200px;
                left: calc(50% - 80px);
            }

            .banner .slider .item {
                transform:
                    rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg)) translateZ(300px);
            }

            .banner .content h1 {
                text-align: center;
                width: 100%;
                text-shadow: 0 10px 20px #000000b0;
                font-size: 7em;
            }

            .banner .content .author {
                color: #fff;
                padding: 20px;
                text-shadow: 0 10px 20px #000;
                z-index: 2;
                max-width: unset;
                width: 100%;
                text-align: center;
                padding: 0 30px;
            }
        }

        @media screen and (max-width: 767px) {
            .banner .slider {
                width: 100px;
                height: 150px;
                left: calc(50% - 50px);
            }

            .banner .slider .item {
                transform:
                    rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg)) translateZ(180px);
            }

            .banner .content h1 {
                font-size: 4em;
            }
        }
    </style>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
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

        @include('layouts.footer')
    </div>
</body>

</html>
