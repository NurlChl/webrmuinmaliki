<x-app-layout>

    @slot('tittle', 'Postingan')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot> --}}
    <x-container class="max-w-screen-xl mx-auto px-3 py-10 lg:px-0 bg-white lg:mt-10">
        <section class="mb-10 max-w-md sm:max-w-xl md:max-w-4xl xl:max-w-6xl mx-auto py-2">
            <div class="flex gap-3 overflow-x-auto whitespace-nowrap" style="scrollbar-width: none">
                <x-badge href="{{ route('posts.index') }}" :active="!request('category')">Semua</x-badge>
                @foreach ($member_categories as $member_category)
                    <x-badge href="{{ route('posts.category', $member_category->slug) }}"
                        :active="request('category') == $member_category->slug">{{ $member_category->name }}</x-badge>
                @endforeach
            </div>
        </section>
        <section class="max-w-md sm:max-w-xl md:max-w-4xl xl:max-w-6xl mx-auto">
            {{-- <h2 class="text-center sm:text-start uppercase text-lg font-bold text-red-600 mb-5">Semua Berita</h2> --}}
            <div class="flex flex-col xl:flex-row gap-5">
                <div class="max-h-screen overflow-y-auto basis-3/4" style="scrollbar-width:none">
                    <div class="gap-5 md:columns-2 xl:columns-2 basis-3/4 [&>article:not(:first-child)]:mt-5">
                        @forelse ($posts as $post)
                            <article class="relative bg-white group h-fit overflow-hidden">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->slug }}"
                                    class="object-cover max-h-60 w-full group-hover:opacity-90 transition-opacity ease-in-out duration-300">
                                <a href="{{ route('posts.show', $post) }}"
                                    class="absolute top-0 left-0 w-full h-full object-cover z-20"></a>
                                <div class="flex flex-col gap-1 py-3">
                                    <h2 class="px-4 font-semibold text-lg border-l-[3px] border-yellow-400">
                                        {{ $post->tittle }}</h2>
                                    <p class="px-4 text-sm font-medium text-slate-600">
                                        {{ $post->created_at->translatedFormat('d F
                                                                                 Y') }}
                                        / <span
                                            class="text-yellow-600 uppercase">{{ $post->member_category->name }}</span>
                                    </p>
                                    <p class="px-4 text-sm">{{ Str::limit($post->excerpt, 150) }}</p>
                                </div>
                            </article>

                        @empty
                            <div class="px-4 py-3 text-center md:col-span-2 lg:col-span-2 overflow-hidden">
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
                </div>

                <div class="xl:basis-1/3 ">
                    <div class="bg-white px-3">
                        <h2 class="text-center sm:text-start uppercase text-lg font-bold text-red-600 mb-5">BERITA
                            POPULER
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-x-5 gap-y-2 xl:max-h-[93vh] overflow-y-auto"
                            style="scrollbar-width:none">
                            @forelse ($posts_populer as $post_populer)
                                <article class="relative flex gap-2 group">
                                    <img src="{{ Storage::url($post_populer->image) }}"
                                        alt="{{ $post_populer->slug }}"
                                        class="w-32 aspect-video object-cover rounded-lg group-hover:opacity-90 transition-opacity ease-in-out duration-300">
                                    <a href="{{ route('posts.show', $post_populer) }}"
                                        class="absolute top-0 left-0 w-full h-full"></a>
                                    <div class="flex flex-col">
                                        <h2
                                            class="font-semibold line-clamp-2 group-hover:text-emerald-600 transition-colors ease-in-out duration-300">
                                            {{ $post_populer->tittle }}</h2>
                                        <div class="flex">
                                            <span class="my-auto">
                                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1"
                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                    <path stroke="currentColor" stroke-width="1"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>

                                            </span>
                                            <span class=" text-xs my-auto">{{ $post_populer->views }}x</span>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <div class="px-2 py-3 text-center">
                                    <svg class="w-10 h-10 mx-auto text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.1"
                                            d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                    </svg>
                                    <span class="text-gray-400 text-sm">Berita populer belum ada</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <section class="max-w-md sm:max-w-xl md:max-w-4xl xl:max-w-6xl mx-auto mt-16">
            <h2 class="text-center sm:text-start uppercase text-lg font-bold text-red-600 mb-5">Kategori</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ($member_categories as $member_category)
                    <a href="{{ route('posts.category', $member_category->slug) }}">
                        <div class="relative flex justify-center items-center bg-yellow-200 w-full h-full text-center">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8dW5pdmVyc2l0eXxlbnwwfHwwfHx8MA%3D%3D"
                                alt="" class="absolute top-0 left-0 w-full h-full object-cover">
                            <h2
                                class="flex items-center justify-center text-lg font-semibold bg-yellow-200 z-10 px-3 py-10 md:px-6 md:py-20 bg-opacity-90 w-full h-full">
                                {{ $member_category->name }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

    </x-container>

</x-app-layout>
