<x-app-layout>

    <div class="px-20 mt-24">
        {{ Breadcrumbs::view('components.breadcrumbs') }}
    </div>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">

                @if ($orders->isEmpty())
                    <p class="text-center text-gray-500 dark:text-gray-400">Your order is empty.</p>
                @else
                    @foreach ($orders as $order)
                        <div class="mt-6 flow-root sm:mt-8">
                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                <div class="flex flex-wrap items-center gap-y-4 py-6">
                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            <a class="hover:underline">FFAZSAD{{ $order->id }}</a>
                                        </dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $order->created_at->format('j F, Y') }}
                                        </dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">Rp.
                                            {{ number_format($order->total_price, 0, ',', '.') }}</dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                        @if ($order->approved == 1)
                                            <dd
                                                class="me-2 mt-1.5 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5" />
                                                </svg>
                                                Confirmed
                                            </dd>
                                        @else
                                            <dd
                                                class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                                                </svg>
                                                Pending
                                            </dd>
                                        @endif
                                    </dl>

                                    <div
                                        class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                                        @if ($order->payment_status != 1)
                                            <form action="{{ route('checkout.destroy', $order->id) }}" method="POST"
                                                class="w-full lg:w-auto">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900">Cancel
                                                    order</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('checkout.show', $order->id) }}"
                                            class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">View
                                            details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        @endif
    </section>
</x-app-layout>
