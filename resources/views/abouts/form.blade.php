<x-app-layout>

    @slot('tittle', $page_meta['title'])

    <x-side-nav>
        @error('info')
            <x-alert-info>{{ $message }}</x-alert-info>
        @enderror
        <section class="bg-white dark:bg-gray-900 w-full p-5">
            <div class="py-8 px-0 sm:px-4 max-w-screen-md lg:py-10 ">
                <h2 class="mb-10 text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $page_meta['title'] }}
                </h2>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                    @method($page_meta['method'])
                    @csrf
                    <div>
                        <div class="overflow-hidden">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                :value="__('body')">Isi Tentang</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $about->body) }}">
                            <trix-editor input="body"></trix-editor>
                            <x-input-error :messages="$errors->get('body')" />
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900 hover:bg-emerald-800">
                        Simpan
                    </button>
                </form>
            </div>
        </section>
    </x-side-nav>



    <script>
        document.addEventListener("trix-initialize", function(event) {
            const editor = event.target;
            const toolbar = editor.toolbarElement;

            const imageButton = toolbar.querySelector("[data-trix-action='attachFiles']");
            imageButton.style.display = 'none';

            const fileToolsGroup = toolbar.querySelector('.trix-button-group--file-tools');
            fileToolsGroup.style.display = 'none';

        });
    </script>
</x-app-layout>
