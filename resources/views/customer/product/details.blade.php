<x-app-layout>
    
    <div class="px-20 pt-24">
        {{ Breadcrumbs::view('components.breadcrumbs') }}
    </div>

    <div class="w-full bg-white">
        <div class="px-20 py-10">
            <section class="dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                            <img class="w-full" src="{{ asset('storage/' . $product->path) }}" alt="Product Image" />
                        </div>

                        <div class="mt-6 sm:mt-8 lg:mt-0">
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                {{ $product->name }}
                            </h1>
                            <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                                <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                                    Rp. {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <!-- Quantity, Stock, and Buttons -->
                            <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">

                                <!-- Stock Display -->
                                <div class="flex items-center mb-4 sm:mb-0 sm:ml-4">
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-400">Stock:</p>
                                    <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $product->stock }}</p>
                                </div>

                                @if(auth()->check() && auth()->user()->hasRole('customer') || !auth()->check())
                                <!-- Add to Favorites Button -->
                                <form action="{{ route('favorite.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit"
                                        class="flex items-center justify-center py-2.5 px-5 mt-4 sm:mt-0 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                        role="button">
                                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                        </svg>
                                        @if (auth()->check() && $favorite)
                                            Remove from favorites
                                        @else
                                            Add to favorites
                                        @endif
                                    </button>
                                </form>

                                <!-- Add to Cart Button -->
                                <form action="{{ route('shoppingCart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit"
                                        class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-10 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                                        role="button">
                                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                        </svg>
                                        @if (auth()->check() && $shoppingCart)
                                            Remove from Shopping Cart
                                        @else
                                            Add to Shopping Cart
                                        @endif
                                    </button>
                                </form>
                                @endif
                            </div>

                            <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                            <p class="mb-6 text-gray-500 dark:text-gray-400">
                                {{ $product->description }}
                            </p>
                        </div>

                    </div>
                </div>
            </section>
            <div class="flex justify-center text-2xl font-semibold py-5">
                <p>Other Products</p>
            </div>
            <x-product.products :products="$products"></x-product.products>
        </div>
    </div>
</x-app-layout>