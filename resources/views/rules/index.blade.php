<x-app-layout>

    @slot('tittle', 'Peraturan')

    <x-container>

        <div class="mx-auto max-w-screen-xl lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white pt-5 relative shadow-md sm:rounded-lg overflow-hidden ">
                <div
                    class="flex flex-col md:flex-row items-end justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mb-5">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('period'))
                                <input type="hidden" name="period" value="{{ request('period') }}">
                            @endif
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="search" id="simple-search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                    placeholder="Search">
                            </div>
                        </form>
                    </div>

                    <div class="flex gap-5">
                        <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown-category"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-xs sm:text-sm px-3 sm:px-5 py-2 sm:py-2.5 text-center inline-flex items-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800"
                            type="button">{{ isset($selectedCategory) ? $selectedCategory : 'Kategori' }}<svg
                                class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="multi-dropdown-category"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="multiLevelDropdownButton">
                                <li class="max-h-52 overflow-y-auto">
                                    <a href="{{ route('rules.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 border-b">Semua</a>
                                    @foreach ($rule_categories as $rule_category)
                                        <a href="{{ route('rules.index', array_merge(request()->query(), ['category' => $rule_category->slug])) }}"
                                            class="block px-4 py-2 hover:bg-gray-100">{{ $rule_category->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>


                        <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown-year"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-xs sm:text-sm px-3 sm:px-5 py-2 sm:py-2.5 text-center inline-flex items-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800"
                            type="button">{{ isset($selectedPeriod) ? $selectedPeriod : 'Tahun' }}<svg
                                class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="multi-dropdown-year"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="multiLevelDropdownButton">
                                <li>
                                    <a href="{{ route('rules.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 border-b">Semua</a>
                                    @for ($i = 2021; $i <= Now()->format('Y'); $i++)
                                        <a href="{{ route('rules.index', array_merge(request()->query(), ['period' => $i])) }}"
                                            class="block px-4 py-2 hover:bg-gray-100">{{ $i }}</a>
                                    @endfor
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Tahun</th>
                                <th scope="col" class="px-4 py-3">Kategori</th>
                                <th scope="col" class="px-4 py-3">Dokumen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rules as $rule)
                                <tr class="border-b dark:border-gray-700 ">

                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>

                                    <td class="px-4 py-3 font-medium min-w-56 max-w-xs text-gray-900">
                                        <span class="line-clamp-3"
                                            data-popover-target="popover-rule-name-{{ $loop->iteration }}">{{ $rule->name }}</span>

                                        <div data-popover id="popover-rule-name-{{ $loop->iteration }}" role="tooltip"
                                            class="absolute z-10 invisible inline-block max-w-md text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                            <div class="px-3 py-2">
                                                <p>{{ $rule->name }}</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">{{ $rule->period }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $rule->ruleCategory->name }}</td>
                                    <td class="px-2 sm:px-4 py-3">
                                        {{-- <img src="{{ Storage::url($rule->file) }}" alt="{{ $rule->name }}"
                                                class=" h-10 w-10 rounded-full sm:rounded-none sm:w-20 sm:h-20 md:w-36 md:h-36 object-cover"> --}}
                                        <a href="{{ Storage::url($rule->file) }}" target="_blank"
                                            class="flex flex-col justify-center w-fit gap-1 hover:underline group">
                                            <svg class="w-6 h-6 text-gray-800 self-center group-hover:text-emerald-500 transition ease-in-out duration-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1"
                                                    d="M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m14 9.006h-.335a1.647 1.647 0 0 1-1.647-1.647v-1.706a1.647 1.647 0 0 1 1.647-1.647L19 12M5 12v5h1.375A1.626 1.626 0 0 0 8 15.375v-1.75A1.626 1.626 0 0 0 6.375 12H5Zm9 1.5v2a1.5 1.5 0 0 1-1.5 1.5v0a1.5 1.5 0 0 1-1.5-1.5v-2a1.5 1.5 0 0 1 1.5-1.5v0a1.5 1.5 0 0 1 1.5 1.5Z" />
                                            </svg>
                                            <span class="text-xs text-center">Detail</span>
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr class="border-b dark:border-gray-700 ">
                                    <td class="px-4 py-3 text-center" colspan="6">
                                        <svg class="w-20 h-20 mx-auto text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="0.1"
                                                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                        </svg>
                                        <span>Tidak ada Peraturan</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="p-2 sm:p-5">
                    {{ $rules->links() }}
                </div>
            </div>
        </div>

    </x-container>

</x-app-layout>
