<?php

use App\Http\Controllers\Company\ProductController;
use App\Http\Controllers\User\ProductController as UserProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function() {
    return view('layouts.test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/register/carrier', function () {
    return view('auth.register');
})->name('register-carrier');



Route::resource('/company/product',ProductController::class)->names('company.product');
Route::resource('products',UserProductController::class)->only(['index','show']);
// Route::get('/company/products/create', function () {
//     return view('company.create');
// })->middleware(['auth', 'verified', 'company']);

require __DIR__ . '/auth.php';
