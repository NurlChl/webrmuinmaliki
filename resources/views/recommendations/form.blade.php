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

                        <div class="sm:col-span-2 w-full mx-auto">
                            <label for="name" :value="__('name')"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                            clip-rule="evenodd" />
                                    </svg>




                                </div>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $aspiration->name) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5"
                                    placeholder="Nama" required>
                            </div>
                            <x-input-error :messages="$errors->get('name')" />
                        </div>


                        <div class="sm:col-span-2">
                            <label for="nim" :value="__('nim')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                            <input type="number" name="nim" id="nim"
                                value="{{ old('nim', $aspiration->nim) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Contoh: 219023034923" required>
                            <x-input-error :messages="$errors->get('nim')" />
                        </div>

                        <div class="sm:col-span-2 w-full mx-auto">
                            <label for="nim" :value="__('nim')"
                                class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="nim" name="nim"
                                    value="{{ old('nim', $aspiration->nim) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5"
                                    placeholder="Contoh: 219023034923" required>
                            </div>
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

                        <div class="sm:col-span-2 w-full mx-auto">
                            <label for="address" :value="__('address')"
                                class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                      </svg>
                                      
                                </div>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address', $aspiration->address) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5"
                                    placeholder="Alamat" required>
                            </div>
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

                        <div class="sm:col-span-2 w-full mx-auto">
                            <label for="telephone" :value="__('telephone')"
                                class="block mb-2 text-sm font-medium text-gray-900">No. Telp</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                      </svg>
                                      
                                </div>
                                <input type="number" id="telephone" name="telephone"
                                    value="{{ old('telephone', $aspiration->telephone) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5"
                                    placeholder="Contoh: 6281222333444" required>
                            </div>
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

                        <div class="sm:col-span-2 w-full mx-auto">
                            <label for="generation" :value="__('generation')"
                                class="block mb-2 text-sm font-medium text-gray-900">Angkatan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                      </svg>
                                      
                                </div>
                                <input type="number" id="generation" name="generation"
                                    value="{{ old('generation', $aspiration->generation) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5"
                                    placeholder="Contoh: 2021" required>
                            </div>
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

        {{-- <div class="h-6 w-6 rounded-full bg-black fixed top-0 left-0 pointer-events-none z-50 hidden md:block" id="circle"></div>
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
        </script> --}}

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
