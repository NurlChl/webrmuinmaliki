<x-app-layout>

    @slot('tittle', 'Atur Anggota')

    <x-side-nav>

        <div class="mx-auto max-w-screen-xl bg-white">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg">
                <div class="flex mb-5 px-4 py-3">

                    <form class="max-w-lg w-full">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <div class="flex">
                            <label for="search-dropdown"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="button">{{ isset($selectedCategory) ? $selectedCategory : 'Filter' }} <svg
                                    class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-button">
                                    <li class="max-h-52 overflow-y-auto">
                                        <a href="{{ route('members.dashboard') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua</a>
                                        @foreach ($member_categories as $member_category)
                                            <a href="{{ route('members.dashboardCategory', $member_category->slug) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $member_category->name }}</a>
                                        @endforeach
                                    </li>

                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown" name="search"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-emerald-500"
                                    placeholder="Cari Nama..." />
                                <button type="submit"
                                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-emerald-700 rounded-e-lg border border-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <form action="{{ route('members.bulkDelete') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div id="modal-bulk" class="hidden justify-between px-4 py-2 w-full bg-black text-white text-base">
                        <div class="flex gap-5">
                            <p id="selected-count" class="border-r px-5 py-3 border-r-gray-700 w-fit">0 dipilih</p>
                            <p class="my-auto cursor-pointer inline-flex gap-1 items-center"
                                data-dropdown-toggle="dropdownDelete" id="dropdownHoverButton"
                                data-dropdown-toggle="dropdownDelete">Tindakan
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>

                            </p>

                            <div id="dropdownDelete"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton">
                                    <li class="max-h-52 overflow-y-auto">
                                        <button type="button" data-modal-target="popup-modal-delete"
                                            data-modal-toggle="popup-modal-delete"
                                            class="block px-4 py-2 font-medium hover:bg-gray-100 ">Hapus
                                            selamanya</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <svg id="close-modal-bulk" class="w-6 h-6 text-gray-400 my-auto cursor-pointer"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                    </div>
                    <x-popup-modal-delete id="popup-modal-delete"
                        message="Anda yakin mau menghapus anggota terpilih ini?" confirmText="Ya, saya setuju"
                        cancelText="Batal" />
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <input id="select-all" type="checkbox" data-popover-target="popover-checked-all"
                                            class="cursor-pointer w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500">
                                        <div data-popover id="popover-checked-all" role="tooltip"
                                            data-popover-placement="top"
                                            class="absolute z-10 invisible inline-block w-fit text-gray-500 transition-opacity duration-300 delay-500 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                            <div class="p-1 font-normal text-xs">
                                                <p>Pilih semua</p>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">No.</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Foto</th>
                                    <th scope="col" class="px-4 py-3">NIM</th>
                                    <th scope="col" class="px-4 py-3">Jurusan</th>
                                    <th scope="col" class="px-4 py-3">Jabatan</th>
                                    <th scope="col" class="px-4 py-3">Kategori</th>
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
                                @forelse ($members as $member)
                                    <tr class="border-b whitespace-nowrap">

                                        <td class="px-4 py-3">
                                            <input id="item-checkbox" name="ids[{{ $member->id }}]" type="checkbox"
                                                value="{{ $member->id }}"
                                                class="cursor-pointer w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500">
                                        </td>

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
                                        @auth
                                            @if (auth()->user()->isAdmin())
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
                                                    </div>
                                                </td>
                                            @endif
                                        @endauth
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
                </form>


                <div class="p-2 sm:p-5">
                    {{ $members->links() }}
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var selectAllCheckbox = document.getElementById('select-all');
                var checkboxes = document.querySelectorAll('#item-checkbox');
                var selectedCountElement = document.getElementById('selected-count');
                var modalBulk = document.getElementById('modal-bulk');
                var closeModalButton = document.getElementById('close-modal-bulk');

                function updateSelectedCount() {
                    var checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
                    selectedCountElement.textContent = `${checkedCount} dipilih`;

                    if (checkedCount > 0) {
                        modalBulk.classList.add('flex');
                        modalBulk.classList.remove('hidden');
                    } else {
                        modalBulk.classList.remove('flex');
                        modalBulk.classList.add('hidden');
                    }
                }

                // Fungsi untuk mengatur semua checkbox berdasarkan status checkbox "Select All"
                selectAllCheckbox.addEventListener('change', function() {
                    var isChecked = this.checked;
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = isChecked;
                    });
                    updateSelectedCount();
                });

                // Fungsi untuk memperbarui status checkbox "Select All" berdasarkan status item-item individual
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        var allChecked = Array.from(checkboxes).every(cb => cb.checked);
                        var anyChecked = Array.from(checkboxes).some(cb => cb.checked);

                        selectAllCheckbox.checked = allChecked;
                        selectAllCheckbox.indeterminate = !allChecked && anyChecked;

                        updateSelectedCount();
                    });
                });

                closeModalButton.addEventListener('click', function() {
                    // Uncheck all checkboxes
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });

                    // Uncheck the "Select All" checkbox
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;

                    // Update selected count and hide modal
                    updateSelectedCount();
                    modalBulk.classList.remove('flex');
                    modalBulk.classList.add('hidden');
                });


                // Initial count update
                updateSelectedCount();
            });
        </script>

    </x-side-nav>

</x-app-layout>
