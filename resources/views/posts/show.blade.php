<x-app-layout>

    @slot('tittle', $post->tittle)


    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->tittle }}</h1>

                    <div class="flex gap-3 mb-2">
                        <a href="{{ route('posts.edit', $post) }}"
                            class=" flex space-x-1 text-yellow-400 hover:underline">
                            <svg class="w-full h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1"
                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                            <span>Edit</span>
                        </a>
                        <form onsubmit="return confirm('Yakin hapus anggota ini?')"
                            action="{{ route('posts.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button class="flex space-x-1 text-red-600 hover:underline ">
                                <svg class="w-full h-full self-center" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                    @auth
                        @if ($post->user_id === auth()->user()->id)
                        @endif
                    @endauth

                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->tittle }}"
                        class="w-full aspect-video object-cover mb-5">

                </header>

                {!! $post->body !!}

                <div class="mt-5">
                    <p class=" text-sm font-semibold text-emerald-600"> Diposting pada
                        {{ $post->created_at->format('d/m/Y') }}</p>
                </div>
            </article>



        </div>
    </main>


</x-app-layout>
