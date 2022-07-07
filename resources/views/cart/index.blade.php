<x-app-layout>
    @php
        $stripe_key = env('STRIPE_KEY');
        $route = route('checkout');
    @endphp
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <div class="py-12">
        <div class="mb-3 max-w-7xl m-auto">
        </div>
        <div class="w-full mx-auto m-3 max-w-7xl bg-white p-12">
            <div class="mt-6 text-left"> <a class="text-sm font-medium text-indigo-500 hover:text-indigo-600"
                    href="#0">&lt;- Back To
                    Shopping</a> </div>
            <div class="flex flex-col lg:flex-row tez tnb justify-center">

                <!-- Cart items -->
                <div class="mb-6 lg:mb-0 w-full">

                    <header class="mb-2">
                        <!-- Title -->
                        <h1 class="custom-font text-slate-800 font-bold">Shopping Cart ({{ $cart_items->count() }}) 🛒
                        </h1>
                    </header>
                    <ul>
                        @forelse ($cart_items as $cart_item)
                            <li class="flex items-center py-6 border-b-1 border-slate-200"> <a
                                    class="block mb-4 sm:mb-0 mr-5 w-32 xl:w-full flex-shrink-0" href="#0"> <img
                                        class="rounded-sm"
                                        src="{{ $cart_item->associatedModel->getFirstMedia()->getUrl() }}"
                                        width="200" height="142" alt="Product 01"> </a>
                                <div class="flex-grow"> <a href="#0">
                                        <h3 class="gx font-semibold text-slate-800 mb-1">
                                            {{ $cart_item->associatedModel->name }}</h3>
                                    </a>
                                    <div class="text-sm mb-2">{{ $cart_item->associatedModel->description }}</div>
                                    <div class="flex flex-wrap fg items-center">
                                        <div class="flex flex-wrap items-center lt mr-2">
                                            <div class="flex items-center lt">
                                                <div class="flex lv"> <button> <span class="position_">1
                                                            star</span> <svg class="w-4 h-4 fill-current text-amber-500"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z">
                                                            </path>
                                                        </svg> </button> <button> <span class="position_">2
                                                            stars</span> <svg
                                                            class="w-4 on  fill-current text-amber-500"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z">
                                                            </path>
                                                        </svg> </button> <button> <span class="position_">3
                                                            stars</span> <svg
                                                            class="w-4 on  fill-current text-amber-500"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z">
                                                            </path>
                                                        </svg> </button> <button> <span class="position_">4
                                                            stars</span> <svg
                                                            class="w-4 on  fill-current text-amber-500"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z">
                                                            </path>
                                                        </svg> </button> <button> <span class="position_">5
                                                            stars</span> <svg class="w-4 on fill-current text-slate-300"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z">
                                                            </path>
                                                        </svg> </button> </div>
                                                <div class="inline-flex text-sm font-medium text-amber-600">4.2</div>
                                            </div>
                                            <div class="text-slate-400">·</div>
                                            <div class="px-2">
                                                <div
                                                    class="inline-flex text-sm font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2 py-0.5">
                                                    €{{ $cart_item->associatedModel->price }}</div>
                                            </div>
                                            <div class="flex justify-center mx-2">
                                                <button class="mx-2 bg-indigo-400 rounded-sm text-white font-bold text-center w-8">-</button>

                                                <div style="height: 42px" class="text-center p-2 align-middle leading-6 mx-2 border text-sm w-8 font-medium">{{ $cart_item->quantity }}</div>
                                                <button class="mx-2 bg-indigo-400 rounded-sm text-white font-bold text-center w-8">+</button>
                                            </div>


                                        </div> <button
                                            class="text-sm btn bg-rose-500 p-2 text-white hover:bg-rose-600">Remove</button>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <h1>Nothing was found 😓</h1>
                        @endforelse
                    </ul>
                </div>

                <!-- Sidebar -->
                <div class="as ri teb">
                    <div class="bg-white vl by rounded-sm border border-slate-200 tev tnu">
                        <div class="text-slate-800 font-semibold mb-2">Order Summary</div>
                        <!-- Order details -->
                        <ul class="mb-4">
                            <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                                <div>Products &amp; Subscriptions</div>
                                <div class="font-medium text-slate-800">€{{ $total_price_without_fee }}</div>
                            </li>
                            <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                                <div>Shipping</div>
                                <div class="font-medium text-slate-800">Free</div>
                            </li>
                            <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                                <div>Taxes</div>
                                <div class="font-medium text-slate-800">€
                                    {{ $total_price - $total_price_without_fee }}</div>
                            </li>
                            <li class="text-sm oq flex fg vm border-b-1 border-slate-200">
                                <div>Total due (including taxes)</div>
                                <div class="font-medium text-emerald-600">€{{ $total_price }}</div>
                            </li>
                        </ul>
                        <!-- Promo box -->
                        @if ($intent !== null)
                            <form action="{{ $route }}" method="POST" id="payment-form">
                                @csrf
                                @method('POST')
                                <div class="mb-6">
                                    {{-- <div class="flex items-center fg"> --}}
                                    {{-- <label class="block text-sm font-medium mb-1" for="promo">Promo Code</label>
                                    <div class="text-sm text-slate-400 gz">optional</div>
                                </div>
                                <input id="promo" class="tn oq mb-2" type="text">
                                <button class="btn oq hb xs yo kf kl kh ka bb" disabled="disabled">Apply Code</button> --}}

                                    <div id="payment-element">


                                    </div>
                                    <div id="card-errors" role="alert"></div>
                                </div>
                                <div class="mb-4">
                                    <button class="btn oq hb xs yo" id="card-button" data-secret="{{ $intent }}"
                                        href="#0">Buy Now - €{{ $total_price }}</button>
                                </div>
                                <div class="gb text-slate-500 gz text-center">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit,
                                    sed do <a class="bu xz" href="#0">Terms</a>.</div>
                            </form>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3"></script>
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const appearance = {
                labels: 'floating'
            };
            const stripe = Stripe('{{ $stripe_key }}', {
                locale: 'en'
            }); // Create a Stripe client.
            // Create an instance of Elements
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
            var elements = stripe.elements({
                clientSecret: clientSecret,
                appearance: appearance,
            });

            const paymentElement = elements.create("payment", {
                clientSecret
            });
            paymentElement.mount("#payment-element");

            paymentElement.addEventListener('change', ({
                error
            }) => {
                console.log(error);
                const displayError = document.getElementById('card-errors');
                if (error) {
                    displayError.textContent = error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                stripe.confirmPayment({
                        elements,
                        confirmParams: {
                            return_url: 'https://example.com',

                        },
                        redirect: 'if_required',
                    })
                    .then(function(result) {
                        if (result.error) {
                            console.log(result.error);
                        } else {
                            form.submit();
                        }
                    });
            });
        });
    </script>
</x-app-layout>
