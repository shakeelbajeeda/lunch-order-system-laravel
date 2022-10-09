<?php

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

Route::group(['middleware' => ['auth', 'director']], function (){
   Route::resources([
       'user' => \App\Http\Controllers\Director\UserController::class,
       'shop' => \App\Http\Controllers\Director\ShopController::class,
       'shopstaff' => \App\Http\Controllers\Director\ShopStaffController::class,
       'product' => \App\Http\Controllers\Director\ProductController::class,
   ]);
});
Route::group(['middleware' => ['auth', 'manager']], function (){
    Route::get('master-list', [\App\Http\Controllers\Manager\ManagerController::class, 'index'])->name('masterFoodList');
    Route::get('menu-management', [\App\Http\Controllers\Manager\ManagerController::class, 'shop_products'])->name('menu_management');
    Route::get('add-product-to-menu/{id}',[\App\Http\Controllers\Manager\ManagerController::class, 'add_product_to_menu'])->name('add_product_to_menu');
    Route::get('remove-product-from-menu/{id}',[\App\Http\Controllers\Manager\ManagerController::class, 'remove_from_menu'])->name('remove_from_menu');
    Route::get('shop/update/time/{id}',[\App\Http\Controllers\Manager\ManagerController::class, 'get_shop_time'])->name('get_shop_time');
    Route::get('shop-time',[\App\Http\Controllers\Manager\ManagerController::class, 'shop_time_index'])->name('shop_time_index');
    Route::put('update-shop-time', [\App\Http\Controllers\Manager\ManagerController::class, 'update_shop_time'])->name('update_shop_time');
    Route::get('shop/order/history', [\App\Http\Controllers\Manager\ManagerController::class, 'order_history'])->name('shop_order_history');
});
Route::group(['middleware' => ['auth', 'user']], function (){
    Route::get('deposit/payments', [\App\Http\Controllers\User\UserController::class, 'index'])->name('deposit_payments');
    Route::post('deposit', [\App\Http\Controllers\User\PaymentController::class, 'deposit'])->name('deposit');
    Route::get('user/order/history', [\App\Http\Controllers\User\UserController::class, 'order_history'])->name('order_history');
});
Route::group(['middleware' => ['auth']], function (){
    Route::post('order', [\App\Http\Controllers\User\OrderController::class, 'order_now'])->name('order_now');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('menu/{id}', [\App\Http\Controllers\HomeController::class, 'get_shop_products'])->name('get_shop_products');
//Route::get('dashboard',function (){
//    return view('dashboard.index');
//});
Auth::routes();
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
