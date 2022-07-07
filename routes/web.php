<?php

use App\Http\Controllers\ActiveDeliveryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Carrier\SettingsController as CarrierSettingsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Company\ProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\SettingsController as UserSettingsController;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;




Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::get('test', function () {
    return view('layouts.test');
});

Route::get('asd', function () {
    return view('asd');
});



Route::resource('/company/product', ProductController::class)->names('company.product')->except(['show']);
Route::resource('products', UserProductController::class)->only(['index', 'show']);

Route::resource('/cart', CartController::class)->only(['index', 'store']);
Route::delete('/cart', [CartController::class, 'destroy']);
Route::put('/cart', [CartController::class, 'update']);
Route::post('checkout', [CartController::class, 'afterPayment'])->name('checkout');


Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {

    //AdminController Notification logout, dashboard
    Route::resource('/dashboard', AdminController::class);
    Route::post('notifications/read', [AdminController::class, 'markNotificationsAsRead'])->name('admin.notifications.read');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resource('/user', UserController::class)->only(['index', 'show']);

    // Orders
    Route::resource('/order', OrderController::class)->only(['index', 'show']);
    Route::post('/order/assign', [OrderController::class, 'assign'])->name('admin.order.assign');




    Route::resource('/messages', SettingsController::class)->only(['index', 'show'])->names('admin.messages');
    Route::resource('/products', AdminProductController::class)->only(['index', 'show'])->names('admin.products');
    Route::delete('products/delete', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('products/activate', [AdminProductController::class, 'activate'])->name('admin.products.activate');
    Route::post('products/deactivate', [AdminProductController::class, 'deactivate'])->name('admin.products.deactivate');
    Route::post('products/unban', [AdminProductController::class, 'unban'])->name('admin.products.unban');




});



// Route::get('/company/products/create', function () {
//     return view('company.create');
// })->middleware(['auth', 'verified', 'company']);



//Carrier Settings
Route::resource('settings/carrier', CarrierSettingsController::class)->names('carrier.settings')->only(['index','edit','store']);
Route::put('settings/carrier/update', [CarrierSettingsController::class, 'update_carrier_data'])->name('carrier.settings.update_profile');
Route::post('settings/carrier/update-account', [CarrierSettingsController::class, 'update_carrier_account'])->name('carrier.settings.update_account');
Route::get('/settings/carrier/account', [CarrierSettingsController::class, 'account'])->name('carrier.settings.account');


//User Settings
Route::resource('settings/user', UserSettingsController::class)->names('user.settings')->only(['index','edit','store']);
Route::get('/settings/user/account', [ UserSettingsController::class, 'account'])->name('user.settings.account');
Route::put('settings/user/update', [UserSettingsController::class, 'update_user_data'])->name('user.settings.update_profile');
Route::put('settings/carrier/update', [UserSettingsController::class, 'update_carrier_account'])->name('user.settings.update_profile');
// Route::post('settings/carrier/update-account', [CarrierSettingsController::class, 'update_carrier_account'])->name('carrier.settings.update_account');
// Route::get('/settings/carrier/account', [CarrierSettingsController::class, 'account'])->name('carrier.settings.account');






Route::resource('active-deliveries', ActiveDeliveryController::class)->only(['index', 'show']);
Route::post('/deliveries/complete', [ActiveDeliveryController::class, 'complete'])->name('deliveries.complete');
Route::get('/deliveries/history', [ActiveDeliveryController::class, 'history'])->name('deliveries.history');

// Contact Us

Route::get('/contact-us',[ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-us',[ContactUsController::class, 'store'])->name('contact-us.store');
Route::fallback(function () {
    return view('auth.login');
});


require __DIR__ . '/auth.php';
