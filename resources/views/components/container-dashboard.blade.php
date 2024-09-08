<div class="w-full">
    <div class="mx-auto">
        <div class="bg-white xl:bg-zinc-100 min-h-screen overflow-hidden pb-20">
            <div class="p-3 sm:p-6">
                <div {{ $attributes->merge(['class' => 'bg-white pt-16 xl:pt-5 text-gray-900']) }}>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>