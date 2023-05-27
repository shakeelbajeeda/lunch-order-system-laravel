<?php

namespace App\Http\Controllers;

use App\Models\RenewableEnergy;
use App\Models\RenewableEnergyType;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RenewableEnergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renewable_energies = RenewableEnergy::with('renewableEnergyType')
        ->when(auth()->user()->user_id == 'seller', function ($query) {
            return $query->whereUserId(auth()->user()->id);
        })->get();
        return view('dashboard.renewable-energies.index', compact('renewable_energies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->is_active) {
            return redirect()->back()->with(['error' => "Sorry you'r inactivated. Please contact to service manager!"]);
        }
        $renewable_energy_types = RenewableEnergyType::all();
        return view('dashboard.renewable-energies.form', compact('renewable_energy_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'renewable_energy_type_id' => 'required|integer',
            'volume' => 'required|numeric',
            'price' => 'required|numeric',
        ],['renewable_energy_type_id' => 'The renewable energy type field required']);

        if (RenewableEnergy::whereRenewableEnergyTypeId($request->renewable_energy_type_id)->whereUserId(auth()->user()->id)->exists()) {
            throw ValidationException::withMessages(['renewable_energy_type_id' => 'The energy you have already added']);
        }
        $valid['user_id'] = auth()->user()->id;
        $type = RenewableEnergyType::findOrFail($request->renewable_energy_type_id);
        if (isset($type)) {
            $percent_price = $type->market_price / 10;
            $min = $type->market_price - $percent_price;
            $max = $type->market_price + $percent_price;
            if ($valid['price'] < $min || $valid['price'] > $max) {
                throw ValidationException::withMessages(['price' => 'Price must be in $'. $min . ' to $' . $max]);
            }
        }

        RenewableEnergy::create($valid);

        return redirect()->route('renewable-energies.index')->with(['message' => 'Renewable Energy added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RenewableEnergy  $renewableEnergy
     * @return \Illuminate\Http\Response
     */
    public function show(RenewableEnergy $renewableEnergy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RenewableEnergy  $renewableEnergy
     * @return \Illuminate\Http\Response
     */
    public function edit(RenewableEnergy $renewableEnergy)
    {
        $renewable_energy_types = RenewableEnergyType::all();
        return view('dashboard.renewable-energies.form', compact(['renewable_energy_types', 'renewableEnergy']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RenewableEnergy  $renewableEnergy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RenewableEnergy $renewableEnergy)
    {
        $valid = $request->validate([
            'renewable_energy_type_id' => 'required|integer',
            'volume' => 'required|numeric',
            'price' => 'required|numeric',
        ],['renewable_energy_type_id' => 'The renewable energy type field required']);

        if ($renewableEnergy->renewable_energy_type_id !== $request->renewable_energy_type_id  && RenewableEnergy::whereRenewableEnergyTypeId($request->renewable_energy_type_id)->whereUserId(auth()->user()->id)->exists()) {
            throw ValidationException::withMessages(['renewable_energy_type_id' => 'The energy you have already added']);
        }
        $renewableEnergy->load('renewableEnergyType');

        $percent_price = $renewableEnergy->renewableEnergyType->market_price / 10;
        $min = $renewableEnergy->renewableEnergyType->market_price - $percent_price;
        $max = $renewableEnergy->renewableEnergyType->market_price + $percent_price;
        if ($valid['price'] < $min || $valid['price'] > $max) {
            throw ValidationException::withMessages(['price' => 'Price must be in $'. $min . ' to $' . $max]);
        }

        $renewableEnergy->update($valid);
        return redirect()->route('renewable-energies.index')->with(['message' => 'Renewable Energy updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RenewableEnergy  $renewableEnergy
     * @return \Illuminate\Http\Response
     */
    public function destroy(RenewableEnergy $renewableEnergy)
    {
        $renewableEnergy->delete();
        return redirect()->back()->with(['message' => 'Renewable Energy deleted successfully']);
    }


    /**
     * Search renewable energies
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getRenewableEnergies(Request $request)
    {
        $renewable_energies = RenewableEnergy::query()->where('volume', '>', 0)->with(['user', 'renewableEnergyType']);
        $renewable_energies->when(isset($request->search), function ($query) use ($request) {
            return $query->with(['user' => function($q) use ($request) {
                $q->where('zone', 'LIKE', '%'. $request->search . '%');
            }]);
        });
        $renewable_energies = $renewable_energies->get()->filter(fn($value) => !is_null($value->user) && !empty($value->user));
        return view('trading', compact('renewable_energies'));
    }
}
