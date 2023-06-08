<?php

namespace App\Http\Controllers;

use App\Exports\TradingHistoryExport;
use App\Models\MarketPrice;
use App\Models\Order;
use App\Models\RenewableEnergyType;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'address' => ['required', 'string'],
            'zone' => ['required', 'string'],
            'balance' => '',
        ]);
        if ($request->password) {
            $validated = $request->validate(['password' => ['min:5', 'max:10','regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/']]);
            $validated['password'] = Hash::make($validated['password']);
        }

        auth()->user()->update($validated);
        return redirect()->back()->with(['message' => 'Your profile has been updated successfully']);
    }

    /**
     * Get trading history
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function tradingHistory()
    {
        $orders = Order::with([
            'seller',
            'buyer',
            'renewableEnergy',
            'renewableEnergy.renewableEnergyType',
            'renewableEnergy.user'
        ])
        ->when(auth()->user()->user_type == 'buyer', function ($query) {
            return $query->whereBuyerId(auth()->user()->id);
        })
        ->when(auth()->user()->user_type == 'seller', function ($query) {
            return $query->whereSellerId(auth()->user()->id);
        })->get();

        return view('dashboard.trading-history', compact('orders'));
    }


    /**
     * Export Trading History in Excel Form
     *
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new TradingHistoryExport, 'trading-history.xlsx');
    }

    private function  get_dates_arry($date) {
        $dates = [];
        for($i=1; $i<=7; $i++) {
            $dates[] = Carbon::parse($date)->addDays($i);
        }
        return $dates;
    }


    public function getTradingGraphData()
    {
        $date = Carbon::today()->subDays( 7 );
        $dates_arr = $this->get_dates_arry($date);
        $data['weekly_statistics'] = [];

        foreach ($dates_arr as $key => $date) {
            $price = Order::when(auth()->user()->user_type == 'buyer', function ($query) {
                return $query->whereBuyerId(auth()->user()->id);
            })->when(auth()->user()->user_type == 'seller', function ($query) {
                return $query->whereSellerId(auth()->user()->id);
            })
            ->whereRaw('date(created_at) <= date("' . $date . '")')
                ->sum('price');
            $array = array(
                'date' => date('D', strtotime($date)),
                'trading_price' => $price,
            );
            array_push($data['weekly_statistics'], $array);
        }

        $data['market_prices_graph_data'] = [];

        foreach ($dates_arr as $key => $date) {
            $c_prices = [];
            $energy_types = MarketPrice::select('energy_type')->distinct()->get();
            $prices_by_dates = [];
            foreach ($energy_types as $type) {
                $price = MarketPrice::
                whereRaw('date(created_at) <= date("' . $date . '")')->where('energy_type', $type->energy_type)->latest()->first();
                if($price) {
                    array_push($c_prices,
                        [
                            'price' => $price->market_price,
                            'type' => $price->energy_type
                        ]
                    );
                } else {
                    array_push($c_prices,
                        [
                            'price' => 0,
                            'type' => $type->energy_type
                        ]
                    );
                    array_push($prices_by_dates, ['price' => 0, 'type' => $type->energy_type]);
                }

            }
            $array = array(
                'date' => date('D', strtotime($date)),
                'history' => $c_prices,
            );
            array_push($data['market_prices_graph_data'], $array);
        }
//        dd($data);
        $data['market_prices'] = RenewableEnergyType::all();
        return view('dashboard.index')->with($data);
    }


    public function depositFund(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|integer',
            'card_number' => 'required|integer|min:16',
            'csv' => 'required|integer|min:3',
            'month' => 'required|integer',
            'year' => 'required|integer'
        ]);

        auth()->user()->increment('balance',$validated['amount']);
        return redirect()->back()->with(['message' => 'payment deposit successfully']);
    }


}
