<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['shops'] = Shop::all();
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
        $validated = $request->validated();
        Shop::create($validated);
        return redirect()->route('shop.index')->with('message', 'shop added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shop $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Shop $shop)
    {
        return view('dashboard.director.shop.form', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShopRequest $request
     * @param Shop $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());
        return redirect()->route('shop.index')->with('message', 'shop updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->back()->with('message', 'shop deleted successfully');
    }
}
