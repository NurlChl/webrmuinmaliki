<x-app-layout>

    @slot('tittle', 'Anggota')

    <section class="relative py-20 sm:py-40 lg:py-52 bg-no-repeat bg-cover bg-center bg-pink-200"
        style="background-image: url('{{ url('/') }}/logo/aspirasi.jpg')">
        {{-- <img src="http://projekuin.test/logo/uin.jpeg" alt="uin" class="object-cover w-full "> --}}

        <div class="absolute  md:inset-32 bg-zinc-900 opacity-10 md:opacity-35"></div>

        <div class="relative ">
            <h1 class="text-white text-1xl sm:text-3xl lg:text-4xl font-bold text-center ">ANGGOTA</h1>
            <h1 class="text-white text-2xl sm:text-4xl lg:text-4xl font-bold text-center ">REPUBLIK MAHASISWA UIN MALIKI
            </h1>
        </div>
    </section>

    <x-container>

        <div class="mx-auto max-w-screen-xl lg:px-12 mt-10">
            <!-- Start coding here -->
            <div class="bg-white pt-5 relative shadow-md sm:rounded-lg overflow-hidden ">
                <div
                    class="flex flex-col md:flex-row items-end justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mb-10">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <label for="simple-search" class="sr-only">Cari</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="search" id="simple-search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 p-2"
                                    placeholder="Cari...">
                            </div>
                        </form>
                    </div>



                    <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown"
                        class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">{{ isset($selectedCategory) ? $selectedCategory : 'Kategori' }}<svg
                            class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>


                    <!-- Dropdown menu -->
                    <div id="multi-dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="multiLevelDropdownButton">
                            <li>
                                <a href="{{ route('members.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 border-b">Semua</a>
                                @foreach ($member_categories as $member_category)
                                    <a href="{{ route('members.category', $member_category->slug) }}"
                                        class="block px-4 py-2 hover:bg-gray-100">{{ $member_category->name }}</a>
                                @endforeach
                            </li>
                        </ul>
                    </div>


                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Foto</th>
                                <th scope="col" class="px-4 py-3">NIM</th>
                                <th scope="col" class="px-4 py-3">Jurusan</th>
                                <th scope="col" class="px-4 py-3">Jabatan</th>
                                <th scope="col" class="px-4 py-3">Kategori</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr class="border-b dark:border-gray-700 ">

                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    {{-- <th scope="row"
                                            class=" px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $member->name }}</th> --}}
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $member->name }}</td>
                                    {{-- <th scope="row"
                                            class="sm:hidden flex mr-5 items-center px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="{{ $member->image }}" alt="J{{ $member->name }}">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $member->name }}</div>
                                            </div>
                                        </th> --}}
                                    <td class="px-2 sm:px-4 py-3">
                                        <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}"
                                            class=" h-10 w-10 rounded-full sm:rounded-none sm:w-20 sm:h-20 md:w-36 md:h-36 object-cover">
                                    </td>
                                    <td class="px-4 py-3">{{ $member->nim }}</td>
                                    <td class="px-4 py-3">{{ $member->major }}</td>
                                    <td class="px-4 py-3">{{ $member->position }}</td>
                                    <td class="px-4 py-3">{{ $member->memberCategory->name }}</td>
                                    <td class="px-4 py-3">
                                        <button id="apple-imac-27-dropdown-button"
                                            data-dropdown-toggle="{{ $member->id }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ $member->id }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="apple-imac-27-dropdown-button">
                                                <li>
                                                    <a href="{{ route('members.edit', $member) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <form onsubmit="return confirm('Yakin hapus anggota ini?')"
                                                    action="{{ route('members.destroy', $member->id) }}"
                                                    method="POST"
                                                    class="block text-sm text-gray-700 hover:bg-gray-100 ">

                                                    @method('DELETE')
                                                    @csrf

                                                    <button type="submit" class="py-2 px-4 w-full h-full text-start">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @empty

                                <tr class="border-b dark:border-gray-700 ">
                                    <td class="px-4 py-3 text-center" colspan="8">
                                        <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="0.1"
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
                    {{ $members->links() }}
                </div>
            </div>
        </div>

    </x-container>

</x-app-layout>
