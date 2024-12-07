<!-- Overlay gelap start-->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
<!-- Overlay gelap end-->

<nav id="navbar"
    class="bg-white border-gray-200 py-2.5 md:ps-16 fixed top-0 w-full transform transition-transform duration-300 z-50">
    <div class="flex items-center justify-between w-full">
        <!-- Logo Section Start-->
        <x-navbar.logo></x-navbar.logo>
        <!-- Logo Section End-->

        <div class="flex justify-center flex-grow mx-4 relative z-50">
            <form action="#" method="GET" class="block w-full max-w-3xl" autocomplete="off">
                <label for="topbar-search" class="sr-only">Search</label>
                <div class="relative bg-white rounded-xl">
                    <!-- Container untuk input dan hasil -->
                    <div class="relative bg-white rounded-t-xl px-3 py-2 flex items-center space-x-2 border-gray-200">
                        <!-- Icon Pencarian -->
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                            <svg class="w-5 h-5 text-gray-500 ms-5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>

                        <!-- Input Search -->
                        <input type="text" name="search" id="topbar-search"
                            class="bg-gray-100 border border-transparent text-gray-900 text-lg rounded-full w-full pl-12 p-2.5 h-14 focus:ring-0 focus:shadow-none focus:border-transparent hidden md:block"
                            placeholder="Search" style="outline: none !important; box-shadow: none !important;">
                    </div>

                    <!-- Hasil Pencarian -->
                    <div id="search-results" class="absolute bg-white w-full rounded-b-xl shadow-lg block z-50 p-4"
                        style="max-height: 500px; overflow-y: auto;">

                    </div>
                </div>
            </form>
        </div>




        <div class="flex items-center lg:order-2">
            <button id="toggleSidebarMobileSearch" type="button"
                class="p-3 text-gray-700 rounded-full lg:hidden hover:text-gray-900 hover:bg-gray-100">
                <span class="sr-only">Search</span>
                <!-- Search icon -->
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </div>

        <!-- Apps -->
        @role('superAdmin|admin')
            <x-nav-toggle-logo toggleId="apps-dropdown">
                <path
                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
            </x-nav-toggle-logo>
        @endrole

        <!-- Dropdown menu -->
        <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg"
            id="apps-dropdown">

            <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50">
                Controls
            </div>

            <div class="grid grid-cols-3 gap-4 p-4">

                @role('superAdmin')
                    <x-nav-toggle-sublink href="{{ route('superAdmin.users.index') }}" label="Users">
                        <path
                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        <path
                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                    </x-nav-toggle-sublink>
                @endrole

                <x-nav-toggle-sublink href="{{ route('superAdmin.orders.index') }}" label="Orders">
                    <path
                        d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
                    <path
                        d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                </x-nav-toggle-sublink>
                <x-nav-toggle-sublink href="{{ route('superAdmin.products.index') }}" label="Products">
                    <path
                        d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                </x-nav-toggle-sublink>

                @role('superAdmin')
                    <x-nav-toggle-sublink href="{{ route('superAdmin.categories.index') }}" label="Categories">
                        <path
                            d="M7 11H5v1h2v-1Zm4 3H9v1h2v-1Zm-4 0H5v1h2v-1ZM5 5V.13a2.98 2.98 0 0 0-1.293.749L.88 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                        <path
                            d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM13 16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v6Zm-1-8H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Zm0-3H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Z" />
                        <path d="M11 11H9v1h2v-1Z" />
                    </x-nav-toggle-sublink>
                @endrole

            </div>
        </div>

        <div class="flex items-center md:me-14">
            @if ((auth()->check() && auth()->user()->hasRole('customer')) || !auth()->check())
                {{-- Shopping Bag --}}
                <x-nav-link-logo href="{{ route('checkout.index') }}" :active="request()->routeIs('checkout.index')">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                </x-nav-link-logo>

                <!-- Shopping Cart -->
                <x-nav-link-logo href="{{ route('shoppingCart.index') }}" :active="request()->routeIs('shoppingCart.index')">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                </x-nav-link-logo>

                {{-- Favorite --}}
                <x-nav-link-logo href="{{ route('favorite.index') }}" :active="request()->routeIs('favorite.index')">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                </x-nav-link-logo>
            @endif

            <!-- User -->
            <button type="button"
                class="p-2 md:mx-2 text-gray-500 rounded-full hover:text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
        </div>

        <!-- Dropdown menu -->
        <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow"
            id="dropdown">
            <div class="py-3 px-4">
                @if (Auth::user())
                    <span class="block text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
            </div>
            <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                <li>
                    <x-responsive-nav-link :href="route('profile.edit')"
                        class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-100">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    @endif
                </li>
            </ul>
            <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        @if (Auth::user())
                            <x-responsive-nav-link :href="route('logout')"
                                class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-100"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('login')"
                                class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-100"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log In') }}
                            </x-responsive-nav-link>
                        @endif
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Ambil elemen input dan elemen hasil pencarian
    const searchInput = document.getElementById('topbar-search');
    const searchResults = document.getElementById('search-results');
    const overlay = document.getElementById('overlay');
    searchResults.classList.add('hidden');
    overlay.classList.add('hidden');
    searchInput.value = '';
    searchResults.innerHTML = '';

    // Tambahkan event listener pada input field
    searchInput.addEventListener('focus', () => {
        // Tampilkan hasil pencarian dan overlay gelap
        searchResults.classList.remove('hidden');
        overlay.classList.remove('hidden');
    });

    // Saat overlay diklik, sembunyikan overlay dan hasil pencarian
    overlay.addEventListener('click', () => {
        searchInput.value = '';
        searchResults.innerHTML = '';
        searchResults.classList.add('hidden');
        overlay.classList.add('hidden');
        // Hanya mengosongkan hasil jika tidak ada item
        if (searchResults.innerHTML.includes('No results found')) {
            searchResults.innerHTML = ''; // Kosongkan jika ada pesan "No results found"
        }
    });

    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scroll ke bawah - sembunyikan navbar
            navbar.classList.add('-translate-y-full');
        } else {
            // Scroll ke atas - tampilkan navbar
            navbar.classList.remove('-translate-y-full');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Mencegah nilai negatif
    });
</script>
