<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopProduct;
use App\Models\ShopWorker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function getProducts()
    {
        $data['products'] = Product::all();
        return view('manager.masterFood.index')->with($data);
    }

    public function addToMenu($id)
    {
      $shopWorker = ShopWorker::where('user_id', auth()->user()->id)->first();
      $shopProduct = ShopProduct::where('shop_id', $shopWorker->shop_id)->where('product_id', $id)->first();
      if (!$shopProduct){
          $data['shop_id'] = $shopWorker->shop_id;
          $data['product_id'] = $id;
          ShopProduct::create($data);
          return redirect()->route('menumanagement')->with('message', 'Product added to menu successfully');
      }
      else
      {
          return redirect()->back()->with('message', 'This product is already added to the menu');
      }
    }

    public function getMenuProducts()
    {
        $shopWorker = ShopWorker::where('user_id', Auth::user()->id)->first();
        $data['shop'] = Shop::where('id', $shopWorker->shop_id)->with('products')->first();
        return view('manager.menuManagement.index')->with($data);
    }

    public function removeFromMenu($id)
    {
        $shopWorker = ShopWorker::where('user_id', Auth::user()->id)->first();
        $product = ShopProduct::where('shop_id', $shopWorker->shop_id)->where('product_id', $id)->first();
        $product->delete();
        return redirect()->back()->with('message', 'Product removed from menu successfully');
    }

    public function order_history()
    {
        $shopWorker = ShopWorker::where('user_id', Auth::user()->id)->first();
        $data['orders'] = OrderProducts::where('shop_id', $shopWorker->shop_id)->whereDate('created_at', Carbon::today())->get();
        return view('manager.orderHistory')->with($data);
    }
}
