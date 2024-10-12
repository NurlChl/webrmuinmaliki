<x-app-layout>

    @slot('tittle', 'Tentang')

    <x-hero-section imageContent="{{ Storage::url('logo/uin.jpeg')}}">Tentang</x-hero-section>

    <main class="relative pt-8 pb-16 lg:pt-16 lg:pb-24 sm:px-5 bg-white dark:bg-gray-900 antialiased">
        <div class="flex flex-col px-4 mx-auto max-w-screen-lg ">
            <article class="mx-auto w-full max-w-screen-lg format format-sm sm:format-base lg:format-lg format-emerald">
                {{-- <header class="mb-4 lg:mb-6 not-format">
                    <h1
                        class="text-lg font-bold sm:text-3xl sm:font-extrabold leading-tight text-gray-900 mb-2 lg:mb-2 lg:text-4xl dark:text-white">
                        TENTANG RM UIN Maliki</h1>
                </header> --}}
                <div
                    class="grid grid-cols-2 sm:grid-cols-4 gap-1 not-format mt-10 mb-10 mx-auto sm:divide-x border max-w-screen-lg">
                    <div class="flex flex-col px-2 py-10 sm:px-5 justify-center gap-3">
                        <h2 class="text-center text-4xl sm:text-5xl font-extrabold text-emerald-900"
                            id="counter-faculty" data-target="{{ $faculty }}">{{ $faculty }}
                        </h2>
                        <div class="w-1/3 mx-auto h-1 bg-yellow-300"></div>
                        <p class="text-emerald-900 text-center text-sm sm:text-base">
                            Fakultas</p>
                    </div>
                    <div class="flex flex-col px-2 py-10 sm:p-5 justify-center gap-3">
                        <h2 class="text-center text-4xl sm:text-5xl font-extrabold text-emerald-900"
                            id="counter-member-category" data-target="{{ $member_category }}">
                            {{ $member_category }}</h2>
                        <div class="w-1/3 mx-auto h-1 bg-yellow-300"></div>
                        <p class="text-emerald-900 text-center text-sm sm:text-base">Organisasi</p>
                    </div>
                    <div class="flex flex-col px-2 py-10 sm:p-5 justify-center gap-3">
                        <h2 class="text-center text-4xl sm:text-5xl font-extrabold text-emerald-900" id="counter-member"
                            data-target="{{ $member }}">{{ $member }}
                        </h2>
                        <div class="w-1/3 mx-auto h-1 bg-yellow-300"></div>
                        <p class="text-emerald-900 text-center text-sm sm:text-base">Anggota</p>
                    </div>
                    <div class="flex flex-col px-2 py-10 sm:p-5 justify-center gap-3">
                        <h2 class="text-center text-4xl sm:text-5xl font-extrabold text-emerald-900" id="counter-rule"
                            data-target="{{ $rule }}">{{ $rule }}
                        </h2>
                        <div class="w-1/3 mx-auto h-1 bg-yellow-300"></div>
                        <p class="text-emerald-900 text-center text-sm sm:text-base">Peraturan</p>
                    </div>
                </div>

                {!! $about->body !!}


                <div class="mt-10 max-w-screen-lg mx-auto">
                    <h1 class=" mb-5 ">Lokasi Universitas</h1>
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.456858223945!2d112.60514097476774!3d-7.951649592072768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7883cf449ec851%3A0x922d388d7733a4ed!2sUIN%20Maulana%20Malik%20Ibrahim%20Malang!5e0!3m2!1sen!2sid!4v1725507425365!5m2!1sen!2sid"
                            class="w-full aspect-video" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </article>

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const counters = [{
                        id: 'counter-faculty',
                        target: parseInt(document.getElementById('counter-faculty').getAttribute('data-target'))
                    },
                    {
                        id: 'counter-member-category',
                        target: parseInt(document.getElementById('counter-member-category').getAttribute(
                            'data-target'))
                    },
                    {
                        id: 'counter-member',
                        target: parseInt(document.getElementById('counter-member').getAttribute('data-target'))
                    },
                    {
                        id: 'counter-rule',
                        target: parseInt(document.getElementById('counter-rule').getAttribute('data-target'))
                    },
                ];

                counters.forEach(({
                    id,
                    target
                }) => {
                    const counter = document.getElementById(id);
                    if (target === 0) {
                        // Jika target adalah 0, langsung tampilkan 0 tanpa animasi
                        counter.innerText = '00';
                    } else {
                        let count = 0;
                        const duration = 2000; // durasi animasi dalam milidetik
                        const interval = Math.floor(duration /
                            target); // interval berdasarkan durasi dan target

                        const incrementCounter = () => {
                            count++;
                            counter.innerText = count < 10 ? `0${count}` : count;
                            if (count < target) {
                                setTimeout(incrementCounter, interval);
                            }
                        };

                        incrementCounter();
                    }
                });
            });
        </script>


    </main>


</x-app-layout>
