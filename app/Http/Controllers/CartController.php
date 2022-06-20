<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CartController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','verified']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId = auth()->user()->id;
        $cart_items = Cart::session($userId)->getContent();

        $total_price = Cart::session($userId)->getSubTotal();
        $total_price_without_fee = Cart::session($userId)->getSubTotalWithoutConditions();

        // Enter Your Stripe Secret
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $total_price;
        $amount *= 100;
        $amount = (int) $amount;

        if ($amount >= 1) {
            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Payment from ' . auth()->user()->name,
                'amount' => $amount,
                'currency' => 'EUR',
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            session()->put(['intent_id' => $payment_intent->id]);
        }

        $css = asset('css/cart.css');
        $stripe_key = env('STRIPE_KEY');
        $form_route = route('checkout');


        return Inertia::render('Cart/Index', [
            'css' => $css,
            'cart_items' => $cart_items,
            'total_price' => $total_price,
            'intent' => $intent ?? null,
            'payment_intent' => $payment_intent ?? null,
            'total_price_without_fee' => $total_price_without_fee,
            'stripe_key' => $stripe_key,
            'form_route' => $form_route,
        ]);

        // return view('cart.index', [
        //     'cart_items' => $cart_items,
        //     'total_price' => $total_price,
        //     'intent' => $intent ?? null,
        //     'payment_intent' => $payment_intent ?? null,
        //     'total_price_without_fee' => $total_price_without_fee,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {

        $product = Product::findOrFail($request->id)->load('media');
        $feeCondition = new \Darryldecode\Cart\CartCondition([
            'name' => 'Fee 12%',
            'type' => 'tax',
            'target' => 'subtotal',
            'value' => '12%',
        ]);

        $user_id = auth()->user()->id;
        if (!Cart::session($user_id)->has((int)$request->id)) {
            Cart::session($user_id)->add([
                'id' => (int)$request->id,
                'name' => $request->name,
                'price' => (float)$request->price,
                'quantity' => (int)$request->quantity,
                'attributes' => [],
                'conditions' => [$feeCondition],
                'associatedModel' => $product,
            ]);
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function checkout()
    {
    }

    public function afterPayment(Request $request)
    {

        if ($request->session()->has('intent_id')) {
            \Stripe\Stripe::setApiKey('sk_test_51GDWkGJTnrkBAh9hTQAXjJsFyuFPZN0a68UlbIwMOTxniN0lhub1WLLWpf07ZbxyClHA5Ae3QGQsBCUvMIYvAWvh006WuH13z8');

            $intent = \Stripe\PaymentIntent::retrieve(session('intent_id'));

            // dd($intent);
            $charges = $intent->charges->data;
            $charge = $charges[0] ?? null;

            if(!isset($charge) || $charge === null) {
                abort(404);
            }
            if ($charge->paid) {
                $userId = auth()->user()->id;
                session()->forget('intent_id');
                Cart::session($userId)->clear();
                return redirect()->route('cart.index')->with('success', 'Payment Successful, please check youjr email address for more information!');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = auth()->user()->id; // or any string represents user identifier

        Cart::session($user_id)->update((int)$request->id, [
            'quantity' => [
                'relative' => false,
                'value' => (int)$request->quantity
            ],
        ]);


        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user_id = auth()->user()->id; // or any string represents user identifier
        Cart::session($user_id)->remove((int)$request->id);

        return Redirect::back();
    }
}
