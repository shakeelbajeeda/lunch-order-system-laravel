<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['shops'] = Shop::all();
        return view('website.index')->with($data);
    }

    public function getShopProducts($id){
        $data['shop'] = Shop::where('id', $id)->with('products')->first();
        return view('website.menu')->with($data);
    }
}
