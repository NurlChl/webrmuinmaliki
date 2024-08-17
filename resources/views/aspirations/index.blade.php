<x-app-layout>

    @slot('tittle', 'Anggota')


    <x-side-nav>
        <section class="bg-white dark:bg-gray-900">
            <div class=" py-8 px-2 sm:py-8 sm:px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="grid gap-8 lg:grid-cols-2 xl:grid-cols-3">
                    @forelse ($aspirations as $aspiration)
                        <article
                            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                                <a href="#"
                                    class="bg-{{ $aspiration->faculty->color }}-100 text-{{ $aspiration->faculty->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                    <svg class="mr-1 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <span>{{ $aspiration->faculty->name }}</span>
                                </a>
                                <span class="text-xs sm:text-sm">{{ $aspiration->created_at->diffForHumans() }}</span>
                            </div>
                            <h2 class="mb-1 text-xl capitalize font-bold tracking-tight text-zinc-900"><a class="hover:opacity-75 transition ease-in-out duration-300"
                                    href="{{ route('aspirations.show', $aspiration) }}">{{ $aspiration->name }}</a></h2>
                            <p class="font-light text-zinc-500">
                                {{ Str::limit($aspiration->body, 200) }}</p>

                            {{-- <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <span class="font-medium dark:text-white">
                                        {{ $aspiration->nim }}
                                    </span>
                                </div>
                                <a href="#"
                                    class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                    Read more
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div> --}}

                        </article>

                    @empty
                        <div class="px-4 py-3 text-center lg:col-span-2 xl:col-span-3">
                            <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="0.1"
                                    d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                            </svg>
                            <span class="text-gray-400">Tidak ada Aspirasi</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </x-side-nav>

</x-app-layout>
