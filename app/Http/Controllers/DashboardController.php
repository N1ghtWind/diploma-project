<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    public function index()
    {

        $latests = Product::all()->sortBy('created_at')->take(5);

        $top_sellings = DB::table('product_order')->select(DB::raw('product_id, count(*) as total'))->groupBy('product_id')->orderBy('total', 'desc')->take(5)->get();
        $top_sellings = $top_sellings->map(function ($item) {
            $product = Product::where('id', $item->product_id)->with('media')->first();
            $item->product = $product;
            return $item;
        });

        $cheapest_products = DB::table('products')->select(DB::raw('id, price'))->orderBy('price', 'asc')->take(5)->get();

        $cheapest_products = $cheapest_products->map(function ($item) {
            $product = Product::where('id', $item->id)->with('media')->first();
            $item->product = $product;
            return $item;
        });

        $most_expensive_products = DB::table('products')->select(DB::raw('id, price'))->orderBy('price', 'desc')->take(5)->get();
        $most_expensive_products = $most_expensive_products->map(function ($item) {
            $product = Product::where('id', $item->id)->with('media')->first();
            $item->product = $product;
            return $item;
        });


        return view('welcome', [
            'latests' => $latests,
            'top_sellings' => $top_sellings,
            'cheapest_products' => $cheapest_products,
            'most_expensive_products' => $most_expensive_products,
        ]);

    }

}
