<x-app-layout>
    <x-carousel></x-carousel>
    <section class="flex items-center clearfix p-2 bg-gray-100" data-bg-color="#fafafa">
        <div class="w-full">
            <div class="flex items-center mt-10 flex-wrap justify-around">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="flex max-w-xs items-center mt-6 mb-6 ml-auto">
                        <div class="item_icon">
                            <i class="fas fa-shipping-fast text-6xl m-3 text-sky-600"></i>
                        </div>
                        <div class="text-gray-600 text-base font-normal">
                            <h3 class="leading-none text-gray-700 text-xl font-bold mb-2">Fast Shipping</h3>
                            <p>Within 48h</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="flex max-w-xs items-center mt-6 mb-6 ml-auto">
                        <div class="item_icon">
                            <i class="fa-solid fa-circle-question text-6xl m-3 text-sky-600"></i>
                        </div>
                        <div class="text-gray-600 text-base font-normal">
                            <h3 class="leading-none text-gray-700 text-xl font-bold mb-2">Support 24/7</h3>
                            <p>Call us anytime</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="flex max-w-xs items-center mt-6 mb-6 ml-auto">
                        <div class="item_icon">
                            <i class="fa-solid fa-user-shield text-6xl m-3 text-sky-600"></i>
                        </div>
                        <div class="text-gray-600 text-base font-normal">
                            <h3 class="leading-none text-gray-700 text-xl font-bold mb-2">100% Safety</h3>
                            <p>Only secure payments</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="flex max-w-xs items-center mt-6 mb-6 ml-auto">
                        <div class="item_icon">
                            <i class="fa-solid fa-bag-shopping text-6xl m-3 text-sky-600"></i>
                        </div>
                        <div class="text-gray-600 text-base font-normal">
                            <h3 class="leading-none text-gray-700 text-xl font-bold mb-2">Hot Prices</h3>
                            <p>Best prices, many discounts</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mb-7 p-4 mt-4">
        <div class="w-full">
            <div class="row flex flex-wrap justify-between">
                <div data-aos="fadeInUp" data-aos-once='true'
                    class="xl:w-1/4 p-4 lg:w-1/3 md:w-1/6 mb-sm-5 mb-md-0 mb-4 animate__faster">
                    <h4
                        class="relative text-2xl after:w-20 after:content-[''] after:h-1 after:absolute after:bottom-0 after:left-0 after:bg-sky-600 border-b text-gray-700 font-bold leading-5 border-gray-200 pb-5  mb-7">
                        Top Selling</h4>
                    <div class="product-list-small animate__fast">
                        @foreach ($top_sellings as $top_selling)
                            <article class="flex mb-5">
                                <figure class="md:w-1/3 mb-0">
                                    <a href="{{ route('products.show', ['product' => $top_selling->product->id]) }}">
                                        <img src="{{ $top_selling->product->media->first()->getUrl() }}"
                                            alt="Product"></a>
                                </figure>
                                <div class="md:w-8/12 mb-0  p-2">
                                    <h6>
                                        <a class="text-gray-700 text-lg font-bold leading-3 hover:text-sky-700"
                                            href="#">{{ $top_selling->product->name }}</a>
                                    </h6>

                                    <div class="product-price text-sky-600 text-lg font-bold mt-3">
                                        <span>€{{ $top_selling->product->price }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fadeInUp" data-aos-once='true'
                    class="xl:w-1/4 p-4 lg:w-1/3 md:w-1/6 mb-sm-5 mb-md-0 mb-4 animate__faster">
                    <h4
                        class="relative text-2xl after:w-20 after:content-[''] after:h-1 after:absolute after:bottom-0 after:left-0 after:bg-sky-600 border-b text-gray-700 font-bold leading-5 border-gray-200 pb-5  mb-7">
                        Most expensive products</h4>
                    <div class="product-list-small">
                        @foreach ($most_expensive_products as $most_expensive_product)
                            <article class="flex mb-5">
                                <figure class="md:w-1/3 mb-0">
                                    <a
                                        href="{{ route('products.show', ['product' => $most_expensive_product->product->id]) }}">
                                        <img src="{{ $most_expensive_product->product->media()->first()->getUrl() }}"
                                            alt="test"></a>
                                </figure>
                                <div class="md:w-8/12 mb-0  p-2">
                                    <h6>
                                        <a class="text-gray-700 text-lg font-bold leading-3 hover:text-sky-700"
                                            href="#">{{ $most_expensive_product->product->name }}</a>
                                    </h6>

                                    <div class="product-price text-sky-600 text-lg font-bold mt-3">
                                        <span>€{{ $most_expensive_product->product->price }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach



                    </div>
                </div>
                <div data-aos="fadeInUp" data-aos-once='true'
                    class="xl:w-1/4 p-4  lg:w-1/3 md:w-1/6 mb-sm-5 mb-md-0 mb-4  d-none d-lg-block animate__faster">
                    <h4
                        class="relative text-2xl after:w-20 after:content-[''] after:h-1 after:absolute after:bottom-0 after:left-0 after:bg-sky-600 border-b text-gray-700 font-bold leading-5 border-gray-200 pb-5  mb-7">
                        Recently added</h4>
                    <div class="product-list-small">
                        @foreach ($latests as $latest)
                            <article class="flex mb-5">
                                <figure class="md:w-1/3 mb-0">
                                    <a href="{{ route('products.show', ['product' => $latest->id]) }}">
                                        <img src="{{ $latest->media()->first()->getUrl() }}" alt="test"></a>
                                </figure>
                                <div class="md:w-8/12 mb-0  p-2">
                                    <h6>
                                        <a class="text-gray-700 text-lg font-bold leading-3 hover:text-sky-700"
                                            href="#">{{ $latest->name }}</a>
                                    </h6>

                                    <div class="product-price text-sky-600 text-lg font-bold mt-3">
                                        <span>€{{ $latest->price }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fadeInUp" data-aos-once='true'
                    class="xl:w-1/4 p-4 lg:w-1/3 md:w-1/6 mb-sm-5 mb-md-0 mb-4  d-none d-xl-block">
                    <h4
                        class="relative text-2xl after:w-20 after:content-[''] after:h-1 after:absolute after:bottom-0 after:left-0 after:bg-sky-600 border-b text-gray-700 font-bold leading-5 border-gray-200 pb-5  mb-7">
                        Cheapest Products</h4>
                    <div class="product-list-small">
                        @foreach ($cheapest_products as $cheapest_product)
                            <article class="flex mb-5">
                                <figure class="md:w-1/3 mb-0">
                                    <a
                                        href="{{ route('products.show', ['product' => $cheapest_product->product->id]) }}">
                                        <img src="{{ $cheapest_product->product->media()->first()->getUrl() }}"
                                            alt="test"></a>
                                </figure>
                                <div class="md:w-8/12 mb-0  p-2">
                                    <h6>
                                        <a class="text-gray-700 text-lg font-bold leading-3 hover:text-sky-700"
                                            href="#">{{ $cheapest_product->product->name }}</a>
                                    </h6>

                                    <div class="product-price text-sky-600 text-lg font-bold mt-3">
                                        <span>€{{ $cheapest_product->product->price }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <x-footer /> --}}
</x-app-layout>
