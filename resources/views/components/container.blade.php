<div class="w-full">
    <div class="mx-auto">
        <div class="bg-zinc-100 overflow-hidden md:pb-20 ">
            <div {{ $attributes->merge(['class' => 'md:p-6 text-gray-900']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>