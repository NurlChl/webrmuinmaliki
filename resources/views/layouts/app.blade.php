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
            background-color: #d2d2d2;
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

            .banner .content {
                padding-bottom: 50px;
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

            .banner {
                height: 50vh;
            }

            .banner .slider {
                width: 100px;
                height: 150px;
                left: calc(50% - 50px);
            }

            .banner .slider .item {
                transform:
                    rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg)) translateZ(200px);
            }

            .banner .content h1 {
                font-size: 4em;
            }
        }

        @media screen and (max-width: 425px) {

            .banner {
                height: 40vh;
            }

            .banner .slider {
                width: 80px;
                height: 120px;
                left: calc(50% - 50px);
            }

            .banner .slider .item {
                transform:
                    rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg)) translateZ(140px);
            }
        }
    </style>

</head>

<body class="font-sans antialiased selection:bg-emerald-500 selection:text-white">
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

        @if (session()->has('success'))
            <div class="fixed bottom-0 right-1/2 translate-x-1/2 z-50">
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200 animate-pulse">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @include('layouts.footer')
    </div>
</body>

</html>
