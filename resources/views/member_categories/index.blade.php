<x-app-layout>

    @slot('tittle', 'Tipe Anggota')


    <x-side-nav>
        <section class="bg-white dark:bg-gray-900">
            <div
                class="flex flex-col xl:flex-row gap-5 py-8 px-2 sm:py-8 sm:px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="relative h-fit w-full overflow-x-auto shadow-md sm:rounded-lg border border-emerald-600">
                    <table class="relative w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                            <div class="flex justify-between gap-5">
                                <span>Kategori Anggota</span>
                                <div>
                                    <!-- Modal toggle -->
                                    @if ($page_meta['method'] == 'put')
                                        <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                                            class="block absolute right-0 top-0 text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-bl-full text-sm pl-5 pr-2 pb-5 pt-2 text-center"
                                            type="button">
                                            <svg class="w-4 h-4 my-auto text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </button>
                                    @else
                                        <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                                            class="block absolute right-0 top-0 text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-bl-full text-sm pl-5 pr-2 pb-5 pt-2 text-center"
                                            type="button">
                                            <svg class="w-4 h-4 my-auto text-white " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @endif

                                    <!-- Main modal -->
                                    <div id="create-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                                    <h3 class="text-xl font-semibold text-gray-900 ">
                                                        Tambah Fakultas
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                                        data-modal-hide="create-modal">
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

                                                <form action="{{ $page_meta['url'] }}" method="post"
                                                    enctype="multipart/form-data" novalidate>
                                                    @method($page_meta['method'])
                                                    @csrf

                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <div>
                                                            <label for="name" :value="__('name')"
                                                                class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                                                            <input type="text" name="name" id="name"
                                                                autocomplete="off"
                                                                value="{{ old('name', $member_category->name) }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                                                placeholder="Nama" required>
                                                            <x-input-error :messages="$errors->get('name')" />
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                                                        <button data-modal-hide="create-modal" type="submit"
                                                            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">Simpan</button>
                                                        <button data-modal-hide="create-modal" type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400  dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                                                    </div>
                                                </form>
                                                <!-- Modal body -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Berikut adalah list
                                dari
                                kategori anggota yang akan dijadikan opsi pengisian form.</p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Fakultas
                                </th>
                                <th scope="col" class="hidden sm:block px-6 py-3">
                                    Dibuat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($member_categories as $member_category)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $member_category->name }}
                                    </th>
                                    <td class="hidden sm:block px-6 py-4">
                                        {{ $member_category->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex gap-5">
                                            <a href="{{ route('member_categories.edit', $member_category) }}"
                                                class="font-medium text-yellow-300 hover:underline">Edit</a>
                                            <form onsubmit="return confirm('Yakin hapus anggota ini?')"
                                                action="{{ route('member_categories.destroy', $member_category->id) }}"
                                                method="POST">

                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" class="font-medium text-red-600 hover:underline">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="w-full">
                    <div id="accordion-flush" data-accordion="collapse"
                        data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        data-inactive-classes="text-gray-500 dark:text-gray-400">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                aria-controls="accordion-flush-body-1">
                                <span class="text-start">Gimana cara tambah kategori anggota?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Untuk menambah kategori anggota, klik
                                    tombol
                                    di pojok kanan atas di dalam tabel. Lalu isi dan lengkapi semua yang harus diisi.
                                    Pastikan anda
                                    mengisi dengan benar dan jangan lupa cek kembali.</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </x-side-nav>

</x-app-layout>
