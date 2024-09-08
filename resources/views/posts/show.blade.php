<x-app-layout>

    @slot('tittle', $post->tittle)


    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex flex-col px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-emerald">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1
                        class="text-lg font-bold sm:text-3xl sm:font-extrabold leading-tight text-gray-900 mb-2 lg:mb-2 lg:text-4xl dark:text-white">
                        {{ $post->tittle }}</h1>
                    <a href="{{ route('posts.category', $post->member_category) }}"
                        class="mb-4 lg:mb-6 bg-emerald-100 text-emerald-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                        <svg class="mr-1 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ $post->member_category->name }}</span>
                    </a>
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->tittle }}"
                        class="w-full aspect-video object-cover mb-5">
                </header>

                {!! $post->body !!}

                <div class="mt-5">
                    <p class=" text-sm font-semibold text-emerald-600"> Diposting pada
                        {{ $post->created_at->format('d/m/Y') }}</p>
                </div>



            </article>

            <div class="mx-auto w-full max-w-2xl">
                <div class="flex justify-between gap-2 border-t border-b border-zinc-200 py-3">
                    <div class="flex gap-5 my-auto">
                        <p class="text-xs font-medium text-yellow-600 flex gap-1">
                            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="1.5"
                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="1.5"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span class="my-auto">{{ $post->views }}x</span>
                        </p>
                        <p class="text-xs font-medium text-yellow-600 flex gap-1">
                            {{-- <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1"
                                    d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                            </svg> --}}
                            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="my-auto">{{ $post->comments->count() }} Komentar</span>
                        </p>
                    </div>


                    <button type="button" data-modal-target="course-modal" data-modal-toggle="course-modal"
                        class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-2 sm:px-5 sm:py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.5 3A3.5 3.5 0 0 0 14 7L8.1 9.8A3.5 3.5 0 0 0 2 12a3.5 3.5 0 0 0 6.1 2.3l6 2.7-.1.5a3.5 3.5 0 1 0 1-2.3l-6-2.7a3.5 3.5 0 0 0 0-1L15 9a3.5 3.5 0 0 0 6-2.4c0-2-1.6-3.5-3.5-3.5Z" />
                        </svg>
                        <span class="hidden sm:block">Bagikan</span>
                    </button>

                    <!-- Main modal -->
                    <div id="course-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-lg max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5">
                                    <h3 class="text-lg text-gray-500 dark:text-gray-400">
                                        Bagikan postingan
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-white"
                                        data-modal-toggle="course-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="px-4 pb-4 md:px-5 md:pb-5">
                                    <label for="course-url"
                                        class="text-sm font-medium text-gray-900 dark:text-white mb-2 block">Copy untuk
                                        bagikan ke temanmu:</label>
                                    <div class="relative mb-4">
                                        <input id="course-url" type="text"
                                            class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                            value="{{ url()->current() }}" disabled readonly>
                                        <button data-copy-to-clipboard-target="course-url"
                                            data-tooltip-target="tooltip-course-url"
                                            class="absolute end-2 top-1/2 -translate-y-1/2 bg-white text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                                            <span id="default-icon-course-url">
                                                <svg class="w-3.5 h-3.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 18 20">
                                                    <path
                                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                                </svg>
                                            </span>
                                            <span id="success-icon-course-url" class="hidden items-center">
                                                <svg class="w-3.5 h-3.5 text-emerald-700 dark:text-emerald-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 16 12">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5.917 5.724 10.5 15 1.5" />
                                                </svg>
                                            </span>
                                        </button>
                                        <div id="tooltip-course-url" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            <span id="default-tooltip-message-course-url">Copy to clipboard</span>
                                            <span id="success-tooltip-message-course-url"
                                                class="hidden">Copied!</span>
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <button type="button" data-modal-hide="course-modal"
                                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <form class="mt-3 bg-zinc-100 px-3 py-2 rounded-lg" action="{{ route('comments.store') }}"
                    method="post" enctype="multipart/form-data" novalidate>
                    {{-- @method($page_meta['method']) --}}
                    @csrf
                    <h4 class=" text-lg font-semibold mb-3">Komentar</h4>

                    <div class="flex flex-col gap-3 sm:gap-3">
                        <input type="hidden" name="post_id" value="{{ old('post_id', $post->id) }}" required>
                        <div class="border border-gray-200 rounded-lg bg-gray-50">
                            <div class="px-4 py-2 bg-white rounded-lg">
                                <label for="name" :value="__('name')"
                                    class=" text-sm font-medium text-gray-900 sr-only">Nama</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    autocomplete="off"
                                    class="bg-gray-50 border-none text-gray-900 px-0 text-sm rounded-lg focus:ring-0 focus:border-emerald-600 block w-full"
                                    placeholder="Nama" required>
                                <x-input-error :messages="$errors->get('name')" />
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg bg-gray-50">
                            <div class="px-4 py-2 bg-white rounded-t-lg">
                                <label for="body" :value="__('body')"
                                    class="text-sm text-gray-900 sr-only">Pesan</label>
                                <textarea name="body" id="body" class="px-0 border-none w-full focus:ring-0 resize-none"
                                    placeholder="Tulis komentar..." required>{{ old('body') }}</textarea>
                                <div id="char-count" class="mt-2 mb-1 text-xs text-gray-500">1000 karakter tersisa
                                </div>
                                <x-input-error :messages="$errors->get('body')" />
                            </div>
                            <div class="border-t px-3 py-2">
                                <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-emerald-700 rounded-lg focus:ring-4 focus:ring-emerald-200 hover:bg-emerald-800">
                                    Kirim komentar
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="border-b-4 rounded-full border-emerald-200 col-span-2 mt-5"></div>

                <div class="mt-4">
                    @forelse ($post->comments as $comment)
                        <div class="flex items-start gap-2.5 mb-3">
                            <div
                                class="flex flex-col leading-1.5 w-full p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->name }}</span>
                                    <span
                                        class="text-xs font-normal text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                    {{ $comment->body }}</p>
                            </div>
                            <button id="dropdownMenuIconButton"
                                data-dropdown-toggle="dropdownDots{{ $loop->iteration }}"
                                data-dropdown-placement="bottom-start"
                                class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>
                            <div id="dropdownDots{{ $loop->iteration }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <form onsubmit="return confirm('Yakin hapus anggota ini?')"
                                            class="block px-4 py-2 hover:bg-gray-100"
                                            action="{{ route('comments.destroy', $comment->id) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="px-4 py-3 text-center md:col-span-2 lg:col-span-2">
                            <svg class="w-20 h-20 mx-auto text-gray-300 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <p class="font-semibold">Belum ada komentar.</p>
                            <span class="text-gray-400">Jadilah yang pertama berkomentar di sini</span>
                        </div>
                    @endforelse

                </div>


            </div>


        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const commentInput = document.getElementById('body');
                const charCountDisplay = document.getElementById('char-count');

                commentInput.addEventListener('input', function() {
                    const charCount = commentInput.value.length;
                    if (charCount <= 1000) {
                        charCountDisplay.textContent = 1000 - charCount + ' karakter tersisa';
                        charCountDisplay.classList.remove('text-red-600')
                    } else {
                        charCountDisplay.textContent = charCount - 1000 + ' karakter melebihi batas';
                        charCountDisplay.classList.add('text-red-600')
                    }
                });
            });


            const textarea = document.getElementById('body');

            textarea.addEventListener('input', function() {
                this.style.height = 'auto'; // Reset tinggi textarea ke `auto`
                this.style.height = this.scrollHeight + 'px'; // Sesuaikan tinggi dengan isi textarea
            });
        </script>

        {{-- <script>
            const clipboard = FlowbiteInstances.getInstance('CopyClipboard', 'course-url');
            const tooltip = FlowbiteInstances.getInstance('Tooltip', 'tooltip-course-url');

            const $defaultIcon = document.getElementById('default-icon-course-url');
            const $successIcon = document.getElementById('success-icon-course-url');

            const $defaultTooltipMessage = document.getElementById('default-tooltip-message-course-url');
            const $successTooltipMessage = document.getElementById('success-tooltip-message-course-url');

            clipboard.updateOnCopyCallback((clipboard) => {
                showSuccess();

                // reset to default state
                setTimeout(() => {
                    resetToDefault();
                }, 2000);
            })

            const showSuccess = () => {
                $defaultIcon.classList.add('hidden');
                $successIcon.classList.remove('hidden');
                $defaultTooltipMessage.classList.add('hidden');
                $successTooltipMessage.classList.remove('hidden');
                tooltip.show();
            }

            const resetToDefault = () => {
                $defaultIcon.classList.remove('hidden');
                $successIcon.classList.add('hidden');
                $defaultTooltipMessage.classList.remove('hidden');
                $successTooltipMessage.classList.add('hidden');
                tooltip.hide();
            }
        </script> --}}
    </main>


</x-app-layout>
