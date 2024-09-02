<x-app-layout>

    @slot('tittle', $page_meta['title'])
    @php
        $inputError =
            'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500';
        $inputValid = 'bg-green-50 border border-green-300 text-green-900 focus:ring-green-500 focus:border-green-500';
        $inputFirst = 'bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500';
    @endphp
    <x-form-container class="relative bg-zinc-200 bg-fixed bg-cover"
        style="background-image: url('http://projekuin.test/logo/unsplashbg2.jpg')">
        <canvas id="canvas" class="opacity-60 absolute left-0 top-0 w-full h-full z-0"></canvas>

        <section class="relative bg-white md:w-fit mx-auto p-5 sm:p-5 z-10 md:bg-opacity-50 mb-20 shadow-2xl">
            <div
                class="absolute top-1/2 left-1/2 w-5/6 h-5/6 transform -translate-x-1/2  -translate-y-1/2 bg-zinc-50 bg-gradient-to-br from-zinc-50 to-zinc-300 opacity-0 md:opacity-40 blur-lg">
            </div>
            {{-- <div class="absolute top-0 left-0 w-full h-full bg-white "></div> --}}
            <div class="py-8 px-0 sm:px-4 max-w-screen-md lg:py-10 mx-auto relative z-10">
                <h2 class="mb-10 text-xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $page_meta['title'] }}
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
                                placeholder="NIM" required>
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
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aspirasi</label>
                            <textarea name="body" id="body"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Tulis aspirasimu" required>{{ old('body', $aspiration->body) }}</textarea>
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
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
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

    </x-form-container>

</x-app-layout>
