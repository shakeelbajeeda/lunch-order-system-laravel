<?php

namespace App\Http\Controllers;

use App\Models\MarketPrice;
use App\Models\RenewableEnergyType;
use Illuminate\Http\Request;

class RenewableEnergyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renewable_energy_types = RenewableEnergyType::all();
        return view('dashboard.master-trading.index', compact('renewable_energy_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.master-trading.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'energy_type' => 'required|string|unique:renewable_energy_types',
            'market_price' => 'required|numeric' ,
            'administration_fee' => 'required|numeric',
            'tax' => 'required|numeric',
        ]);

        RenewableEnergyType::create($validated);
        MarketPrice::create($validated);
        return redirect()->route('renewable-energy-type.index')->with(['message' => 'Renewable Energy Type added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RenewableEnergyType  $renewableEnergyType
     * @return \Illuminate\Http\Response
     */
    public function show(RenewableEnergyType $renewableEnergyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RenewableEnergyType  $renewableEnergyType
     * @return \Illuminate\Http\Response
     */
    public function edit(RenewableEnergyType $renewableEnergyType)
    {
        return view('dashboard.master-trading.form', compact('renewableEnergyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RenewableEnergyType  $renewableEnergyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RenewableEnergyType $renewableEnergyType)
    {
        $validated = $request->validate([
            'energy_type' => 'required|string|unique:renewable_energy_types,energy_type,'. $renewableEnergyType->id,
            'market_price' => 'required|numeric' ,
            'administration_fee' => 'required|numeric',
            'tax' => 'required|numeric',
        ]);

        $renewableEnergyType->update($validated);
        MarketPrice::create($validated);
        return redirect()->route('renewable-energy-type.index')->with(['message' => 'Renewable Energy Type updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RenewableEnergyType  $renewableEnergyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RenewableEnergyType $renewableEnergyType)
    {
        $renewableEnergyType->delete();
        return redirect()->route('renewable-energy-type.index')->with(['message' => 'Renewable Energy Type deleted successfully']);
    }


    public function getEnergyTypes()
    {
        $energy_types = RenewableEnergyType::all();
        return view('index',compact('energy_types'));
    }
}
