<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopWorker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeShopTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id = ShopWorker::where('user_id', Auth::user()->id)->first();
        $data['shopTime'] = Shop::where('id', $shop_id->shop_id)->get();
        return view('manager.ShopTime.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop_id = ShopWorker::where('user_id', Auth::user()->id)->first();
        $shop = Shop::where('id', $shop_id->shop_id)->first();
        return view('manager.ShopTime.form')->with(compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('manager.ShopTime.form')->with(compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'opening_time' => 'required',
            'closing_time' => 'required'
        ]);
        $shop = Shop::findOrFail($id);
        $shop->update($request->only(['opening_time', 'closing_time']));
        return redirect()->route('shoptime.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
