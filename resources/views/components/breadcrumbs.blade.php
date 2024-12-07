@unless ($breadcrumbs->isEmpty())
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            @foreach ($breadcrumbs as $breadcrumb)
                <li>
                    <div class="flex items-center">
                        @if (!$loop->first)
                            <svg class="rtl:rotate-180 w-2 h-2 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                        @endif

                        @if ($breadcrumb->url && !$loop->last)
                            <a href="{{ $breadcrumb->url }}"
                                class="text-sm font-medium text-gray-700 hover:underline md:ms-1">
                                {{ $breadcrumb->title }}
                            </a>
                        @else
                            <span class="text-sm font-medium text-gray-500 md:ms-1">
                                {{ $breadcrumb->title }}
                            </span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </nav>
@endunless
