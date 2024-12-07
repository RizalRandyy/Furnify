<div class="relative">
    <div class="swiper-container category-carousel overflow-hidden">
        <div class="swiper-wrapper">
            @foreach ($categories as $category)
                <div class="swiper-slide">
                    <div class="relative max-w-xs rounded overflow-hidden">
                        <a href="{{ route('customer.category.show', $category->id) }}" class="group">
                            <img src="{{ asset('storage/' . $category->path) }}" alt="Category Image"
                                class="w-56 h-72 object-cover">
                            <div
                                class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-center px-4 py-2 rounded-full font-semibold bg-white transition-all duration-300 ease group-hover:bg-black group-hover:text-white block">
                                {{ $category->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom navigation buttons -->
    <div class="custom-nav-btn custom-nav-prev left-0 category-prev">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </div>
    <div class="custom-nav-btn custom-nav-next right-0 category-next">
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
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySwiper = new Swiper('.category-carousel', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                speed: 500,
                navigation: {
                    nextEl: '.category-next',
                    prevEl: '.category-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                }
            });

            // Custom navigation
            document.querySelector('.category-prev').addEventListener('click', () => {
                categorySwiper.slidePrev();
            });
            document.querySelector('.category-next').addEventListener('click', () => {
                categorySwiper.slideNext();
            });
        });
    </script>
@endpush
