@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-sm sm:text-base px-2 py-1 bg-black font-medium rounded-lg hover:bg-gray-800 text-white transition-all duration-300'
            : 'text-sm sm:text-base px-2 py-1 bg-gray-100 font-medium rounded-lg hover:bg-gray-200 text-black transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>