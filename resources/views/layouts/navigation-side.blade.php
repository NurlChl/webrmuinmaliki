<div>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex absolute items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg xl:hidden z-20 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-full min-h-screen transition-transform -translate-x-full xl:translate-x-0 xl:relative"
        aria-label="Sidenav">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 ">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center p-2">
                        <img src=" {{ Storage::url('logo/logorm.png')}} " alt="logorm" class="w-24 mx-auto">
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('home') ? 'bg-gray-100' : '' }}">
                        <svg class="w-6 h-6 text-gray-400 dark:text-white group-hover:text-gray-900 {{ request()->routeIs('home') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>

                        <span class="ml-3">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-100' : '' }}">
                        <svg class="w-6 h-6 text-gray-400 dark:text-white group-hover:text-gray-900 {{ request()->routeIs('dashboard') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023" />
                        </svg>

                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 "
                        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('posts*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Berita</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages"
                        class="{{ request()->routeIs('posts*') ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('posts.create') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 transition rounded-lg duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('posts.create') ? 'bg-gray-100' : '' }}">Tambah
                                Berita</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.dashboard') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('posts.dashboard') ? 'bg-gray-100' : '' }}">Kelola
                                Berita</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>

                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Anggota</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-sales"
                        class=" py-2 space-y-2 {{ request()->routeIs('members*') ? 'block' : 'hidden' }}">
                        <li>
                            <a href="{{ route('members.create') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('members.create') ? 'bg-gray-100' : '' }}">Tambah
                                Anggota</a>
                        </li>
                        <li>
                            <a href="{{ route('members.dashboard') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('members.dashboard') ? 'bg-gray-100' : '' }}">Kelola
                                Anggota</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 "
                        aria-controls="dropdown-pages-peraturan" data-collapse-toggle="dropdown-pages-peraturan">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('rules*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                        </svg>

                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Peraturan</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages-peraturan"
                        class="{{ request()->routeIs('rules*') ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('rules.create') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 transition rounded-lg duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('rules.create') ? 'bg-gray-100' : '' }}">Tambah
                                aturan</a>
                        </li>
                        <li>
                            <a href="{{ route('rules.dashboard') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('rules.dashboard') ? 'bg-gray-100' : '' }}">Kelola
                                Peraturan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 "
                        aria-controls="dropdown-pages-ukm" data-collapse-toggle="dropdown-pages-ukm">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('extracurriculars*') ? 'text-gray-900' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 6.5h2M11 18h2m-7-5v-2m12 2v-2M5 8h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1Zm0 12h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1Zm12 0h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1Zm0-12h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1Z"/>
                          </svg>
                          

                        <span class="flex-1 ml-3 text-left whitespace-nowrap">UKM</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages-ukm"
                        class="{{ request()->routeIs('extracurriculars*') ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('extracurriculars.create') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 transition rounded-lg duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('extracurriculars.create') ? 'bg-gray-100' : '' }}">Tambah
                                UKM</a>
                        </li>
                        <li>
                            <a href="{{ route('extracurriculars.dashboard') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('extracurriculars.dashboard') ? 'bg-gray-100' : '' }}">Kelola
                                UKM</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 "
                        aria-controls="dropdown-pages-galeri" data-collapse-toggle="dropdown-pages-galeri">

                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('galleries*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>


                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Galeri</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages-galeri"
                        class="{{ request()->routeIs('galleries*') ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('galleries.create') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 transition rounded-lg duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('galleries.create') ? 'bg-gray-100' : '' }}">Tambah
                                Foto</a>
                        </li>
                        <li>
                            <a href="{{ route('galleries.index') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('galleries.index') ? 'bg-gray-100' : '' }}">Lihat
                                Foto</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('aspirations.index') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg {{ request()->routeIs('aspirations*') ? 'bg-gray-100' : '' }} hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900  {{ request()->routeIs('aspirations*') ? 'text-gray-900' : '' }} "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Aspirasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('recommendations.index') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg {{ request()->routeIs('recommendations*') ? 'bg-gray-100' : '' }}  hover:bg-gray-100  group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900  {{ request()->routeIs('recommendations*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Usulan</span>
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 "
                        aria-controls="dropdown-pages-category" data-collapse-toggle="dropdown-pages-category">

                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 }dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('faculties*') || request()->routeIs('rule_categories*') || request()->routeIs('member_categories*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z" />
                        </svg>

                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Kategori</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages-category"
                        class="{{ request()->routeIs('faculties*') || request()->routeIs('rule_categories*') || request()->routeIs('member_categories*') ? 'block' : 'hidden' }} py-2 space-y-2">

                        <li>
                            <a href="{{ route('faculties.index') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('faculties*') ? 'bg-gray-100' : '' }}">Fakultas</a>
                        </li>
                        <li>
                            <a href="{{ route('rule_categories.index') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('rule_categories*') ? 'bg-gray-100' : '' }}">Peraturan</a>
                        </li>
                        <li>
                            <a href="{{ route('member_categories.index') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('member_categories*') ? 'bg-gray-100' : '' }}">Organisasi</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 "
                        aria-controls="dropdown-pages-about" data-collapse-toggle="dropdown-pages-about">

                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400  transition duration-75  group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('abouts*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                        </svg>


                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Tentang</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages-about"
                        class="{{ request()->routeIs('abouts*') ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('abouts.create') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 transition rounded-lg duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('abouts.create') ? 'bg-gray-100' : '' }}">Tambah
                                Tentang</a>
                        </li>
                        <li>
                            <a href="{{ route('abouts.dashboard') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->routeIs('abouts.dashboard') ? 'bg-gray-100' : '' }}">Kelola
                                Tentang</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('profile.edit') ? 'bg-gray-100' : '' }}">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 {{ request()->routeIs('profile.edit') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                stroke-width="1"
                                d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.441 1.559a1.907 1.907 0 0 1 0 2.698l-6.069 6.069L10 19l.674-3.372 6.07-6.07a1.907 1.907 0 0 1 2.697 0Z" />
                        </svg>


                        <span class="ml-3">Profil</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
</div>
