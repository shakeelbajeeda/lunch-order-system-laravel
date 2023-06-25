<?php

namespace App\Http\Controllers;

use App\Models\MarketInformation;
use App\Models\AllEnergyType;
use Illuminate\Http\Request;

class MasterTradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $all_energy_types = AllEnergyType::get();
        return view('dashboard.master-trading.index', compact('all_energy_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.master-trading.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|unique:all_energy_types',
            'price' => 'required|numeric' ,
            'administration_fee' => 'required|numeric',
            'energy_tax' => 'required|numeric',
        ]);

        AllEnergyType::create($validated);
        MarketInformation::create($validated);
        return redirect()->route('all-energy-types.index')->with(['message' => 'Renewable Energy Type added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param AllEnergyType $allEnergyType
     * @return void
     */
    public function show(AllEnergyType $allEnergyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AllEnergyType $allEnergyType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(AllEnergyType $allEnergyType)
    {
        return view('dashboard.master-trading.form', compact('allEnergyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AllEnergyType $allEnergyType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AllEnergyType $allEnergyType)
    {
        $validated = $request->validate([
            'type' => 'required|string|unique:all_energy_types,type,'. $allEnergyType->id,
            'price' => 'required|numeric' ,
            'administration_fee' => 'required|numeric',
            'energy_tax' => 'required|numeric',
        ]);

        $allEnergyType->update($validated);
        MarketInformation::create($validated);
        return redirect()->route('all-energy-types.index')->with(['message' => 'Renewable Energy Type updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AllEnergyType $allEnergyType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AllEnergyType $allEnergyType)
    {
        $allEnergyType->delete();
        return redirect()->route('all-energy-types.index')->with(['message' => 'Renewable Energy Type deleted successfully']);
    }


    public function fetchTypes()
    {
        $energy_types = AllEnergyType::all();
        return view('index',compact('energy_types'));
    }
}
