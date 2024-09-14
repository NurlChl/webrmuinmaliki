<x-app-layout>

    @slot('tittle', 'Atur Berita')

    <x-side-nav>

        <div class="mx-auto max-w-screen-xl bg-white">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg">
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Gambar</th>
                                <th scope="col" class="px-4 py-3 sr-only">Konten</th>
                                <th scope="col" class="px-4 py-3">Ketua</th>
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
                            @forelse ($extracurriculars as $extracurricular)
                                <tr class="border-b">
                                    <td class="px-2 sm:px-4 py-3">
                                        <img src="{{ Storage::url($extracurricular->image) }}"
                                            alt="{{ $extracurricular->slug }}"
                                            class="aspect-[5/6]  max-w-28 object-cover rounded-lg">
                                    </td>

                                    <td class="px-4 py-3 max-w-xs md:max-w-md">
                                        <div
                                            class="block whitespace-nowrap font-medium text-gray-900 text-base text-ellipsis overflow-hidden">
                                            {{ $extracurricular->name }} Lorem ipsum dolor sit.
                                        </div>
                                        <div>
                                            <p class="line-clamp-4">{{ $extracurricular->body }}</p>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">{{ $extracurricular->leader_name }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        {{ $extracurricular->created_at->format('d m Y') }}
                                    </td>
                                    @auth
                                        @if (auth()->user()->isAdmin())
                                            <td class="px-4 py-3">
                                                <button id="apple-imac-27-dropdown-button"
                                                    data-dropdown-toggle="{{ $extracurricular->id }}"
                                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                                <div id="{{ $extracurricular->id }}"
                                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="apple-imac-27-dropdown-button">
                                                        <li>
                                                            <a href="{{ route('extracurriculars.edit', $extracurricular) }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                                                        </li>
                                                        <form onsubmit="return confirm('Yakin hapus UKM ini?')"
                                                            action="{{ route('extracurriculars.destroy', $extracurricular->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf

                                                            <button type="submit" class="block w-full text-start py-2 px-4 hover:bg-gray-100">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            </td>
                                        @endif
                                    @endauth
                                </tr>

                            @empty

                                <tr class="border-b dark:border-gray-700 ">
                                    <td class="px-4 py-3 text-center" colspan="8">
                                        <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="0.1"
                                                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                        </svg>
                                        <span>Tidak ada Berita</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>


                <div class="p-2 sm:p-5">
                    {{ $extracurriculars->links() }}
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
