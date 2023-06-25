<?php

namespace App\Exports;

use App\Models\EnergyOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TradingHistoryExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.export', [
            'orders' => EnergyOrder::with([
                'energy_seller',
                'energy_buyer',
                'energy',
                'energy.all_energy_type',
                'energy.user'
            ])->when(auth()->user()->role == 'seller', function ($query) {
                return $query->whereSellerUserId(auth()->user()->id);
                })->when(auth()->user()->role == 'buyer', function ($query) {
                return $query->whereBuyerUserId(auth()->user()->id);
                })->get()
        ]);
    }
}
