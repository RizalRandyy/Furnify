<x-app-layout>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Customer orders</h2>
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Payment</th>
                                <th scope="col" class="px-6 py-3">Order ID</th>
                                <th scope="col" class="px-6 py-3">User Name</th>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        @if ($order->proof_of_payment_path)
                                            <img src="{{ asset('storage/' . $order->proof_of_payment_path) }}"
                                                alt="{{ $order->name }}"
                                                class="h-16 w-16 rounded-lg cursor-pointer">
                                        @else
                                            <span class="text-red-600">Belum membayar</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="hover:underline">FFAZSAD{{ $order->id }}</a>
                                    </td>
                                    <td class="px-6 py-4">{{ $order->user->name }}</td>
                                    <td class="px-6 py-4">{{ $order->created_at->format('j F, Y') }}</td>
                                    <td class="px-6 py-4">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        @if ($order->approved == 1)
                                            <span class="inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                Confirmed
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 flex space-x-2">
                                        @if ($order->payment_status != 1)
                                            <form action="{{ route('checkout.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="rounded-lg border border-red-700 px-3 py-1 text-sm text-red-700 hover:bg-red-700 hover:text-white focus:outline-none">
                                                    Cancel order
                                                </button>
                                            </form>
                                        @endif
                                        @if ($order->proof_of_payment_path != null)
                                            <a href="{{ route('superAdmin.orders.show', $order->id) }}"
                                                class="rounded-lg border border-gray-200 bg-white px-3 py-1 text-sm text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                                                View details
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
