<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <section class="bg-white pb-8 pt-2 antialiased dark:bg-gray-900 md:pb-16">
        <form action="{{ route('checkout.update', $checkout->id) }}" method="POST" enctype="multipart/form-data"
            class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            @method('PUT')
            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-8 xl:gap-12">
                <div class="min-w-0 flex-1 space-y-6">
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Name Input -->
                            <div>
                                <label for="name"
                                    class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="name" name="name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    value="{{ $checkout->user->name }}" required 
                                    @if($checkout->payment_status == 1) disabled @endif />
                            </div>

                            <!-- Email Input -->
                            <div>
                                <label for="email"
                                    class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Email*</label>
                                <input type="email" id="email" name="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    value="{{ $checkout->user->email }}" required 
                                    @if($checkout->payment_status == 1) disabled @endif />
                            </div>

                            <!-- Address Input -->
                            <div>
                                <label for="address"
                                    class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Address*</label>
                                <input type="text" id="address" name="address"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    placeholder="{{ $checkout->address }}" required 
                                    @if($checkout->payment_status == 1) disabled @endif />
                            </div>

                            <!-- City Input -->
                            <div>
                                <label for="city"
                                    class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">City*</label>
                                <input type="text" id="city" name="city"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    placeholder="{{ $checkout->city }}" required 
                                    @if($checkout->payment_status == 1) disabled @endif />
                            </div>

                            <!-- Phone Number Input -->
                            <div>
                                <label for="phone_number"
                                    class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Phone
                                    number*</label>
                                <input type="tel" id="phone_number" name="phone_number"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    placeholder="{{ $checkout->phone_number }}" required 
                                    @if($checkout->payment_status == 1) disabled @endif />
                            </div>

                            <!-- Proof of Payment Input -->
                            <div>
                                <label for="proof_of_payment_path"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proof of
                                    payment</label>
                                <input type="file" name="proof_of_payment_path" id="proof_of_payment_path"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                    required @if($checkout->payment_status == 1) disabled @endif>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex justify-between py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                    {{ $checkout->product->name }} x{{ $checkout->quantity }}</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">Rp.
                                    {{ number_format($checkout->price_per_item, 0, ',', '.') }}</dd>
                            </dl>

                            <dl class="flex justify-between py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">Rp.
                                    {{ number_format($checkout->total_price, 0, ',', '.') }}</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <div class="space-y-3">
                        <button type="submit" 
                            class="w-full rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            @if($checkout->payment_status == 1) disabled @endif>Proceed</button>

                        <div class="flex flex-col items-center justify-center">
                            @if ($checkout->payment_status == 1)
                                <p class="font-semibold text-green-500 text-xl">Payment successful</p>
                            @else
                                <img src="{{ Storage::url('images/payment/qrcodepayment.png') }}" alt="QR Code for Payment" class="w-56 h-56 mt-4">
                                <p class="font-semibold">Scan to pay</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>
