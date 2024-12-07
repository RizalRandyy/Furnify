<x-app-layout>

    <div class="ms-20 mt-24">
        {{ Breadcrumbs::view('components.breadcrumbs') }}
    </div>

    <section class="bg-white py-8 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @if ($products->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400">Your cart is empty.</p>
            @else
                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                        @foreach ($products as $product)
                            <div class="space-y-6">
                                <div
                                    class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div
                                        class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">

                                        <a href="#" class="shrink-0 md:order-1">
                                            <img class="h-20 w-20" src="{{ asset('storage/' . $product->path) }}"
                                                alt="" />
                                        </a>

                                        <label for="counter-input-{{ $product->id }}" class="sr-only">Choose
                                            quantity:</label>
                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="flex items-center">
                                                <button type="button" id="decrement-button-{{ $product->id }}"
                                                    data-product-id="{{ $product->id }}"
                                                    class="decrement-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="counter-input-{{ $product->id }}"
                                                    data-product-id="{{ $product->id }}"
                                                    class="counter-input w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                                    placeholder="" value="1" required />
                                                <button type="button" id="increment-button-{{ $product->id }}"
                                                    data-product-id="{{ $product->id }}"
                                                    class="increment-button inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="text-end md:order-4 md:w-32">
                                                <p id="product-total-{{ $product->id }}"
                                                    data-price="{{ $product->price }}"
                                                    class="product-total text-base font-bold text-gray-900 dark:text-white">
                                                    Rp.
                                                    {{ number_format($product->price, 0, ',', '.') }}</p>

                                            </div>
                                        </div>

                                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                            <a href="#"
                                                class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $product->name }}</a>

                                            <div class="flex items-center gap-4">
                                                <form action="{{ route('shoppingCart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity"
                                                        id="quantity-input-{{ $product->id }}" value="1">
                                                    <button type="submit"
                                                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                                        <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div
                            class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                            <div class="space-y-4">

                                <dl
                                    class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd id="cart-total" class="text-base font-bold text-gray-900 dark:text-white">Rp.
                                        {{ number_format($total, 0, ',', '.') }}</dd>
                                </dl>
                            </div>

                            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <div id="product-inputs"></div>
                                <input type="hidden" name="total_price" id="total-price-input">
                                <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800">
                                    Proceed to Checkout
                                </button>
                            </form>

                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                                <a href="#" title=""
                                    class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                                    Continue Shopping
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        document.querySelectorAll('.increment-button').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const counterInput = document.querySelector(`#counter-input-${productId}`);
                const quantityInput = document.querySelector(`#quantity-input-${productId}`);
                let quantity = parseInt(counterInput.value) + 1;
                counterInput.value = quantity;
                quantityInput.value = quantity;
                updateProductTotal(productId, quantity);
            });
        });

        document.querySelectorAll('.decrement-button').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const counterInput = document.querySelector(`#counter-input-${productId}`);
                const quantityInput = document.querySelector(`#quantity-input-${productId}`);
                let quantity = Math.max(1, parseInt(counterInput.value) - 1);
                counterInput.value = quantity;
                quantityInput.value = quantity;
                updateProductTotal(productId, quantity);
            });
        });

        function updateProductTotal(productId, quantity) {
            const productTotalElement = document.querySelector(`#product-total-${productId}`);
            const productPrice = parseFloat(productTotalElement.dataset.price);
            const newTotal = productPrice * quantity;
            productTotalElement.textContent = 'Rp. ' + newTotal.toLocaleString();
            updateCartTotal();
            updateCheckoutForm();
        }

        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('.product-total').forEach(element => {
                const priceText = element.textContent.replace(/[^0-9]/g, '');
                const price = parseInt(priceText);
                total += price;
            });
            const cartTotalElement = document.querySelector('#cart-total');
            cartTotalElement.textContent = 'Rp. ' + total.toLocaleString();
            document.querySelector('#total-price-input').value = total;
        }

        function updateCheckoutForm() {
            const productInputs = document.querySelector('#product-inputs');
            productInputs.innerHTML = '';
            document.querySelectorAll('.counter-input').forEach(input => {
                const productId = input.dataset.productId;
                const quantity = input.value;
                const price = parseFloat(document.querySelector(`#product-total-${productId}`).dataset.price);
                
                const quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = `products[${productId}][quantity]`;
                quantityInput.value = quantity;
                
                const priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = `products[${productId}][price]`;
                priceInput.value = price;
                
                productInputs.appendChild(quantityInput);
                productInputs.appendChild(priceInput);
            });
        }

        updateCheckoutForm();
    </script>
</x-app-layout>
