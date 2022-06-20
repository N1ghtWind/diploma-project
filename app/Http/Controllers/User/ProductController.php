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
        $this->middleware(['auth','verified']);

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

        return Inertia::render('Products/Index',['products' => Product::with('media')->get(), 'CartItems' => $cartItems]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('user.show',['product' => $product]);
    }


}
