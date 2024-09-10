<x-app-layout>

    @slot('tittle', 'Anggota')
    @vite('resources/css/3dgalleries.css')

    <x-side-nav>
        <section class=" -translate-y-6">
            <div class=" mx-auto max-w-screen-xl rounded-tr-lg rounded-tl-lg overflow-hidden">
                <div class="custom3d-slide">
                    <div class="banner max-h-[60vh] lg:max-h-full">
                        <div class="slider" style="--quantity: {{ $totalGalleries }}">
                            @foreach ($galleries as $gallery)
                                <div class="item" style="--position: {{ $loop->iteration }}"><img
                                        src="{{ $gallery->image }}" alt="slide"></div>
                            @endforeach
                        </div>
                        <div class="content">
                            <h1 data-content="KEGIATAN" class="hidden md:block">
                                KEGIATAN
                            </h1>
                            <div class="author hidden md:block">
                                <h2>RM</h2>
                                <p><b>UIN Maliki</b></p>
                                <p>
                                    Beberapa kegiatan dalam organisasi
                                </p>
                            </div>
                            <div class="model"></div>
                        </div>
                    </div>

                </div>

                <div class="py-8 px-2 sm:py-8 sm:px-4 w-full mx-auto lg:pl-16 lg:px-6">
                    <div class="mt-20 mb-10 max-w-md mx-auto">
                        <h2 class="text-center font-bold text-4xl uppercase mb-3">Galeri</h2>
                        <p class="text-center font-normal">Foto-foto yang ditampilkan <span
                                class="text-orange-400 font-semibold">maksimal</span> 10, jadi kalau galeri lebih dari
                            10 jangan lupa dihapus sisanya yaa... agar <span
                                class="text-orange-400 font-semibold">penyimpanan</span> web tidak penuh.</p>
                    </div>
                    <div class="gap-5 sm:columns-2 xl:columns-3 [&>div:not(:first-child)]:mt-5 ">
                        @forelse ($galleries as $gallery)
                            <div class="relative group overflow-hidden rounded-lg">
                                <div
                                    class="absolute top-0 right-0 flex -translate-y-10 gap-1 group-hover:translate-y-0 transition-all ease-in-out delay-200 duration-500">
                                    <a href="{{ route('galleries.edit', $gallery) }}"
                                        class="px-5 py-1 bg-yellow-200 w-full">E</a>
                                    <form onsubmit="return confirm('Yakin hapus anggota ini?')"
                                        action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">

                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="px-5 py-1 bg-red-600 w-full">
                                            H
                                        </button>
                                    </form>
                                </div>
                                <img class='object-contain w-full' src="{{ $gallery->image }}" alt="">
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </section>
    </x-side-nav>

</x-app-layout>
