<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MasterTradingController;
use App\Http\Controllers\EnergyOrderController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MasterTradingController::class, 'fetchTypes']);

Route::middleware('auth')->group(function () {
    Route::resource('energy-order', EnergyOrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('energies', EnergyController::class);
    Route::resource('all-energy-types', MasterTradingController::class);
    Route::put('user/profile/update', [MainController::class, 'userProfileUpdate'])->name('user.profile.update');
    Route::get('/energy/trade/history', [MainController::class, 'energyTradeHistory'])->name('energy.trade.history');
    Route::get('/export/energy/trade/history', [MainController::class, 'exportEnergyTradeHistory'])->name('export.energy.trade.history');
    Route::get('/dashboard', [MainController::class, 'fetchTradeHistoryGraphs'])->name('dashboard');
    Route::post('/deposit', [MainController::class, 'addBalance'])->name('deposit');
    Route::view('/account', 'dashboard.profile.payment-form');
    Route::view('/profile', 'dashboard.profile.form');
});



Route::get('/view-trading', [\App\Http\Controllers\EnergyController::class, 'getRenewableEnergies'])->name('view.trading');
Auth::Routes();
