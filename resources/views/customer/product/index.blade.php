<x-app-layout>

    <div class="px-20 mt-24">
        {{ Breadcrumbs::view('components.breadcrumbs') }}
    </div>


    @if ($products->isEmpty())
        <div class="bg-white py-8 antialiased md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <p class="text-center text-gray-500 dark:text-gray-400">Your favorite is empty.</p>
            </div>
        </div>
    @else
        <x-product.products :products="$products"></x-product.products>
    @endif
</x-app-layout>
