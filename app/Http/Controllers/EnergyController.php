<?php

namespace App\Http\Controllers;

use App\Models\Energy;
use App\Models\AllEnergyType;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EnergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $energies = Energy::with('all_energy_type')
        ->when(auth()->user()->type !== 'service_manager', function ($query) {
            return $query->whereUserId(auth()->user()->id);
        })->get();
        return view('dashboard.energies.index', compact('energies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (!auth()->user()->status) {
            return redirect()->back()->with(['error' => "Sorry you'r inactivated. Please contact to service manager!"]);
        }
        $all_energy_types = AllEnergyType::all();
        return view('dashboard.energies.form', compact('all_energy_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'all_energy_type_id' => 'required|integer',
            'energy_volume' => 'required|numeric',
            'energy_price' => 'required|numeric',
        ],['all_energy_type_id' => 'The renewable energy type field required']);

        if (Energy::whereAllEnergyTypeId($request->all_energy_type_id)->whereUserId(auth()->user()->id)->exists()) {
            throw ValidationException::withMessages(['all_energy_type_id' => 'The energy you have already added']);
        }
        $valid['user_id'] = auth()->user()->id;
        $type = AllEnergyType::findOrFail($request->all_energy_type_id);
        if (isset($type)) {
            $percent_price = $type->price / 10;
            $min = $type->price - $percent_price;
            $max = $type->price + $percent_price;
            if ($valid['energy_price'] < $min || $valid['energy_price'] > $max) {
                throw ValidationException::withMessages(['energy_price' => 'Price should be between $'. $min . ' to $' . $max]);
            }
        }

        Energy::create($valid);

        return redirect()->route('energies.index')->with(['message' => 'Renewable Energy added successfully']);
    }

    /**
     * Display the specified resource
     *
     * @param Energy $energy
     * @return void
     */
    public function show(Energy $energy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Energy $energy
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Energy $energy)
    {
        $all_energy_types = AllEnergyType::all();
        return view('dashboard.energies.form', compact(['all_energy_types', 'energy']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Energy $energy
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Energy $energy)
    {
        $valid = $request->validate([
            'all_energy_type_id' => 'required|integer',
            'energy_volume' => 'required|numeric',
            'energy_price' => 'required|numeric',
        ],['all_energy_type_id' => 'The renewable energy type field required']);

        if ($energy->all_energy_type_id === $request->all_energy_type_id  && Energy::whereAllEnergyTypeId($request->all_energy_type_id)->whereUserId(auth()->user()->id)->exists()) {
            throw ValidationException::withMessages(['all_energy_type_id' => 'The energy you have already added']);
        }
        $energy->load('all_energy_type');

        $percent_price = $energy->all_energy_type->price / 10;
        $min = $energy->all_energy_type->price - $percent_price;
        $max = $energy->all_energy_type->price + $percent_price;
        if ($valid['energy_price'] < $min || $valid['energy_price'] > $max) {
            throw ValidationException::withMessages(['energy_price' => 'Price should be between $'. $min . ' to $' . $max]);
        }

        $energy->update($valid);
        return redirect()->route('energies.index')->with(['message' => 'Renewable Energy updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Energy $energy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Energy $energy)
    {
        $energy->delete();
        return redirect()->back()->with(['message' => 'Renewable Energy deleted successfully']);
    }


    /**
     * Filter energies from the existing database
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getRenewableEnergies(Request $request)
    {
        $renewable_energies = Energy::query()->where('energy_volume', '>', 0)->with(['user', 'all_energy_type']);
        $renewable_energies->when(isset($request->energy_type), function ($query) use ($request) {
            return $query->whereAllEnergyTypeId($request->energy_type);
        });
        $renewable_energies->when(isset($request->zone), function ($query) use ($request) {
            return $query->with(['user' => function($q) use ($request) {
                $q->where('zone', 'LIKE', '%'. $request->zone . '%');
            }]);
        });
        $renewable_energies = $renewable_energies->get()->filter(fn($value) => !is_null($value->user) && !empty($value->user));
        return view('trading', compact('renewable_energies'));
    }
}
