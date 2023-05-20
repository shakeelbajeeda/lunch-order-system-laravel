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
                'user',
                'renewableEnergy',
                'renewableEnergy.renewableEnergyType',
                'renewableEnergy.user'
            ])->get()
        ]);
    }
}
