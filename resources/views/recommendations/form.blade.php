<x-app-layout>

    @slot('tittle', $page_meta['title'])
    {{-- <x-slot name="header">
        <h2 class="font-normal text-sm text-gray-500 leading-tight">
            {{ __('posts > create') }}
        </h2>
    </x-slot> --}}
    <x-form-container>
        <section class="bg-white mx-auto w-full p-1 sm:p-5 ">
            <div class="py-8 px-0 sm:px-4 max-w-screen-md lg:py-10 mx-auto">
                <h2 class="mb-10 text-xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $page_meta['title'] }}
                </h2>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                    @method($page_meta['method'])
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="sm:col-span-2">
                            <label for="name" :value="__('name')"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $aspiration->name) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Nama" required>
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="nim" :value="__('nim')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                            <input type="number" name="nim" id="nim"
                                value="{{ old('nim', $aspiration->nim) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="NIM Mahasiswa" required>
                            <x-input-error :messages="$errors->get('nim')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address" :value="__('address')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input type="text" name="address" id="address"
                                value="{{ old('address', $aspiration->address) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Alamat" required>
                            <x-input-error :messages="$errors->get('address')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="telephone" :value="__('telephone')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telp</label>
                            <input type="number" name="telephone" id="telephone"
                                value="{{ old('telephone', $aspiration->telephone) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Contoh: 6281222333444" required>
                            <x-input-error :messages="$errors->get('telephone')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="faculty_id" :value="__('faculty_id')"
                                class="block mb-2 text-sm font-medium text-gray-900">Fakultas</label>
                            <select id="faculty_id" name="faculty_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500">
                                <option disabled>Pilih Fakultas</option>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}"
                                        {{ old('faculty_id', $selectedCategory ?? '') == $faculty->id ? 'selected' : '' }}>
                                        {{ $faculty->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('faculty_id')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="generation" :value="__('generation')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
                            <input type="number" name="generation" id="generation"
                                value="{{ old('generation', $aspiration->generation) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Contoh: 2021" required>
                            <x-input-error :messages="$errors->get('generation')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="body" :value="__('body')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                                Usulanmu</label>
                            <textarea name="body" id="body"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Tulis usulanmu" required>{{ old('body', $aspiration->body) }}</textarea>
                            <x-input-error :messages="$errors->get('body')" />
                        </div>

                    </div>



                    <p class="text-sm text-yellow-500 mt-2">* Pastikan yang anda masukkan semua sudah benar. Karena
                        tidak bisa diedit lagi.</p>

                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900 hover:bg-emerald-800">
                        Simpan
                    </button>
            </div>
            </div>
            </form>
            </div>
        </section>

        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
        <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>

        <script>
            const coords = {
                x: 0,
                y: 0
            };
            const circles = document.querySelectorAll("#circle");

            const colors = [
                "#0aba19", "#39c012", "#53c709", "#69cd00", "#69cd50", "#7dd300", "#7dd500", "#90d900", "#a2df00", "#a2df40", "#b4e400", "#c6ea00", "#d8ef00", "#d8ef30", "#d8ef50", "#eaf305", "#eaf405", "#eaf425", "#eaf505", "#fcf914"
            ];

            circles.forEach(function(circle, index) {
                circle.x = 0;
                circle.y = 0;
                circle.style.backgroundColor = colors[index % colors.length];
            });

            window.addEventListener("mousemove", function(e) {
                coords.x = e.clientX;
                coords.y = e.clientY;

            });

            function animateCircles() {

                let x = coords.x;
                let y = coords.y;

                circles.forEach(function(circle, index) {
                    circle.style.left = x - 12 + "px";
                    circle.style.top = y - 12 + "px";

                    circle.style.scale = (circles.length - index) / circles.length;

                    circle.x = x;
                    circle.y = y;

                    const nextCircle = circles[index + 1] || circles[0];
                    x += (nextCircle.x - x) * 0.3;
                    y += (nextCircle.y - y) * 0.3;
                });

                requestAnimationFrame(animateCircles);
            }

            animateCircles();
        </script>

        <script>
            function updateFileName(input) {
                if (input.files && input.files[0]) {
                    const fileNameFull = input.files[0].name;
                    const fileName = fileNameFull.substring(0, fileNameFull.lastIndexOf('.'));
                    const fileExtension = fileNameFull.split('.').pop();

                    // Update the displayed file name
                    document.getElementById('file-name').textContent = fileName;
                    document.getElementById('file-name-sm').textContent = fileName.length > 10 ? fileName.substring(0, 10) +
                        '...' : fileName;
                    document.getElementById('file-extension').textContent = '.' + fileExtension;
                }
            }
        </script>


        @if (session()->has('success'))
            <div class="fixed bottom-0 right-1/2 translate-x-1/2">
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200 animate-pulse">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif


        </x-side-nav>

</x-app-layout>
