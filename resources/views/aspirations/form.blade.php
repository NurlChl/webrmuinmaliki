<x-app-layout>

    @slot('tittle', $page_meta['title'])
    @php
        $inputError =
            'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500';
        $inputValid = 'bg-green-50 border border-green-300 text-green-900 focus:ring-green-500 focus:border-green-500';
        $inputFirst = 'bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500';
    @endphp
    <x-container>

        <section class=" mx-auto w-full p-5 bg-white max-w-screen-md">
            {{-- <div class="absolute top-0 left-0 w-full h-full bg-white "></div> --}}
            <div class="py-8 px-0 sm:px-4 max-w-screen-md lg:py-10 mx-auto">
                <h2 class="mb-10 text-xl sm:text-3xl font-bold text-gray-900 text-center">{{ $page_meta['title'] }}
                </h2>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                    @method($page_meta['method'])
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">

                            <h3 class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Aspirasi</h3>
                            <ul class="grid w-full gap-5 sm:grid-cols-3">
                                @foreach ($aspiration_types as $aspiration_type)
                                    <li>
                                        <input type="radio" id="{{ $aspiration_type->slug }}" name="type_id"
                                            value="{{ $aspiration_type->id }}"
                                            {{ $aspiration_type->slug == 'aspirasi' ? 'checked' : '' }}
                                            {{ old('type_id') == $aspiration_type->id ? 'checked' : '' }}
                                            class="hidden peer" required />
                                        <label for="{{ $aspiration_type->slug }}"
                                            class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-gray-50 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-emerald-600 peer-checked:text-emerald-600 hover:text-gray-600 hover:bg-gray-100">
                                            <div class="block">
                                                <div class="w-full text-sm md:text-md font-normal">
                                                    {{ $aspiration_type->name }}</div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>

                            <x-input-error :messages="$errors->get('type_id')" />
                        </div>

                        <div class="sm:col-span-1 w-full mx-auto">
                            <label for="name" :value="__('name')"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
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

                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $aspiration->name) }}"
                                    class=" @error('name') {{ $inputError }} @elseif (old('name') && !$errors->has('name')) {{ $inputValid }} @else {{ $inputFirst }} @enderror  text-sm rounded-lg block w-full ps-10 p-2.5"
                                    placeholder="Nama" required>
                            </div>
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        <div class="sm:col-span-1 w-full mx-auto">
                            <label for="nim" :value="__('nim')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
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
                                <input type="number" name="nim" id="nim"
                                    value="{{ old('nim', $aspiration->nim) }}"
                                    class="@error('nim') {{ $inputError }} @elseif (old('nim') && !$errors->has('nim')) {{ $inputValid }} @else {{ $inputFirst }} @enderror text-sm rounded-lg block w-full ps-10 p-2.5"
                                    placeholder="Contoh: 219023034923" required>
                            </div>
                            <x-input-error :messages="$errors->get('nim')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address" :value="__('address')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>
                                <input type="text" name="address" id="address"
                                    value="{{ old('address', $aspiration->address) }}"
                                    class="@error('address') {{ $inputError }} @elseif (old('address') && !$errors->has('address')) {{ $inputValid }} @else {{ $inputFirst }} @enderror text-sm rounded-lg block w-full ps-10 p-2.5"
                                    placeholder="Alamat" required>
                            </div>
                            <x-input-error :messages="$errors->get('address')" />
                        </div>

                        <div class="sm:col-span-1 w-full mx-auto">
                            <label for="telephone" :value="__('telephone')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telp</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                                    </svg>


                                </div>
                                <input type="number" name="telephone" id="telephone"
                                    value="{{ old('telephone', $aspiration->telephone) }}"
                                    class="@error('telephone') {{ $inputError }} @elseif (old('telephone') && !$errors->has('telephone')) {{ $inputValid }} @else {{ $inputFirst }} @enderror text-sm rounded-lg block w-full ps-10 p-2.5"
                                    placeholder="Contoh: 6281222333444" required>
                            </div>
                            <x-input-error :messages="$errors->get('telephone')" />
                        </div>

                        <div class="sm:col-span-1 w-full mx-auto">
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
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
                                        <path fill-rule="evenodd"
                                            d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z" />
                                    </svg>

                                </div>
                                <input type="number" name="generation" id="generation"
                                    value="{{ old('generation', $aspiration->generation) }}"
                                    class="@error('generation') {{ $inputError }} @elseif (old('generation') && !$errors->has('generation')) {{ $inputValid }} @else {{ $inputFirst }} @enderror text-sm rounded-lg block w-full ps-10 p-2.5"
                                    placeholder="Contoh: 2021" required>
                            </div>
                            <x-input-error :messages="$errors->get('generation')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="body" :value="__('body')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
                            <textarea name="body" id="body"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Tulis pesanmu" required>{{ old('body', $aspiration->body) }}</textarea>
                            <x-input-error :messages="$errors->get('body')" />
                        </div>

                    </div>



                    <p class="text-sm text-yellow-500 mt-2">* Pastikan yang anda masukkan semua sudah benar. Karena
                        tidak bisa diedit lagi.</p>

                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900 hover:bg-emerald-800">
                        Simpan
                    </button>
                </form>
            </div>
        </section>



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


        <script>
            const canvas = document.querySelector("#canvas");
            const ctx = canvas.getContext("2d");

            let w, h, particles;
            let particleDistance = 40;
            let mouse = {
                x: undefined,
                y: undefined,
                radius: 100
            }

            function init() {
                resizeReset();
                animationLoop();
            }

            function resizeReset() {
                w = canvas.width = window.innerWidth;
                h = canvas.height = window.innerHeight;

                particles = [];
                for (let y = (((h - particleDistance) % particleDistance) + particleDistance) / 2; y < h; y +=
                    particleDistance) {
                    for (let x = (((w - particleDistance) % particleDistance) + particleDistance) / 2; x < w; x +=
                        particleDistance) {
                        particles.push(new Particle(x, y));
                    }
                }
            }

            function animationLoop() {
                ctx.clearRect(0, 0, w, h);
                drawScene();
                requestAnimationFrame(animationLoop);
            }

            function drawScene() {
                for (let i = 0; i < particles.length; i++) {
                    particles[i].update();
                    particles[i].draw();
                }
                drawLine();
            }

            function drawLine() {
                for (let a = 0; a < particles.length; a++) {
                    for (let b = a; b < particles.length; b++) {
                        let dx = particles[a].x - particles[b].x;
                        let dy = particles[a].y - particles[b].y;
                        let distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < particleDistance * 1.5) {
                            opacity = 1 - (distance / (particleDistance * 1.5));
                            ctx.strokeStyle = "rgba(255,255,255," + opacity + ")";
                            ctx.lineWidth = .5;
                            ctx.beginPath();
                            ctx.moveTo(particles[a].x, particles[a].y);
                            ctx.lineTo(particles[b].x, particles[b].y);
                            ctx.stroke();
                        }
                    }
                }
            }

            function mousemove(e) {
                mouse.x = e.x;
                mouse.y = e.y;
            }

            function mouseout() {
                mouse.x = undefined;
                mouse.y = undefined;
            }

            class Particle {
                constructor(x, y) {
                    this.x = x;
                    this.y = y;
                    this.size = 2;
                    this.baseX = this.x;
                    this.baseY = this.y;
                    this.speed = (Math.random() * 25) + 5;
                }
                draw() {
                    ctx.fillStyle = "rgba(255,255,255,1)";
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.fill();
                }
                update() {
                    let dx = mouse.x - this.x;
                    let dy = mouse.y - this.y;
                    let distance = Math.sqrt(dx * dx + dy * dy);
                    let maxDistance = mouse.radius;
                    let force = (maxDistance - distance) / maxDistance; // 0 ~ 1
                    let forceDirectionX = dx / distance;
                    let forceDirectionY = dy / distance;
                    let directionX = forceDirectionX * force * this.speed;
                    let directionY = forceDirectionY * force * this.speed;

                    if (distance < mouse.radius) {
                        this.x -= directionX;
                        this.y -= directionY;
                    } else {
                        if (this.x !== this.baseX) {
                            let dx = this.x - this.baseX;
                            this.x -= dx / 10;
                        }
                        if (this.y !== this.baseY) {
                            let dy = this.y - this.baseY;
                            this.y -= dy / 10;
                        }
                    }
                }
            }

            init();
            window.addEventListener("resize", resizeReset);
            window.addEventListener("mousemove", mousemove);
            window.addEventListener("mouseout", mouseout);
        </script>

    </x-container>

</x-app-layout>
