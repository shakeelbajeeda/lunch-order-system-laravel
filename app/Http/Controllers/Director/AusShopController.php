<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\AusShop;

class AusShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['shops'] = AusShop::all();
        return view('dashboard.director.shop.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.director.shop.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShopRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopRequest $request)
    {
        $data = $request->validated();
        AusShop::create($data);
        return redirect()->route('shop.index')->with('message', 'shop has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AusShop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(AusShop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AusShop $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(AusShop $shop)
    {
        return view('dashboard.director.shop.form', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShopRequest $request
     * @param AusShop $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopRequest $request, AusShop $shop)
    {
        $shop->update($request->all());
        return redirect()->route('shop.index')->with('message', 'shop has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AusShop $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AusShop $shop)
    {
        $shop->delete();
        return redirect()->back()->with('message', 'shop has been deleted successfully');
    }
}
