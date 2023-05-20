<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TradingHistoryExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.export', [
            'orders' => Order::with([
                'seller',
                'buyer',
                'renewableEnergy',
                'renewableEnergy.renewableEnergyType',
                'renewableEnergy.user'
            ])->when(auth()->user()->user_type == 'seller', function ($query) {
                return $query->whereSellerId(auth()->user()->id);
            })->when(auth()->user()->user_type == 'buyer', function ($query) {
                return $query->whereBuyerId(auth()->user()->id);
            })->get()
        ]);
    }
}
