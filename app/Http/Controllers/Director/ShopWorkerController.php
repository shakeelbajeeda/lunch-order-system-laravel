<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopWorkerRequest;
use App\Http\Requests\UpdateShopWorkerRequest;
use App\Models\Shop;
use App\Models\ShopWorker;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class ShopWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['shopStaffs']= ShopWorker::with('shop', 'user')->get();
        return view('director.shopStaff.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::where('role','manager')->orWhere('role', 'shop staff')->get();
        $data['shops'] = Shop::all();
        return view('director.shopStaff.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShopWorkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopWorkerRequest $request)
    {
        ShopWorker::create($request->all());
        return redirect()->route('shopStaff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopWorker  $shopWorker
     * @return \Illuminate\Http\Response
     */
    public function show(ShopWorker $shopWorker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopWorker  $shopWorker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shopWorker = ShopWorker::findOrFail($id);
        $data['shopWorker'] = $shopWorker;
        $data['users'] = User::where('role','manager')->orWhere('role', 'shop staff')->get();
        $data['shops'] = Shop::all();
        return view('director.shopStaff.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopWorkerRequest  $request
     * @param  \App\Models\ShopWorker  $shopWorker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopWorkerRequest $request, $id)
    {
      $shopWorker = ShopWorker::findOrFail($id);
      $shopWorker->update($request->all());
      return redirect()->route('shopStaff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopWorker  $shopWorker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShopWorker::findOrFail($id)->delete();
        return redirect()->back();
    }
}
