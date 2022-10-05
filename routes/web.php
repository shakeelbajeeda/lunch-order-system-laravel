<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Director\ProductController;
use App\Http\Controllers\Director\UserController;
use App\Http\Controllers\Director\ShopController;
use App\Http\Controllers\Director\ShopWorkerController;
use App\Http\Controllers\Stripe\StripePaymentController;
use App\Http\Controllers\Manager\ManagerController;
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

Route::group(['middleware' => 'auth'], function (){
    Route::post('stripePost',[StripePaymentController::class, 'stripePost'])->name('stripePost');
    Route::get('/checkout', function () {
        return view('website.checkout');
    });
    Route::get('/order', [\App\Http\Controllers\User\CheckoutController::class, 'checkout'])->name('orderNow');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home-menu', [\App\Http\Controllers\HomeController::class, 'index'])->name('home_menu');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/main-menu', [\App\Http\Controllers\HomeController::class, 'index'])->name('main-menu');
Route::get('/menu/{shop_id}', [\App\Http\Controllers\HomeController::class, 'getShopProducts'])->name('shopProducts');
Route::get('/menu', function () {
    return view('website.menu');
});
Route::get('/master_food_beverage', function () {
    return view('director.masterFood.masterFoodList');
});
Route::group(['middleware' => ['auth', 'director']], function () {
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('products_destroy/{destroy}',[ProductController::class, 'destroy'])->name('products_destroy');
    Route::get('users_destroy/{destroy}',[UserController::class, 'destroy'])->name('users_destroy');
    Route::get('shops_destroy/{destroy}',[ShopController::class, 'destroy'])->name('shops_destroy');
    Route::get('shopStaff_destroy/{destroy}',[ShopWorkerController::class, 'destroy'])->name('shopStaff_destroy');
    Route::get('depositPayments',[StripePaymentController::class, 'create'])->name('depositPayments');
    Route::resources([
        'products' => ProductController::class,
        'users' => UserController::class,
        'shops' => ShopController::class,
        'shopStaff' => ShopWorkerController::class,
    ]);
});
Route::group(['middleware' => ['auth', 'manager']], function () {
Route::get('items', [ManagerController::class, 'getProducts'])->name('getProducts');
Route::get('addToMenu/{addToMenu}', [ManagerController::class, 'addToMenu'])->name('addToMenu');
Route::get('menu_management', [ManagerController::class, 'getMenuProducts'])->name('menumanagement');
Route::get('removeFromMenu/{removeFromMenu}', [ManagerController::class, 'removeFromMenu'])->name('removeFromMenu');
Route::get('menuPage', [\App\Http\Controllers\Manager\MenuController::class, 'index'])->name('getMenu');
Route::resources([
    'shoptime' => \App\Http\Controllers\Manager\ChangeShopTimeController::class
]);
Route::get('order/history', [ManagerController::class, 'order_history'])->name('orderHistory');
});
Route::get('productDetail/{detail}', [\App\Http\Controllers\Manager\MenuController::class, 'productDetail'])->name('productDetail');
Route::get('addToCart/{product_id}/{shop_id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::delete('removeFromCart', [\App\Http\Controllers\CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::patch('updateCart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('updateCart');
Route::get('/cart', function () {
    return view('website.cart');

});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/setting', [\App\Http\Controllers\User\MainController::class, 'setting'])->name('setting');
    Route::post('/updateSetting', [\App\Http\Controllers\User\MainController::class, 'updateSetting'])->name('updateSetting');
    Route::get('/account', function (){
        return view('user.account');
    });
    Route::get('/order-history', [\App\Http\Controllers\User\MainController::class, 'user_order_history'])->name('user_order_history');
    Route::get('/order-history/detail/{id}', [\App\Http\Controllers\User\MainController::class, 'order_detail'])->name('order_detail');
});
Auth::routes();
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
