<x-app-layout>

    @slot('tittle', 'Dashboard')
    {{-- @include('components.side-nav') --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    
    <x-side-nav>
        <section class="bg-white dark:bg-gray-900">
            <div class="px-4 mx-auto max-w-screen-xl py-16 lg:px-6">
                <div class="max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ini adalah bagian Dashboard untuk mengakses fitur sebagai Admin</h2>
                    <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, distinctio quod sit eos quas quasi autem iure illum dolorum ducimus consequatur consequuntur voluptate perspiciatis ullam fugit alias velit asperiores assumenda perferendis et culpa delectus labore, quaerat omnis. Dolores similique voluptatem corrupti iusto ipsum consequatur quasi explicabo magni temporibus commodi? Aperiam!</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                        <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Get started
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                            View more
                        </a>  
                    </div>
                </div>
            </div>
        </section>
        
    </x-side-nav>
    
</x-app-layout>
