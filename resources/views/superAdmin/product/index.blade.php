<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Admin') }}
        </h2>
    </x-slot>

    <section class="bg-white p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('superAdmin.products.create') }}">
                            <button type="button"
                                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>

                                Add product
                            </button>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Path</th>
                                <th scope="col" class="px-4 py-3">Category</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                                <th scope="col" class="px-4 py-3">Stock</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <form action="{{ route('superAdmin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        </td>
                                        <td class="px-4 py-3 flex items-center">
                                            <input type="file" name="path"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            @if ($product->path)
                                                <img src="{{ asset('storage/' . $product->path) }}"
                                                    alt="{{ $product->name }}" class="mt-2 h-16 w-16 rounded-lg ml-2">
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" name="category"
                                                value="{{ $product->category->name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" name="description"
                                                value="{{ $product->description }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" name="price" value="{{ $product->price }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-28 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="number" name="stock" value="{{ $product->stock }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-16 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        </td>
                                        <td class="px-4 py-3 flex items-center justify-end space-x-2">
                                            <button type="submit"
                                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                Save
                                            </button>
                                </form>
                                <form action="{{ route('superAdmin.products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-red-900">
                                        Delete
                                    </button>
                                </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        {{ $products->links() }}

    </section>

    <script>
        document.querySelectorAll('[data-dropdown-toggle]').forEach(button => {
            button.addEventListener('click', function() {
                const dropdownId = this.getAttribute('data-dropdown-toggle');
                const dropdown = document.getElementById(dropdownId);
                dropdown.classList.toggle('hidden');
            });
        });
    </script>
</x-app-layout>
