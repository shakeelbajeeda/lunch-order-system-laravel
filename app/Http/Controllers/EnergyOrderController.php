<?php

namespace App\Http\Controllers;

use App\Models\EnergyOrder;
use App\Models\Energy;
use App\Models\User;
use Illuminate\Http\Request;

class EnergyOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'volume' => 'required|numeric',
            'energy_id' => 'required|integer'
        ]);

        $renewable_energy = Energy::whereId($request->energy_id)->with(['all_energy_type', 'user'])->first();

        if (auth()->user()->role == 'seller') {
            return redirect('/view-trading')->with(['error' => "Sorry you're a seller not a buyer!"]);
        }

        if (!auth()->user()->status) {
            return redirect('/view-trading')->with(['error' => "You are inactivated to buy a energy. Please contact to service manager thanks!"]);
        }

        if (auth()->user()->zone !== $renewable_energy->user->zone) {
            return redirect('/view-trading')->with(['error' => "You can only buy energy from your zone seller!"]);
        }

        if (isset($renewable_energy)) {
            if ($request->volume <= $renewable_energy->energy_volume) {
                $amount = ($request->volume * $renewable_energy->energy_price) + $renewable_energy->all_energy_type->energy_tax + $renewable_energy->all_energy_type->administration_fee;
                if (auth()->user()->account_balance < $amount) {
                    return redirect('/view-trading')->with(['error' => "You do not have enough account_balance to buy this energy!"]);
                }

                EnergyOrder::create([
                    'buyer_user_id' => auth()->user()->id,
                    'seller_user_id' => $renewable_energy->user_id,
                    'energy_id' => $renewable_energy->id,
                    'purchased_volume' => $request->volume,
                    'total_price' => $amount,
                ]);

                // decrease account_balance of buyer
                auth()->user()->decrement('account_balance', $amount);

                // minus order volume from available energy volume
                $renewable_energy->decrement('energy_volume', $request->volume);

                // increase account_balance of seller
                $renewable_energy->user->increment('account_balance', $amount - $renewable_energy->administration_fee);

                // add administration fee to service manager account
                User::whereRole('service_manager')->increment('account_balance', $renewable_energy->all_energy_type->administration_fee);

                return redirect('/view-trading')->with(['message' => 'Energy Buy successfully']);
            }
            else {
                return redirect('/view-trading')->with(['error' => 'You cannot buy energy greater than available energy volume!']);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnergyOrder  $order
     * @return \Illuminate\Http\Response
     */
    public function show(EnergyOrder $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnergyOrder  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(EnergyOrder $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnergyOrder  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnergyOrder $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnergyOrder  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnergyOrder $order)
    {
        //
    }
}
