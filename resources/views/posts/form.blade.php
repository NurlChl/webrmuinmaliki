<x-app-layout>

    @slot('tittle', $page_meta['title'])

    <x-side-nav>
        <section class="bg-white dark:bg-gray-900 w-full p-5">
            <div class="py-8 px-0 sm:px-4 max-w-screen-md lg:py-10 ">
                <h2 class="mb-10 text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $page_meta['title'] }}
                </h2>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                    @method($page_meta['method'])
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="tittle" :value="__('tittle')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" name="tittle" id="tittle"
                                value="{{ old('tittle', $post->tittle) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Judul postingan" required>
                            <x-input-error :messages="$errors->get('tittle')" />
                        </div>
                        <div class="sm:col-span-2">
                            <label for="member_category_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select id="member_category_id" name="member_category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled>Pilih kategori</option>
                                @foreach ($member_categories as $member_category)
                                    <option value="{{ $member_category->id }}"
                                        {{ old('member_category_id', $selectedCategory ?? '') == $member_category->id ? 'selected' : '' }}>
                                        {{ $member_category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('member_category_id')" />
                        </div>
                        <div class="sm:col-span-2">
                            <div class="col-span-full">
                                <label for="cover-photo"
                                    class="block text-sm font-medium leading-6 text-gray-900">Gambar</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg id="svg-img" class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <img class="img-preview hidden w-full" />
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="image" :value="__('image')"
                                                class="relative cursor-pointer w-full rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span id="upload-label">
                                                    {{ isset($post->image) ? 'Gambar sebelumnya sudah ada. Klik untuk ganti' : 'Upload gambar' }}
                                                </span>
                                                <input id="image" name="image" type="file" class="sr-only"
                                                    accept="image/*" required onchange="updateFileName()">
                                            </label>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 2MB</p>
                                    </div>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('image')" />
                        </div>

                        <div class="sm:col-span-2 overflow-hidden">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                :value="__('body')">Isi
                                postingan</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                            <trix-editor input="body"></trix-editor>
                            <x-input-error :messages="$errors->get('body')" />
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900 hover:bg-emerald-800">
                        Simpan
                    </button>
            </div>
            </div>
            </form>
            </div>
        </section>
    </x-side-nav>



    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('image');
            const fileSize = fileInput.files[0].size / 1024 / 1024; // ukuran dalam MB

            if (fileSize > 2) { // batasan 2MB
                alert('Gambar maksimal 2 MB');
                event.preventDefault();
            }
        });

        function updateFileName() {
            const input = document.getElementById('image');
            const label = document.getElementById('upload-label');
            const imgPreview = document.querySelector('.img-preview')
            const svgImg = document.querySelector('#svg-img')

            imgPreview.style.display = 'block';
            svgImg.style.display = 'none';

            if (input.files.length > 0) {
                label.textContent = input.files[0].name;
            }


            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }

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
