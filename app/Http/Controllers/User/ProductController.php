<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id; // or any string represents user identifier
        $cartItems = Cart::session($userId)->getContent();

        $prdoucts = Product::where('status', 'active')->with('media')->get();



        if (request()->has('search')) {

            $term = trim(request()->query('search'));

            $prdoucts = Product::search($term)->where('status', 'active')->query(function ($query) {
                $query->with('media');
            })->get();
            return Inertia::render('Products/Index', ['products' => $prdoucts, 'CartItems' => $cartItems]);
        }


        return Inertia::render('Products/Index', ['products' => $prdoucts, 'CartItems' => $cartItems]);


    }
    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('user.show', ['product' => $product]);
    }
}
