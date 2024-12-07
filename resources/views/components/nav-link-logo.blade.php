@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'p-2 md:mx-2 text-gray-500 rounded-full hover:text-gray-900 hover:bg-gray-100 ring-4 ring-gray-300'
            : 'p-2 md:mx-2 text-gray-500 rounded-full hover:text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <svg class="w-6 h-6 md:w-6 md:h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
        viewBox="0 0 24 24">
        {{ $slot }}
    </svg>
</a>
