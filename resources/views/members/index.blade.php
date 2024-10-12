<x-app-layout>

    @slot('tittle', 'Anggota')

    <x-hero-section imageContent="{{ Storage::url('logo/aspirasi.jpg') }}">Anggota</x-hero-section>

    <x-container>

        <div class="mx-auto max-w-screen-xl lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white pt-5 relative shadow-md sm:rounded-lg overflow-hidden ">
                <div
                    class="flex flex-col md:flex-row items-end justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mb-5">
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
                            <li class="max-h-52 overflow-y-auto">
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
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Foto</th>
                                <th scope="col" class="px-4 py-3">NIM</th>
                                <th scope="col" class="px-4 py-3">Jurusan</th>
                                <th scope="col" class="px-4 py-3">Jabatan</th>
                                <th scope="col" class="px-4 py-3">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr class="border-b whitespace-nowrap">

                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>

                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $member->name }}</td>

                                    <td class="px-2 sm:px-4 py-3">
                                        <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}"
                                            class=" h-10 w-10 rounded-full sm:rounded-none sm:min-w-20 sm:h-20 lg:w-36 lg:h-36 object-cover">
                                    </td>
                                    <td class="px-4 py-3">{{ $member->nim }}</td>
                                    <td class="px-4 py-3">{{ $member->major }}</td>
                                    <td class="px-4 py-3">{{ $member->position }}</td>
                                    <td class="px-4 py-3">{{ $member->memberCategory->name }}</td>
                                 
                                </tr>

                            @empty

                                <tr class="border-b dark:border-gray-700 ">
                                    <td class="px-4 py-3 text-center" colspan="7">
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


                <div class="p-2 sm:p-5">
                    {{ $members->links() }}
                </div>
            </div>
        </div>

    </x-container>

</x-app-layout>
