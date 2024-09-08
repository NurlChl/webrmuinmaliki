<x-app-layout>

    @slot('tittle', 'Dashboard')
    {{-- @include('components.side-nav') --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    
    <x-side-nav>
        <section class="bg-white">
            <div class="px-4 mx-auto max-w-screen-xl py-16 lg:px-6">
                <div class="max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ini adalah bagian Dashboard untuk mengakses fitur sebagai Admin</h2>
                    <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">Selamat datang di dashboard admin. Di sini, Anda dapat mengelola seluruh fitur dan data yang diperlukan untuk menjalankan dan mengoptimalkan sistem. Mulai dari pengelolaan pengguna, pengaturan konten dan pemantauan aspirasi, komplain, pengajuan informasi serta usulan peraturan dari masyarakat UIN Maliki Malang, semua dapat diakses dengan mudah. Pastikan untuk selalu memantau informasi terbaru dan mengambil keputusan yang tepat untuk mendukung kelancaran operasional. Dashboard ini dirancang untuk memberikan kemudahan dan kontrol penuh dalam menjalankan website RM UIN Maliki.</p>
                    {{-- <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                        <a class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white cursor-pointer bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 dark:focus:ring-emerald-900">
                            Lebih lanjut
                        </a>
                    </div> --}}
                </div>
            </div>
        </section>
        
    </x-side-nav>
    
</x-app-layout>
