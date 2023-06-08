<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RenewableEnergy;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
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
            'renewable_energy_id' => 'required|integer'
        ]);

        $renewable_energy = RenewableEnergy::whereId($request->renewable_energy_id)->with(['renewableEnergyType', 'user'])->first();

        if (auth()->user()->user_type == 'seller') {
            return redirect('/trading')->with(['error' => "Sorry you are seller!"]);
        }

        if (!auth()->user()->is_active) {
            return redirect('/trading')->with(['error' => "You are inactivated contact to service manager thanks!"]);
        }

        if (auth()->user()->zone !== $renewable_energy->user->zone) {
            return redirect('/trading')->with(['error' => "You can buy only same zone seller energy!"]);
        }

        if (isset($renewable_energy)) {
            if ($request->volume <= $renewable_energy->volume) {
                $amount = ($request->volume * $renewable_energy->price) + $renewable_energy->renewableEnergyType->tax + $renewable_energy->renewableEnergyType->administration_fee;
                if (auth()->user()->balance < $amount) {
                    return redirect('/trading')->with(['error' => "You do not have enough balance to buy this energy!"]);
                }

                Order::create([
                    'buyer_id' => auth()->user()->id,
                    'seller_id' => $renewable_energy->user_id,
                    'renewable_energy_id' => $renewable_energy->id,
                    'volume' => $request->volume,
                    'price' => $amount,
                ]);

                // decrease balance of buyer
                auth()->user()->decrement('balance', $amount);

                // minus order volume from available energy volume
                $renewable_energy->decrement('volume', $request->volume);

                // increase balance of seller
                $renewable_energy->user->increment('balance', $amount - $renewable_energy->administration_fee);

                // add administration fee to service manager account
                User::whereUserType('service_manager')->increment('balance', $renewable_energy->renewableEnergyType->administration_fee);

                return redirect('/trading')->with(['message' => 'Energy purchased successfully']);
            } else {
                return redirect('/trading')->with(['error' => "You cannot add volume more than available volume!"]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
