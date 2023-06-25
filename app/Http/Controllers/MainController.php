<?php

namespace App\Http\Controllers;

use App\Exports\TradingHistoryExport;
use App\Models\MarketInformation;
use App\Models\EnergyOrder;
use App\Models\AllEnergyType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Update user profile
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userProfileUpdate(Request $request)
    {
        $validated = $request->validate([
            'address' => ['required', 'string'],
            'zone' => ['required', 'string'],
        ]);
        if ($request->password) {
            $validated = $request->validate(['password' => ['min:5', 'max:10','regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/']]);
            $validated['password'] = Hash::make($validated['password']);
        }

        auth()->user()->update($validated);
        return redirect('/profile')->with(['message' => 'profile updated successfully']);
    }


    /**
     * Add Balance
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addBalance(Request $request)
    {
        $valid = $request->validate([
            'card_number' => ['required', 'integer', Rule::in('4242424242424242')],
            'expiry_month' => 'required|integer|between:1,12',
            'cvv' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        auth()->user()->increment('account_balance', $valid['amount']);
        return redirect()->back()->with(['message' => 'Balance added successfully']);
    }

    /**
     * Fetch Trade Energy History
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function energyTradeHistory()
    {
        $orders = EnergyOrder::with([
            'energy_buyer',
            'energy_seller',
            'energy',
            'energy.all_energy_type',
            'energy.user'
        ])
        ->when(auth()->user()->role == 'buyer', function ($query) {
            return $query->whereBuyerUserId(auth()->user()->id);
        })
        ->when(auth()->user()->role == 'seller', function ($query) {
            return $query->whereSellerUserId(auth()->user()->id);
        })->get();

        return view('dashboard.trading-history', compact('orders'));
    }


    /**
     * Excel Export of Traded Energy History
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportEnergyTradeHistory()
    {
        return Excel::download(new TradingHistoryExport, 'trading-history.xlsx');
    }

    /**
     * get week days
     *
     * @param $date
     * @return array
     */
    private function  fetchDatesArray($date) {
        $dates = [];
        for($i=1; $i<=7; $i++) {
            $dates[] = Carbon::parse($date)->addDays($i);
        }
        return $dates;
    }


    /**
     * Fetch Trade Energy History Graphs or Market Information Graphs
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fetchTradeHistoryGraphs()
    {
        $date = Carbon::today()->subDays( 7 );
        $dates_arr = $this->fetchDatesArray($date);
        $data['weekly_statistics'] = [];

        foreach ($dates_arr as $key => $date) {
            $price = EnergyOrder::when(auth()->user()->role == 'buyer', function ($query) {
                return $query->whereBuyerUserId(auth()->user()->id);
            })->when(auth()->user()->role == 'seller', function ($query) {
                return $query->whereSellerUserId(auth()->user()->id);
            })
            ->whereRaw('date(created_at) <= date("' . $date . '")')
                ->sum('total_price');
            $array = array(
                'date' => date('D', strtotime($date)),
                'trading_price' => $price,
            );
            array_push($data['weekly_statistics'], $array);
        }

        $data['market_prices_graph_data'] = [];

        foreach ($dates_arr as $key => $date) {
            $c_prices = [];
            $energy_types = MarketInformation::select('type')->distinct()->get();
            $prices_by_dates = [];
            foreach ($energy_types as $type) {
                $price = MarketInformation::
                whereRaw('date(created_at) <= date("' . $date . '")')->where('type', $type->type)->latest()->first();
                if($price) {
                    array_push($c_prices,
                        [
                            'price' => $price->price,
                            'type' => $price->type
                        ]
                    );
                } else {
                    array_push($c_prices,
                        [
                            'price' => 0,
                            'type' => $type->type
                        ]
                    );
                    array_push($prices_by_dates, ['price' => 0, 'type' => $type->type]);
                }

            }
            $array = array(
                'date' => date('D', strtotime($date)),
                'history' => $c_prices,
            );
            array_push($data['market_prices_graph_data'], $array);
        }
        $data['market_prices'] = AllEnergyType::all();
        return view('dashboard.index')->with($data);
    }


}
