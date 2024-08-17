<div class="w-full">
    <div class="mx-auto">
        <div class="bg-white overflow-hidden">
            <div {{ $attributes->merge(['class' => 'p-0 sm:p-6 text-gray-900']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>