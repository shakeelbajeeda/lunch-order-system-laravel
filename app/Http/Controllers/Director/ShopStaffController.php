<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopStaffRequest;
use App\Http\Requests\UpdateShopStaffRequest;
use App\Models\Shop;
use App\Models\ShopStaff;
use App\Models\User;

class ShopStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['shop_staffs']= ShopStaff::with('shop', 'user')->get();
        return view('dashboard.director.shopStaff.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data['users'] = User::where('role','manager')->orWhere('role', 'shop_staff')->get();
        $data['shops'] = Shop::all();
        return view('dashboard.director.shopStaff.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShopStaffRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShopStaffRequest $request)
    {
        $isUserExist = ShopStaff::where('user_id', $request->user_id)->first();
        if($isUserExist){
            return redirect()->back()->with('error', 'This user is already working on another shop.Please select other one');
        }else{
            ShopStaff::create($request->all());
            return redirect()->route('shopstaff.index')->with('message','ShopStaff added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopStaff  $shopStaff
     * @return \Illuminate\Http\Response
     */
    public function show(ShopStaff $shopstaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.-
     *
     * @param ShopStaff $shopstaff
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ShopStaff $shopstaff)
    {
        $data['shopstaff'] = $shopstaff;
        $data['users'] = User::where('role','manager')->orWhere('role', 'shop_staff')->get();
        $data['shops'] = Shop::all();
        return view('dashboard.director.shopStaff.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShopStaffRequest $request
     * @param ShopStaff $shopstaff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShopStaffRequest $request, ShopStaff $shopstaff)
    {
        $shopstaff->update($request->all());
        return redirect()->route('shopstaff.index')->with('message', 'ShopStaff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ShopStaff $shopstaff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ShopStaff $shopstaff)
    {
        $shopstaff->delete();
        return redirect()->back()->with('message', 'ShopStaff deleted successfully');
    }
}
