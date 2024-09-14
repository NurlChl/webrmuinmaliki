<x-app-layout>

    @slot('tittle', 'Postingan')

    <x-container class="max-w-screen-xl mx-auto px-3 py-10 lg:px-0 bg-white lg:mt-10">
        <section class="max-w-screen-sm sm:max-w-screen-sm md:max-w-screen-lg mx-auto">
            <div class="flex flex-col gap-20">
                @forelse ($extracurriculars as $extracurricular)
                    <div class="flex flex-col md:flex-row gap-10 p-2 sm:p-5 md:pl-10">
                        <div class="relative h-fit w-fit mx-auto">
                            <img src="{{ $extracurricular->image }}" alt="{{ $extracurricular->name }}"
                                class="aspect-[5/6] object-cover rounded-xl max-w-56 sm:max-w-xs">
                            <span
                                class="absolute top-10 -left-9 bg-yellow-300 px-2 py-1 rounded-md bg-opacity-85 max-w-48">{{ $extracurricular->leader_name }}</span>
                            <span
                                class="absolute bottom-5 -right-6 bg-yellow-300 px-2 py-1 rounded-md bg-opacity-85 uppercase">Ketua</span>
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <h2 class="text-center md:text-start text-xl sm:text-4xl font-bold uppercase">
                                {{ $extracurricular->name }}</h2>
                            <p class="text-gray-500 text-base sm:text-lg text-justify">{{ $extracurricular->body }}</p>
                            <p class="text-gray-500 text-base sm:text-lg">Kontak: {{ $extracurricular->contact }}</p>
                        </div>
                    </div>
                @empty
                    <div class="px-4 py-3 text-center overflow-hidden">
                        <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="0.1"
                                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                        </svg>
                        <span class="text-gray-400">Tidak ada UKM</span>
                    </div>
                @endforelse
            </div>
        </section>
    </x-container>

</x-app-layout>
