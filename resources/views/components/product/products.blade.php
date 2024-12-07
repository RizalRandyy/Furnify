<div>
    <div class="w-full bg-white">
        <div class="px-20 py-10">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <a href="{{ route('customer.products.show', $product->id) }}" class="group">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="{{ asset('storage/' . $product->path) }}" alt="Product Image"
                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-lg font-bold">{{ $product->name }}</h3>
                        <p class="mt-1 text-sm font-medium text-gray-500">{{ Str::limit($product->description, 50, '') }}</p>
                        <p class="mt-1 text-lg font-medium text-gray-900">Rp.
                            {{ number_format($product->price, 0, ',', '.') }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
