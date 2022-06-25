<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Carrier\SettingsController as CarrierSettingsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Company\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::get('test', function () {

    return view('layouts.test');
});



Route::resource('/company/product', ProductController::class)->names('company.product')->except(['show']);
Route::resource('products', UserProductController::class)->only(['index', 'show']);

Route::resource('/cart', CartController::class)->only(['index', 'store']);
Route::delete('/cart', [CartController::class, 'destroy']);
Route::put('/cart', [CartController::class, 'update']);
Route::post('checkout', [CartController::class, 'afterPayment'])->name('checkout');


Route::prefix('admin')->group(function () {
    Route::resource('/dashboard', AdminController::class);
    Route::resource('/user', UserController::class)->only(['index', 'show']);
    Route::resource('/order', OrderController::class)->only(['index', 'show']);
    Route::resource('/settings', SettingsController::class)->only(['index', 'show']);
    Route::resource('/products', AdminProductController::class)->only(['index', 'show'])->names('admin.products');
    Route::delete('products/delete', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

// Route::get('/company/products/create', function () {
//     return view('company.create');
// })->middleware(['auth', 'verified', 'company']);

Route::resource('settings', CarrierSettingsController::class)->names('carrier.settings')->only(['index','edit','store']);
Route::get('/settings/account', [CarrierSettingsController::class, 'account'])->name('carrier.settings.account');

Route::fallback(function () {
    return view('welcome');
});
require __DIR__ . '/auth.php';
