<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','verified']);

    }

    public function getSession() {
        $stripe = new StripeClient(env('STRIPE_SECRET'));


        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => [
              [
                'currency' => 'eur',
                'price' => '500',
                'quantity' => 1,
              ],
            ],
            'mode' => 'payment',
          ]);

          return $checkout;
    }
}
