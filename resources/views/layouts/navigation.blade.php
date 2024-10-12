<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 relative">

    @php
        $navStyle = 'justify-between lg:justify-center';
        $navStyleAuth = 'justify-between';
    @endphp

    <img src="{{ Storage::url('logo/bg_nav.jpg') }}" alt="bg-nav"
        class="absolute top-0 left-0 w-full h-full object-cover opacity-30">

    <!-- Logo -->
    <div class="shrink-0 relative hidden items-center sm:max-w-4xl lg:max-w-5xl  mb-5 mx-auto px-4 lg:flex justify-between sm:px-6 lg:px-8"
        id="logo">
        <a href="{{ route('home') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>

        <p class="my-auto">{{ Now()->translatedFormat('l, d F Y') }}</p>
    </div>

    @auth
    @else
        <div class="absolute right-0 top-0 bg-white flex items-center">

            <x-dropdown>
                <x-slot name="trigger">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('login')">
                        {{ __('LOGIN') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('register')">
                        {{ __('REGISTER') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>

        </div>
    @endauth
    <!-- Primary Navigation Menu -->
    <div class="mx-auto relative bg-white w-full">
        <div class="mx-auto px-4 sm:px-6 sm:max-w-4xl lg:max-w-5xl lg:px-8 w-full">
            <div class="flex @auth {{ $navStyleAuth }} @else {{ $navStyle }} @endauth h-16 max-w-7xl mx-auto"
                id="navbar">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center max-w-7xl  mx-auto px-4 sm:px-6 lg:hidden">
                        <a href="{{ route('home') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px lg:flex" id="nav-utama">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('BERANDA') }}
                        </x-nav-link>
                        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts*')">
                            {{ __('BERITA') }}
                        </x-nav-link>
                        <x-nav-link :href="route('members.index')" :active="request()->routeIs('members*')" data-dropdown-toggle="dropdownAnggota"
                            id="dropdownHoverButton" data-dropdown-toggle="dropdownAnggota"
                            data-dropdown-trigger="hover">
                            {{ __('ANGGOTA') }}
                        </x-nav-link>

                        <!-- Dropdown menu -->
                        <div id="dropdownAnggota"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton">
                                <li class="max-h-52 overflow-y-auto">
                                    @foreach ($member_categories as $member_category)
                                        <a href="{{ route('members.category', $member_category->slug) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $member_category->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>

                        <x-nav-link :href="route('rules.index')" :active="request()->routeIs('rules*')" data-dropdown-toggle="dropdownPeraturan"
                            id="dropdownHoverButton" data-dropdown-toggle="dropdownPeraturan"
                            data-dropdown-trigger="hover">
                            {{ __('PERATURAN') }}
                        </x-nav-link>

                        <!-- Dropdown menu -->
                        <div id="dropdownPeraturan"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownHoverButton">
                                <li class="max-h-52 overflow-y-auto">
                                    @foreach ($rule_categories as $rule_category)
                                        <a href="{{ route('rules.index', array_merge(request()->query(), ['category' => $rule_category->slug])) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $rule_category->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>

                        <x-nav-link :href="route('aspirations.create')" :active="request()->routeIs('aspirations*')">
                            {{ __('ASPIRASI') }}
                        </x-nav-link>
                        <x-nav-link :href="route('recommendations.create')" :active="request()->routeIs('recommendations*')">
                            {{ __('USULAN PERATURAN') }}
                        </x-nav-link>
                        <x-nav-link :href="route('abouts.index')" :active="request()->routeIs('abouts*')">
                            {{ __('TENTANG') }}
                        </x-nav-link>
                        <x-nav-link :href="route('extracurriculars.index')" :active="request()->routeIs('extracurriculars.index*')">
                            {{ __('UKM') }}
                        </x-nav-link>
                    </div>
                </div>


                @auth
                    <!-- Settings Dropdown -->
                    <div class="hidden lg:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="uppercase">{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @if (auth()->user()->isAdmin())
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('DASHBOARD') }}
                                    </x-dropdown-link>
                                @endif

                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('PROFIL') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('LOG OUT') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth

                <!-- Hamburger -->
                <div class="-me-2 flex items-center lg:hidden">


                    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                        aria-controls="default-sidebar" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>


                </div>
            </div>



            {{-- nav fixed ketika scrol bawah --}}
            {{-- <div class="fixed z-50 top-5 left-0 w-full hidden" id="navbar-fixed">
                <div class="flex justify-between px-10 h-16 max-w-7xl bg-white bg-opacity-85 rounded-xl mx-auto">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center max-w-7xl  mx-auto px-4 sm:px-6 sm:hidden">
                            <a href="{{ route('home') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                        </div>


                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts*')">
                                {{ __('Postingan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('members.index')" :active="request()->routeIs('members*')">
                                {{ __('Anggota') }}
                            </x-nav-link>
                            <x-nav-link :href="route('rules.index')" :active="request()->routeIs('rules*')">
                                {{ __('Peraturan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('aspirations.create')" :active="request()->routeIs('aspirations*')">
                                {{ __('Aspirasi') }}
                            </x-nav-link>
                            <x-nav-link :href="route('recommendations.create')" :active="request()->routeIs('recommendations*')">
                                {{ __('Usulan Peraturan') }}
                            </x-nav-link>
                        </div>
                    </div>


                    @auth
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('login')">
                                {{ __('Login') }}
                            </x-nav-link>
                            <x-nav-link :href="route('register')">
                                {{ __('Register') }}
                            </x-nav-link>
                        </div>
                    @endauth

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">


                        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                            aria-controls="default-sidebar" type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>


                    </div>
                </div>
            </div> --}}


        </div>
    </div>


    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-full min-h-screen transition-transform -translate-x-full lg:hidden lg:translate-x-0 lg:relative"
        aria-label="Sidenav">
        <div
            class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('home') ? 'bg-gray-100' : '' }}">
                        <svg class="w-6 h-6 text-gray-400 dark:text-white group-hover:text-gray-900 {{ request()->routeIs('home') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>

                        <span class="ml-3">BERANDA</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('posts.index') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('posts.index') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }  {{ request()->routeIs('posts*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                        </svg>

                        <span class="ml-3">BERITA</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('members.index') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('members.index') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900   {{ request()->routeIs('members*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1"
                                d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>


                        <span class="ml-3">ANGGOTA</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rules.index') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('rules.index') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 {{ request()->routeIs('rules*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                        </svg>

                        <span class="ml-3">PERATURAN</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('aspirations.create') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('aspirations.create') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900   {{ request()->routeIs('aspirations*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M11 9H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6m0-6v6m0-6 5.419-3.87A1 1 0 0 1 18 5.942v12.114a1 1 0 0 1-1.581.814L11 15m7 0a3 3 0 0 0 0-6M6 15h3v5H6v-5Z" />
                        </svg>



                        <span class="ml-3">ASPIRASI</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('recommendations.create') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('recommendations.create') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900   {{ request()->routeIs('recommendations*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
                        </svg>

                        <span class="ml-3">USULAN PERATURAN</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('abouts.index') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('abouts.create') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900   {{ request()->routeIs('abouts*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="ml-3">Tentang</span>
                    </a>
                </li>

            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <!--- Autentikasi --->
                @auth
                    @if (auth()->user()->isAdmin())
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-100' : '' }}">
                                <svg class="w-6 h-6 text-gray-400 dark:text-white group-hover:text-gray-900 {{ request()->routeIs('dashboard') ? 'text-gray-900' : '' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023" />
                                </svg>

                                <span class="ml-3">DASHBOARD</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('profile.edit') ? 'bg-gray-100' : '' }}">

                            <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }  {{ request()->routeIs('profile*') ? 'text-gray-900' : '' }}"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>


                            <span class="ml-3">PROFIL</span>
                        </a>
                    </li>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li>
                            <button type="submit" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                class="flex items-center p-2 text-base font-normal text-red-900 rounded-lg hover:bg-red-100 group {{ request()->routeIs('logout') ? 'bg-red-100' : '' }}">

                                <svg class="flex-shrink-0 w-6 h-6 text-red-400  transition duration-75  group-hover:text-red-900 } {{ request()->routeIs('logout*') ? 'text-red-900' : '' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                </svg>


                                <span class="ml-3 text-red-600">LOGOUT</span>
                            </button>
                        </li>
                    </form>
                @else
                    <!-- Dropdown menu -->
                    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLogReg">
                        <li>
                            <a href="{{ route('login') }}"
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('login') ? 'bg-gray-100' : '' }}">

                                <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900   {{ request()->routeIs('login*') ? 'text-gray-900' : '' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                                </svg>


                                <span class="ml-3">LOGIN</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('register') ? 'bg-gray-100' : '' }}">

                                <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }  {{ request()->routeIs('register*') ? 'text-gray-900' : '' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                </svg>


                                <span class="ml-3">REGISTER</span>
                            </a>
                        </li>
                    </ul>
                @endauth


            </ul>
        </div>

    </aside>


    <script>
        let isNavbarFixed = false;

        window.onscroll = function() {
            makeNavbarFixed();
        };

        function makeNavbarFixed() {
            const navbarFixed = document.querySelector('#navbar-fixed');
            const navbar = document.querySelector('#navbar');
            const scrollPosition = window.scrollY;

            if (scrollPosition > 150 && !isNavbarFixed) {
                navbarFixed.classList.remove('hidden');
                navbar.classList.add('hidden');
                isNavbarFixed = true;
            } else if (scrollPosition <= 150 && isNavbarFixed) {
                navbar.classList.remove('hidden');
                navbarFixed.classList.add('hidden');
                isNavbarFixed = false;
            }
        }
    </script>

</nav>
