<div id="default-carousel" class="relative" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="main_slider overflow-hidden relative h-96 sm:h-96 md:h-96 xl:h-160 2xl:h-160">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div style="top: 25%; left: 15%"
                class="slider_content absolute z-10 top-1/4 text-2xl font-semibold text-white">
                <ul class="item_label ul_li_block clearfix" data-animation="fadeInUp" data-delay=".2s">
                    <li><span class="animate__animated animate__bounce text-4xl">Highest quality vegetables</span></li>
                    <li><span class=" text-3xl">From the local shops</span></li>
                </ul>
                <div class="abtn_wrap my-4 clearfix" data-animation="fadeInUp" data-delay="1s">
                    <a href="{{ route('products.index') }}" class="custom_btn bg_black p-2 text-uppercase rounded-full bg-indigo-500">Shop Now</a>
                </div>
            </div>

            <img src="{{ asset('assets/food1.jpg') }}"
                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('assets/food2.jpg') }}"
                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('assets/medicine.jpg') }}"
                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
        <button type="button" class="w-3 h-3 rounded-full dark:bg-white/80 shadow-lg dark:hover:bg-gray-200"
            aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full dark:bg-white/80 shadow-lg  dark:hover:bg-gray-200"
            aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full dark:bg-white/80 shadow-lg  dark:hover:bg-gray-200"
            aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-white/80 group-hover:bg-white/50 dark:group-hover:bg-gray-200 shadow-lg group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-500/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="hidden">Previous</span>
        </span>
    </button>
    <button type="button"
        class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-white/80 group-hover:bg-white/50 dark:group-hover:bg-gray-200 shadow-lg group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-500/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="hidden">Next</span>
        </span>
    </button>
</div>
