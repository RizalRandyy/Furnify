<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve') }}
        </h2>
    </x-slot>

    <section class="bg-white pb-8 pt-4 antialiased dark:bg-gray-900 md:pb-16">
        <form action="{{ route('superAdmin.orders.update', $order->id) }}" method="POST" enctype="multipart/form-data"
            class="mx-auto max-w-screen-xl px-4 lg:px-6 2xl:px-0">
            @csrf
            @method('PUT')

            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-10">

                <!-- Payment Image Section -->
                <div class="space-y-6">
                    <!-- Name Input -->
                    <div class="form-group">
                        <label for="name" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            placeholder="{{ $order->user->name }}" required 
                            @if($order->checkout_status == 1) disabled @endif />
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="email" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Email*</label>
                        <input type="email" id="email" name="email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            placeholder="{{ $order->user->email }}" required 
                            @if($order->checkout_status == 1) disabled @endif />
                    </div>

                    <!-- Address Input -->
                    <div class="form-group">
                        <label for="address" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Address*</label>
                        <input type="text" id="address" name="address"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            placeholder="{{ $order->address }}" required 
                            @if($order->checkout_status == 1) disabled @endif />
                    </div>

                    <!-- City Input -->
                    <div class="form-group">
                        <label for="city" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">City*</label>
                        <input type="text" id="city" name="city"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            placeholder="{{ $order->city }}" required 
                            @if($order->checkout_status == 1) disabled @endif />
                    </div>

                    <!-- Phone Number Input -->
                    <div class="form-group">
                        <label for="phone_number" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Phone number*</label>
                        <input type="tel" id="phone_number" name="phone_number"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            placeholder="{{ $order->phone_number }}" required 
                            @if($order->checkout_status == 1) disabled @endif />
                    </div>

                    <div class="flex justify-center">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <img src="{{ asset('storage/' . $order->proof_of_payment_path) }}"
                                alt="{{ $order->name }}" class="mt-2 h-auto w-56 rounded-lg cursor-pointer"
                                id="proofOfPayment">
                        </div>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="space-y-6">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <div class="flow-root">
                            <div class="divide-y divide-gray-200 dark:divide-gray-800">
                                <dl class="flex justify-between py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $order->product->name }} x{{ $order->quantity }}</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">Rp.
                                        {{ number_format($order->price_per_item, 0, ',', '.') }}</dd>
                                </dl>

                                <dl class="flex justify-between py-3">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">Rp.
                                        {{ number_format($order->total_price, 0, ',', '.') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <div class="space-y-4">
                            <button type="submit"
                                class="w-full rounded-lg bg-green-500 px-5 py-3 text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                @if ($order->approved == 1) disabled @endif>
                                Approve
                            </button>

                            <div class="flex flex-col items-center justify-center">
                                @if ($order->approved == 1)
                                    <p class="font-semibold text-green-500 text-xl">Approved</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>
</x-app-layout>
