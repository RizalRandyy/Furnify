<!-- File: resources/views/dashboard.blade.php -->
<x-app-layout>
    <div class="w-full bg-white">
        <div class="px-20 md:py-10">
            <!-- Carousel Component -->
            <div>
                <x-dashboard.carousel />
            </div>
            
            <!-- Categories Section -->
            <div class="flex flex-col py-5">
                <p class="text-2xl font-bold py-3 border-t-2 border-gray-300">Categories</p>
                <p class="text-lg">Choose a category to find products that suit your needs.</p>
            </div>
            <x-dashboard.categories :categories="$categories"/>

            <!-- Products Section -->
            <div class="flex flex-col py-5">
                <p class="text-2xl font-bold py-3">Products</p>
                <p class="text-lg">Your one-stop destination for high-quality and affordable products.</p>
            </div>
            <div class="text-blue-500 hover:underline flex justify-end">
                <a href="{{ route('customer.products.index') }}">&raquo; Selengkapnya</a>
            </div>

            <x-dashboard.products :products="$products" :shoppingCartItems="$shoppingCartItems"/>

            <div class="flex flex-col py-5">
                <p class="text-2xl font-bold py-3">This Week's Special Deals</p>
                <p class="text-lg">Enjoy unbeatable prices on a wide selection of top-quality products, available for a limited time only</p>
            </div>

            <x-dashboard.grid-images/>    

            <!-- Collections Section -->
            <div class="flex justify-center text-2xl font-semibold py-5">
                <p>Collections</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-dashboard.collection bgColor="bg-blue-800"
                    imgSrc="{{ Storage::url('images/dashboardCollection/blueCollection.jpeg') }}" 
                    title="FRODD"
                    description="Jelajahi rangkaian koleksi FRODD kami yang dirancang untuk keanggunan dan kenyamanan."
                    link="#" />
                <x-dashboard.collection bgColor="bg-orange-500"
                    imgSrc="{{ Storage::url('images/dashboardCollection/orangeCollection.jpeg') }}" 
                    title="TESAMMANS"
                    description="Kolaborasi dengan duo desainer Raw Color yang menampilkan perabot, tekstil, peralatan makan, dan dekorasi dengan kombinasi warna dan bentuk grafis yang tak terduga."
                    link="#" />
                <x-dashboard.collection bgColor="bg-green-600"
                    imgSrc="{{ Storage::url('images/dashboardCollection/greenCollection.jpeg') }}" 
                    title="BRÖGGAN"
                    description="Ciptakan nuansa ceria di rumah secara instan dengan warna-warna cerah dari koleksi BRÖGGAN. Segarkan rumahmu; di dalam dan di luar ruang."
                    link="#" />
            </div>
        </div>
    </div>
</x-app-layout>