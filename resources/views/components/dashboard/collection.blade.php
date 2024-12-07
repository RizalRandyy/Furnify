<div class="rounded-lg overflow-hidden shadow-lg flex flex-col {{ $bgColor }}">
    <img src="{{ $imgSrc }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-2 text-white">{{ $title }}</h2>
        <p class="text-white">{{ $description }}</p>
    </div>
    <div class="p-6 mt-auto flex justify-end">
        <a href="{{ $link }}"
            class="text-white bg-gray-800 hover:bg-gray-900 rounded-full p-2 inline-flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
