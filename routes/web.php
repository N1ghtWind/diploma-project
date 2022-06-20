<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Company\ProductController;
use App\Http\Controllers\User\ProductController as UserProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('layouts.test');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('products');

// Route::get('/register/carrier', function () {
//     return view('auth.register');
// })->name('register-carrier');



Route::resource('/company/product', ProductController::class)->names('company.product');
Route::resource('products', UserProductController::class)->only(['index', 'show']);

Route::resource('/cart', CartController::class)->only(['index', 'store']);
Route::delete('/cart', [CartController::class, 'destroy']);
Route::put('/cart', [CartController::class, 'update']);
Route::post('checkout', [CartController::class,'afterPayment'])->name('checkout');


Route::prefix('admin')->group(function () {
    Route::resource('/dashboard', AdminController::class);
    Route::resource('/user', UserController::class)->only(['index', 'show']);
    Route::resource('/order', OrderController::class)->only(['index', 'show']);
    Route::resource('/settings', SettingsController::class)->only(['index', 'show']);
    Route::resource('/products', AdminProductController::class)->only(['index', 'show'])->names('admin.products');
    Route::delete('products/delete', [AdminProductController::class,'destroy'])->name('admin.products.destroy');
});



Route::get("stripe", function () {
    // Enter Your Stripe Secret
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $amount = 100;
    $amount *= 100;
    $amount = (int) $amount;

    $payment_intent = \Stripe\PaymentIntent::create([
        'description' => 'Stripe Test Payment',
        'amount' => $amount,
        'currency' => 'EUR',
        'description' => 'Payment From Codehunger',
        'payment_method_types' => ['card', 'ideal'],
    ]);
    $intent = $payment_intent->client_secret;
    return view('stripe',  compact('intent'));
});

// Route::get('/company/products/create', function () {
//     return view('company.create');
// })->middleware(['auth', 'verified', 'company']);

require __DIR__ . '/auth.php';
