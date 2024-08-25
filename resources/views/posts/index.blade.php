<x-app-layout>

    @slot('tittle', 'Postingan')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot> --}}
    <x-container class="max-w-screen-xl mx-auto">
        <section class="max-w-md sm:max-w-xl md:max-w-4xl xl:max-w-6xl mx-auto">
            <h2 class="text-center sm:text-start uppercase text-lg font-bold text-red-600 mb-5">Semua Berita</h2>
            <div class=" gap-5 md:columns-2 xl:columns-2 [&>article:not(:first-child)]:mt-5 ">
                @forelse ($posts as $post)
                    <article
                        class="relative p-0 box-border bg-white overflow-hidden rounded-lg border border-gray-200 shadow-md group">
                        <img src="{{ $post->image }}" alt="{{ $post->slug }}"
                            class="object-cover max-h-64 w-full sm:max-h-max sm:object-contain group-hover:scale-105 group-hover:brightness-75 transition ease-in-out duration-300">
                        <a href="{{ route('posts.show', $post) }}" class="absolute top-0 left-0 w-full h-full object-cover z-20"></a>
                        <div class="absolute  top-0 left-0 w-full h-full flex flex-col justify-between  z-10 ">
                            <span
                                class="bg-primary-100 m-4 w-fit text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-full bg-opacity-70">
                                Berita
                            </span>

                            <div class="p-4 bg-gradient-to-t from-slate-800 to-transparent">
                                <p class="text-gray-300 text-xs  font-semibold group-hover:-translate-y-1 sm:group-hover:-translate-y-3 transition ease-in-out duration-300">{{ $post->created_at->format('d m Y') }}</p>
                                <h2 class="text-white text-base sm:text-lg font-bold group-hover:-translate-y-1 sm:group-hover:-translate-y-3 transition ease-in-out duration-300">{{ str()->limit($post->tittle, 70) }}</h2>
                            </div>
                        </div>
                    </article>

                @empty

                    <div class="px-4 py-3 text-center md:col-span-2 lg:col-span-2">
                        <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="0.1"
                                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                            </svg>
                            <span class="text-gray-400">Tidak ada Postingan</span>
                    </div>
                @endforelse


            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </section>

        <section class="max-w-md sm:max-w-xl md:max-w-4xl xl:max-w-6xl mx-auto mt-20">
            <h2 class="text-center sm:text-start uppercase text-lg font-bold text-red-600 mb-5">Kategori</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ( $member_categories as $member_category )
                <a href="#">
                    <div class="relative flex justify-center items-center bg-yellow-200 w-full h-full text-center">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8dW5pdmVyc2l0eXxlbnwwfHwwfHx8MA%3D%3D" alt="" class="absolute top-0 left-0 w-full h-full object-cover">
                        <h2 class="flex items-center justify-center text-lg font-semibold bg-yellow-200 z-10 px-3 py-10 md:px-6 md:py-20 bg-opacity-90 w-full h-full">{{ $member_category->name }}</h2>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

    </x-container>

</x-app-layout>
