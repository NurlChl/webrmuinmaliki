<x-app-layout>

    @slot('tittle', 'Atur Berita')

    <x-side-nav>

        <div class="mx-auto max-w-screen-xl py-12 md:py-5 bg-white p-5">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">Gambar</th>
                                <th scope="col" class="px-4 py-3">Kategori</th>
                                <th scope="col" class="px-4 py-3">Isi</th>
                                <th scope="col" class="px-4 py-3">Dibuat</th>
                                @auth
                                    @if (auth()->user()->isAdmin())
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    @endif
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="border-b">

                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>

                                    <td class="px-4 py-3 font-medium text-gray-900 sm:max-w-56">
                                        <span class="sm:hidden"
                                            data-popover-target="popover-post-tittle-mobile-{{ $loop->iteration }}">{{ Str::limit($post->tittle, 20) }}</span>
                                        <span class="hidden sm:block"
                                            data-popover-target="popover-post-tittle-{{ $loop->iteration }}">{{ Str::limit($post->tittle, 50) }}</span>

                                        <div data-popover id="popover-post-tittle-mobile-{{ $loop->iteration }}"
                                            role="tooltip"
                                            class="absolute z-10 invisible inline-block max-w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 ">
                                            <div class="px-3 py-2">
                                                <p>{{ $post->tittle }}</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>


                                        <div data-popover id="popover-post-tittle-{{ $loop->iteration }}" role="tooltip"
                                            class="absolute z-10 invisible inline-block max-w-md text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                            <div class="px-3 py-2">
                                                <p>{{ $post->tittle }}</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </td>

                                    <td class="px-2 sm:px-4 py-3">
                                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->slug }}"
                                            class=" h-10 w-10 rounded-full sm:rounded-none sm:min-w-20 sm:h-20 lg:min-w-36 lg:h-20 object-cover">
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $post->member_category->name }}</td>
                                    <td class="px-4 py-3 max-w-96">{{ Str::limit($post->excerpt, 100) }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $post->created_at->format('d m Y') }}
                                    </td>
                                    @auth
                                        @if (auth()->user()->isAdmin())
                                            <td class="px-4 py-3">
                                                <button id="apple-imac-27-dropdown-button"
                                                    data-dropdown-toggle="{{ $post->id }}"
                                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                                <div id="{{ $post->id }}"
                                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="apple-imac-27-dropdown-button">
                                                        <li>
                                                            <a href="{{ route('posts.edit', $post) }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                                                        </li>
                                                    </ul>
                                                    <div class="py-1">
                                                        <form onsubmit="return confirm('Yakin hapus anggota ini?')"
                                                            action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                            class="block text-sm text-gray-700 hover:bg-gray-100 ">

                                                            @method('DELETE')
                                                            @csrf

                                                            <button type="submit"
                                                                class="py-2 px-4 w-full h-full text-start">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    @endauth
                                </tr>

                            @empty

                                <tr class="border-b dark:border-gray-700 ">
                                    <td class="px-4 py-3 text-center" colspan="7">
                                        <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="0.1"
                                                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                        </svg>
                                        <span>Tidak ada anggota</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>


                <div class="mt-8 p-2 sm:p-5">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </x-side-nav>

</x-app-layout>
