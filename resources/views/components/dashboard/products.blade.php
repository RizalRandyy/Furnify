<div class="relative">
    <div class="swiper-container product-carousel overflow-hidden">
        <div class="swiper-wrapper">
            @foreach ($products as $product)
                <div class="swiper-slide">
                    <div class="relative w-full rounded overflow-hidden group">
                        <div class="">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <a href="{{ route('customer.products.show', $product->id) }}" class="group">
                                    <img src="{{ asset('storage/' . $product->path) }}" alt="Product Image"
                                        class="h-[300px] w-full object-cover object-center">
                                </a>
                            </div>
                            <h3 class="mt-4 text-lg font-bold">{{ $product->name }}</h3>
                            <p class="mt-1 text-sm font-medium text-gray-500">
                                {{ Str::limit($product->description, 50, '') }}</p>
                            <p class="mt-1 text-lg font-medium text-gray-900">Rp.
                                {{ number_format($product->price, 0, ',', '.') }}</p>

                            @if ((auth()->check() && auth()->user()->hasRole('customer')) || !auth()->check())
                                <form action="{{ route('dashboard.shoppingCartAdd') }}" method="POST"
                                    class="add-to-cart-form absolute bottom-0 right-0 m-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex justify-end me-5 mt-5">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit"
                                            class="text-white rounded-full p-2
                                            @if (auth()->check() && $shoppingCartItems[$product->id]) bg-red-700
                                            @else
                                                bg-blue-700 @endif">
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom navigation buttons -->
    <div class="custom-nav-btn custom-nav-prev left-0 product-prev">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </div>
    <div class="custom-nav-btn custom-nav-next right-0 product-next">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 10;
            transition: background-color .3s ease, opacity .3s ease;
            opacity: 0;
        }

        .custom-nav-btn:hover {
            background-color: rgba(0, 0, 0, 0.9);
            opacity: 1;
        }

        .custom-nav-btn svg {
            color: white;
        }

        .custom-nav-prev {
            left: 10px;
        }

        .custom-nav-next {
            right: 10px;
        }

        .group:hover .absolute {
            display: flex;
        }

        .absolute {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSwiper = new Swiper('.product-carousel', {
                slidesPerView: 4,
                slidesPerGroup: 4,
                spaceBetween: 10,
                loop: true,
                speed: 500,
                navigation: {
                    nextEl: '.product-next',
                    prevEl: '.product-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                }
            });

            // Custom navigation
            document.querySelector('.product-prev').addEventListener('click', () => {
                productSwiper.slidePrev();
            });
            document.querySelector('.product-next').addEventListener('click', () => {
                productSwiper.slideNext();
            });
        });
    </script>
    <script>
        // AJAXXXX
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let url = this.action;
                    const button = this.querySelector('button'); 

                    fetch(url, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                if (button.classList.contains('bg-blue-700')) {
                                    button.classList.remove('bg-blue-700');
                                    button.classList.add('bg-red-700');
                                } else {
                                    button.classList.remove('bg-red-700');
                                    button.classList.add('bg-blue-700');
                                }
                            } else {
                                console.error('Error:', data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                        });
                });
            });
        });
    </script>
@endpush
