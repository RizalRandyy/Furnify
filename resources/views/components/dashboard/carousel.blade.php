<div class="relative mt-20">
    <div class="swiper-container main-carousel overflow-hidden h-96 w-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="{{ Storage::url('images/dashboardCarousel/cabinet.jpg') }}" alt="Cabinet"
                        class="w-[2160px] h-full object-cover object-top">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="{{ Storage::url('images/dashboardCarousel/minimalInterior.png') }}" alt="Interior"
                        class="w-[2160px] h-full object-cover object-top">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="{{ Storage::url('images/dashboardCarousel/teko.png') }}" alt="Teko"
                        class="w-[2160px] h-full object-cover object-top">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="{{ Storage::url('images/dashboardCarousel/chair.jpeg') }}" alt="Chair"
                        class="w-full h-full object-cover object-top">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="{{ Storage::url('images/dashboardCarousel/roomie.jpeg') }}" alt="Room"
                        class="w-full h-full object-cover object-top">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product-card">
                    <img src="{{ Storage::url('images/dashboardCarousel/whiteChair.jpeg') }}" alt="White Chair"
                        class="w-[2160px] h-full object-cover object-top">
                </div>
            </div>
        </div>
    </div>

    <!-- Custom navigation buttons -->
    <div class="custom-nav-btn custom-nav-prev main-prev">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </div>
    <div class="custom-nav-btn custom-nav-next main-next">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .dashboard-carousel {
            padding: 20px 0;
        }

        .swiper-slide {
            width: auto;
        }

        .product-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .custom-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 10;
            transition: background-color 0.3s ease;
        }

        .custom-nav-btn:hover {
            background-color: rgba(255, 255, 255, 1);
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
            const mainSwiper = new Swiper('.main-carousel', {
                autoplay: {
                    delay: 5000,
                },
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                speed: 500,
                navigation: {
                    nextEl: '.main-next',
                    prevEl: '.main-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    1024: {
                        slidesPerView: 1,
                    },
                }
            });

            document.querySelector('.main-prev').addEventListener('click', () => {
                mainSwiper.slidePrev();
            });
            document.querySelector('.main-next').addEventListener('click', () => {
                mainSwiper.slideNext();
            });
        });
    </script>
@endpush
