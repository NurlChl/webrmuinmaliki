<x-app-layout>

    @slot('tittle', 'Tentang')

    <x-side-nav>
        <main class="relative pb-16 pt-16 lg:pb-24 sm:px-5 bg-white dark:bg-gray-900 antialiased">
            @auth
                @if (auth()->user()->isAdmin() || auth()->user()->isPartner())
                    <div class="flex gap-3 mb-2 absolute top-0 right-0 bg-yellow-200 py-3 px-7 rounded-bl-full">
                        <a href="{{ route('abouts.edit', $about) }}" class=" flex space-x-1 text-yellow-600 hover:underline">
                            <svg class="w-full h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                            <span>Edit</span>
                        </a>
                    </div>
                @endif
            @endauth
            <div class="flex flex-col px-4 mx-auto max-w-screen-lg ">
                <article
                    class="mx-auto w-full max-w-screen-lg format format-sm sm:format-base lg:format-lg format-emerald">

                    {!! $about->body !!}

                </article>

            </div>

        </main>
    </x-side-nav>

</x-app-layout>
