<?php

namespace App\Http\Controllers;

use App\Models\AusShop;
use App\Models\Product;
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
        $data['shops'] = AusShop::all();
        return view('website.index')->with($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function get_shop_products($id){
        $data['shop'] = AusShop::where('id', $id)->with('products')->first();
        return view('website.menu')->with($data);
    }

    /**
     * @param $id
     * @param $shop_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show_product($id, $shop_id){
        $data['product'] = Product::findOrFail($id);
        $data['shop_id'] = $shop_id;
        return view('website.detail')->with($data);
    }

}
