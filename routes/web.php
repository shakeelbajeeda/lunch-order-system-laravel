<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Director\ProductController;
use App\Http\Controllers\Director\UserController;
use App\Http\Controllers\Director\ShopController;
use App\Http\Controllers\Director\ShopWorkerController;

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
    return view('website.index');
});
Route::get('/menu', function () {
    return view('website.menu');
});
Route::get('/master_food_beverage', function () {
    return view('director.masterFood.masterFoodList');
});
Route::group(['middleware' => ['director']], function () {
   Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('products_destroy/{destroy}',[ProductController::class, 'destroy'])->name('products_destroy');
    Route::get('users_destroy/{destroy}',[UserController::class, 'destroy'])->name('users_destroy');
    Route::get('shops_destroy/{destroy}',[ShopController::class, 'destroy'])->name('shops_destroy');
    Route::get('shopStaff_destroy/{destroy}',[ShopWorkerController::class, 'destroy'])->name('shopStaff_destroy');
    Route::resources([
        'products' => ProductController::class,
        'users' => UserController::class,
        'shops' => ShopController::class,
        'shopStaff' => ShopWorkerController::class,
    ]);
});

Auth::routes();

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
