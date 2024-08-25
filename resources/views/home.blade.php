<x-app-layout>
    @slot('tittle', 'Home')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot> --}}

    <section class="relative py-20 sm:py-40 lg:py-52 bg-no-repeat bg-cover bg-center"
        style="background-image: url('{{ url('/') }}/logo/uin.jpeg')">
        {{-- <img src="http://projekuin.test/logo/uin.jpeg" alt="uin" class="object-cover w-full "> --}}

        <div class="absolute  md:inset-32 bg-zinc-900 opacity-10 md:opacity-35"></div>

        <div class="relative ">
            <h1 class="text-white text-1xl sm:text-3xl lg:text-6xl font-bold text-center ">Selamat Datang</h1>
            <h1 class="text-white text-2xl sm:text-4xl lg:text-7xl font-bold text-center ">Di Website RM UIN MALIKI</h1>
        </div>
    </section>
    <x-container class="flex flex-col mx-auto max-w-3xl lg:w-full lg:max-w-7xl mt-7 sm:mt-10 bg-white">
        <div class="flex flex-col w-full lg:flex-row gap-10 mx-auto">
            <section class="max-w-screen-md basis-3/4 flex flex-col gap-7 sm:gap-10 w-full">

                @if ($posts->count() > 2)
                    <div>
                        <h2 class="mb-4 text-base text-red-600 font-bold uppercase">Highlight Postingan</h2>
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-44 sm:p-20 sm:h-64 overflow-hidden rounded-lg md:h-96">
                                @foreach ($carousels as $carousel)
                                    <!-- Item -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ Storage::url($carousel->image) }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="{{ $carousel->tittle }}">
                                    </div>
                                @endforeach

                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                @foreach ($carousels as $carousel)
                                    <button type="button" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full"
                                        aria-current="true" aria-label="Slide {{ $loop->iteration }}"
                                        data-carousel-slide-to="{{ $loop->index }}"></button>
                                @endforeach
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>

                        </div>
                    </div>
                @endif

                <div class="bg-white p-5">
                    <h2 class="mb-4 text-base text-red-600 font-bold uppercase">Berita Lainnya</h2>
                    <div class="flex flex-col gap-5">
                        @forelse ($posts as $post)
                            <article class="flex flex-col group">
                                <a href="{{ route('posts.show', $post) }}">
                                    <h2
                                        class="text-lg font-semibold border-l-4 border-amber-500 pl-3 group-hover:text-emerald-600 transition ease-in-out duration-300">
                                        {{ str()->limit($post->tittle, 150) }}</h2>
                                </a>
                                <div class="pl-4">
                                    <span
                                        class="text-sm font-semibold text-emerald-900">{{ $post->created_at->format('d-m-Y') }}</span>
                                </div>
                                <p class="text-base pl-4 text-zinc-600">{{ str_replace('&nbsp;', ' ', $post->excerpt) }}
                                </p>
                            </article>
                        @empty
                            <div class="px-2 py-3 text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="0.1"
                                        d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                </svg>
                                <span class="text-gray-400 text-sm">Postingan belum ada</span>
                            </div>
                        @endforelse
                    </div>
                </div>


            </section>

            <section class="flex flex-col gap-10 basis-1/3 w-full">
                <div>
                    <h2 class="mb-4 text-base text-red-600 font-bold uppercase">Profil kampus</h2>
                    <div class="aspect-video">
                        <iframe class="rounded-lg w-full h-full"
                            src="https://www.youtube.com/embed/7qCv_UOhK24?autoplay=1&mute=1&playlist=7qCv_UOhK24"
                            title="YouTube video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>

                {{-- <div class=" bg-white py-5">
                    <h2 class="mb-4 px-2 sm:px-5 text-base text-red-600 font-bold uppercase">Update Peraturan</h2>
                    <div>
                        @forelse ($rulesByCategory as $ruleCategory => $rules)
                            <div class="group/category py-3 first:py-0">
                                <div class="mb-3 first:mt-0 text-left w-full bg-amber-900 text-white py-2 pl-2 sm:pl-5 pr-10 text-xs sm:text-sm font-semibold uppercase shadow-md" style="clip-path: polygon(0% 0%, 60% 0%, 55% 50%, 60% 100%, 0% 100%);">
                                        {{ $ruleCategory }}
                                </div>
                                @forelse ($rules as $rule)
                                    <a href="{{ $rule->file }}" target="_blank" class="block px-3 sm:px-5 py-3 border-b last:border-b-0  border-zinc-200 ">
                                        <div class="flex flex-row gap-5 group/rule">
                                            <div>
                                                <svg class="w-7 h-7 mt-1.5 text-amber-400 group-hover/rule:text-amber-600 transition ease-in-out duration-300" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span>
                                                <p
                                                    class=" font-semibold group-hover/rule:text-emerald-600 transition ease-in-out duration-300">
                                                    {{ $rule->name }}</p>
                                            </span>
                                        </div>
                                    </a>
                                @empty
                                    <div class="px-2 py-3 text-center">
                                        <svg class="w-10 h-10 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="0.1"
                                                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                        </svg>
                                        <span class="text-gray-400 text-sm">Peraturan belum ada</span>
                                    </div>
                                @endforelse
                            </div>
    
                        @empty
                            <div class="px-2 py-3 text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="0.1"
                                        d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                </svg>
                                <span class="text-gray-400 text-sm">Kategori belum ada</span>
                            </div>
                        @endforelse
    
                    </div>
                </div> --}}

                <div class="p-5 bg-white rounded-lg shadow-lg border border-emerald-300">
                    <div class="flex flex-row mb-10 bg bg-emerald-50 rounded-full">
                        <div class="py-3 px-10 bg bg-emerald-500 rounded-full mr-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                            </svg>
                        </div>
                        <h2 class="items-center my-auto text-xl font-bold ">Peraturan</h2>
                    </div>

                    <div class="flex flex-col gap-3">
                        @forelse ($rulesByCategory as $ruleByCategory => $rules )
                            @forelse ($rules as $rule)
                                <div class="flex flex-row gap-5 relative bg-slate-100 py-3 px-5 rounded-md group">
                                    <a href="{{ $rule->file }}" target="_blank"
                                        class="absolute top-0 left-0 w-full h-full"></a>
                                    <svg class="w-6 h-6 text-amber-400 group-hover:text-amber-500 transition-all ease-in-out duration-300"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M6 16v-3h.375a.626.626 0 0 1 .625.626v1.749a.626.626 0 0 1-.626.625H6Zm6-2.5a.5.5 0 1 1 1 0v2a.5.5 0 0 1-1 0v-2Z" />
                                        <path fill-rule="evenodd"
                                            d="M11 7V2h7a2 2 0 0 1 2 2v5h1a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2H3a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h6a2 2 0 0 0 2-2Zm7.683 6.006 1.335-.024-.037-2-1.327.024a2.647 2.647 0 0 0-2.636 2.647v1.706a2.647 2.647 0 0 0 2.647 2.647H20v-2h-1.335a.647.647 0 0 1-.647-.647v-1.706a.647.647 0 0 1 .647-.647h.018ZM5 11a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 9 15.375v-1.75A2.626 2.626 0 0 0 6.375 11H5Zm7.5 0a2.5 2.5 0 0 0-2.5 2.5v2a2.5 2.5 0 0 0 5 0v-2a2.5 2.5 0 0 0-2.5-2.5Z"
                                            clip-rule="evenodd" />
                                        <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                                    </svg>
                                    <p
                                        class="text-sm font-semibold group-hover:text-emerald-600 transition ease-in-out duration-300">
                                        {{ $rule->name }}</p>
                                </div>

                            @empty
                                <div class="px-2 py-3 text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.1"
                                            d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                    </svg>
                                    <span class="text-gray-400 text-sm">Peraturan belum ada</span>
                                </div>
                            @endforelse

                        @empty
                            <div class="px-2 py-3 text-center">
                                <svg class="w-10 h-10 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="0.1"
                                        d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                </svg>
                                <span class="text-gray-400 text-sm">Peraturan tidak ada</span>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-5 text-end">
                        <a href="{{ route('rules.index') }}" class=" text-xs text-emerald-600 font-semibold ">Muat
                            lebih
                            banyak ></a>
                    </div>
                </div>

            </section>
        </div>

        @if ($totalGalleries > 0)
            <div class="custom3d-slide mt-20 rounded-lg">

                <div class="banner h-fit">
                    <div class="slider" style="--quantity: {{ $totalGalleries }}">
                        @foreach ($galleries as $gallery)
                            <div class="item" style="--position: {{ $loop->iteration }}"><img
                                    src="{{ $gallery->image }}" alt="slide"></div>
                        @endforeach
                    </div>
                    <div class="content">
                        <h1 data-content="KEGIATAN" class="hidden md:block">
                            KEGIATAN
                        </h1>
                        <div class="author hidden md:block">
                            <h2>RM</h2>
                            <p><b>UIN Maliki</b></p>
                            <p>
                                Beberapa kegiatan dalam organisasi
                            </p>
                        </div>
                        <div class="model"></div>
                    </div>
                </div>

            </div>
        @endif

    </x-container>
</x-app-layout>
