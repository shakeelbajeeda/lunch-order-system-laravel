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

Route::get('/', [\App\Http\Controllers\RenewableEnergyTypeController::class, 'getEnergyTypes']);

Route::middleware('auth')->group(function () {
    Route::resources([
        'order' => \App\Http\Controllers\OrderController::class,
        'renewable-energies' => \App\Http\Controllers\RenewableEnergyController::class,
        'renewable-energy-type' => \App\Http\Controllers\RenewableEnergyTypeController::class,
        'users' => \App\Http\Controllers\UserManagementController::class,
    ]);

    Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
        Route::put('update-profile', 'updateProfile')->name('update-profile');
        Route::get('/trading-history', 'tradingHistory')->name('trading-history');
        Route::get('export-history', 'export')->name('export-history');
        Route::get('/dashboard', 'getTradingGraphData');

    });

    Route::view('/update-profile', 'dashboard.profile.form');
});



Route::get('/trading', [\App\Http\Controllers\RenewableEnergyController::class, 'getRenewableEnergies'])->name('trading');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
