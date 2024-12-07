<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @stack('styles')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#topbar-search').on('input', function() {
                const query = $(this).val();

                // Bersihkan hasil pencarian jika input kosong
                if (query.length < 2) {
                    $('#search-results').addClass('hidden').empty();
                    return;
                }

                // Melakukan panggilan AJAX ke backend
                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let results = '';

                        if (data.categories.length > 0) {
                            results +=
                                '<p class="p-5 font-semibold text-lg text-black">Categories</p>';
                            results +=
                                '<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">';
                            data.categories.forEach(category => {
                                results += `
                                        <div class="relative max-w-xs rounded overflow-hidden shadow-lg">
                                            <img class="w-full object-cover h-48" src="/storage/${category.path}">
                                        
                                            <a href="/customer/category/${category.id}">
                                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2       text-center px-4 py-2 rounded-full font-semibold bg-white hover:bg-black hover:text-white transition:all duration-300 ease-in-out">
                                                    ${category.name}
                                                </div>
                                            </a>
                                        </div>
                                        `;
                            });
                            results += '</div>';
                        }

                        if (data.products.length > 0) {
                            results +=
                                `<p class="px-5 pt-10 font-semibold text-lg text-black">Products</p>
                                <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">`;

                            data.products.forEach(item => {
                                const formattedPrice = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(item.price);

                                results += `
                                <a href="/customer/products/${item.id}">
                                    <div class="flex p-4 items-center">
                                        <div class="flex-shrink-0">
                                            <img src="/storage/${item.path}" class="w-28 h-auto">
                                        </div>
                                        
                                        
                                        <div class="ml-4">
                                            <h2 class="text-md font-bold">${item.name}</h2>
                                            <p class="text-gray-600">${item.description}</p>
                                            <p class="text-xl font-bold">${formattedPrice}</p>
                                        </div>
                                    </div>`;
                            });

                            results += `</div>
                            </a>`;
                            console.log(results);
                        } else {
                            results += '<p class="p-2">No results found</p>';   
                        }

                        $('#search-results').html(results).removeClass(
                            'hidden');
                    },
                    error: function() {
                        $('#search-results').html('<p class="p-2">Error retrieving results</p>')
                            .removeClass('hidden');
                    }
                });
            });
        });
    </script>

@stack('scripts')

</body>

</html>
