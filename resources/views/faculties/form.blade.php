<form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
    @method($page_meta['method'])
    @csrf

    <div class="p-4 md:p-5 space-y-4">
        <div>
            <label for="name" :value="__('name')"
                class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
            <input type="text" name="name" id="name" autocomplete="off"
                value="{{ old('name', $faculty->name) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                placeholder="Nama" required>
            <x-input-error :messages="$errors->get('name')" />
        </div>
        <div>
            <label for="color" :value="__('color')"
                class="block mb-2 text-sm font-medium text-gray-900 ">Warna</label>
            <input type="text" name="color" id="color"
                value="{{ old('color', $faculty->color) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                placeholder="Warna" required>
            <x-input-error :messages="$errors->get('color')" />
        </div>
    </div>
    <!-- Modal footer -->
    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
        <button data-modal-hide="create-modal" type="submit"
            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">Simpan</button>
        <button data-modal-hide="create-modal" type="button"
            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400  dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
    </div>
</form>