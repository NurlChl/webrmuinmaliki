<x-app-layout>

    @slot('tittle', $page_meta['title'])
    {{-- <x-slot name="header">
        <h2 class="font-normal text-sm text-gray-500 leading-tight">
            {{ __('posts > create') }}
        </h2>
    </x-slot> --}}
    <x-side-nav>
        <section class="bg-white dark:bg-gray-900 w-full p-5">
            <div class="py-8 px-0 sm:px-4 max-w-screen-md lg:py-10 ">
                <h2 class="mb-10 text-xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $page_meta['title'] }}
                </h2>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                    @method($page_meta['method'])
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" :value="__('name')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $rule->name) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Nama Aturan" required>
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        @php

                            $file = old('file', $rule->file);
                            $fileName = pathinfo($file, PATHINFO_FILENAME);
                            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

                        @endphp
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file"
                                :value="__('image')">Upload file</label>
                            <label for="file"
                                class="flex flex-nowrap items-center overflow-hidden rounded-lg cursor-pointer border border-slate-300 bg-slate-50 ">
                                <span class="bg-slate-800 text-sm font-semibold text-white py-2.5 p-4 sm:whitespace-nowrap">Choose
                                    File</span>
                                <div class="flex flex-nowrap items-center overflow-hidden">
                                    <span id="file-name"
                                        class="text-center text-sm pl-4 truncate max-w-full hidden sm:block">{{ old('file', $fileName) }}</span>
                                    <span id="file-name-sm"
                                        class="text-center text-sm pl-4  sm:hidden">{{ Str::limit(old('file', $fileName), 10) }}</span>
                                    <span id="file-extension" class=" text-sm pr-2 sm:pr-4">{{isset($rule->file) ?   '.' . $fileExtension : 'No file chosen' }}</span>
                                </div>

                            </label>
                            <input
                                class="sr-only block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file" name="file" type="file" onchange="updateFileName(this)">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">PDF, WORD, XLS
                                or DOCS (MAX. 2MB).</p>
                            <x-input-error :messages="$errors->get('file')" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="period" :value="__('period')" 
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periode</label>
                            <input type="number" name="period" id="period" min='2021' max='{{ Now()->format('Y') }}'
                                value="{{ old('period', $rule->period) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Masukkan tahun (2021-sekarang)" required>
                            <x-input-error :messages="$errors->get('period')" />
                        </div>
                        <div class="sm:col-span-2">
                            <label for="rule_category_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select id="rule_category_id" name="rule_category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500">
                                <option disabled>Pilih kategori</option>
                                @foreach ($rule_categories as $rule_category)
                                    <option value="{{ $rule_category->id }}"
                                        {{ old('rule_category_id', $selectedCategory ?? '') == $rule_category->id ? 'selected' : '' }}>
                                        {{ $rule_category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('rule_category_id')" />
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



        <script>
            function updateFileName(input) {
                if (input.files && input.files[0]) {
                    const fileNameFull = input.files[0].name;
                    const fileName = fileNameFull.substring(0, fileNameFull.lastIndexOf('.'));
                    const fileExtension = fileNameFull.split('.').pop();

                    // Update the displayed file name
                    document.getElementById('file-name').textContent = fileName;
                    document.getElementById('file-name-sm').textContent = fileName.length > 10 ? fileName.substring(0, 10) +
                        '...' : fileName;
                    document.getElementById('file-extension').textContent = '.' + fileExtension;
                }
            }
        </script>
    </x-side-nav>

</x-app-layout>
