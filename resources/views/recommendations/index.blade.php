<x-app-layout>

    @slot('tittle', 'Anggota')


    <x-side-nav>
        <section class="bg-white dark:bg-gray-900">
            <div class=" py-8 pt-16 px-2 sm:px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="grid gap-8 lg:grid-cols-2 xl:grid-cols-3">
                    @forelse ($recommendations as $recommendation)
                        <article
                            class="p-6 flex flex-col justify-between bg-white rounded-lg border border-gray-200 shadow-md">
                            <div>
                                <div class="flex justify-between items-center mb-5 text-gray-500">
                                    <a
                                        class="bg-{{ $recommendation->faculty->color }}-100 text-{{ $recommendation->faculty->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                        <svg class="mr-1 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span>{{ $recommendation->faculty->name }}</span>
                                    </a>
                                    <span
                                        class="text-xs sm:text-sm">{{ $recommendation->created_at->diffForHumans() }}</span>
                                </div>
                                <h2 class="mb-1 text-xl capitalize font-bold tracking-tight text-zinc-900 line-clamp-1">
                                    {{ $recommendation->name }}</h2>
                                <p class="text-base font-normal text-zinc-500 line-clamp-4">
                                    {{ Str::limit($recommendation->body, 200) }}</p>
                            </div>
                            <div>
                                <button class="text-yellow-600 mt-3 text-sm"
                                    data-modal-target="detail-modal-{{ $loop->iteration }}"
                                    data-modal-toggle="detail-modal-{{ $loop->iteration }}">Detail &raquo;</button>
                            </div>

                            <div id="detail-modal-{{ $loop->iteration }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <div>
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    {{ $recommendation->name }}
                                                </h3>
                                                <p class="text-sm">{{ $recommendation->nim }}</p>
                                            </div>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="detail-modal-{{ $loop->iteration }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="overflow-x-auto">
                                                <table class="text-left">
                                                    <thead>
                                                        <tr>
                                                            <th class="sr-only">Data</th>
                                                            <th class="sr-only">Konten</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="flex gap-1">
                                                            <th>Fakultas:</th>
                                                            <td>{{ $recommendation->faculty->name }}</td>
                                                        </tr>
                                                        <tr class="flex gap-1">
                                                            <th>Angkatan:</th>
                                                            <td>{{ $recommendation->generation }}</td>
                                                        </tr>
                                                        <tr class="flex gap-1">
                                                            <th>No. Telp:</th>
                                                            <td>{{ $recommendation->telephone }}</td>
                                                        </tr>
                                                        <tr class="flex gap-1">
                                                            <th>Alamat:</th>
                                                            <td>{{ $recommendation->address }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                {{ $recommendation->body }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                    @empty
                        <div class="px-4 py-3 text-center lg:col-span-2 xl:col-span-3">
                            <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="0.1"
                                    d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                            </svg>
                            <span class="text-gray-400">Tidak ada Usulan</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </x-side-nav>

</x-app-layout>
