<a href="{{ $href }}" class="block p-4 text-center rounded-lg hover:bg-gray-100 group">
    <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
        {!! $icon ?? $slot !!}
    </svg>
    <div class="text-sm font-medium text-gray-900">{{ $label }}</div>
</a>
