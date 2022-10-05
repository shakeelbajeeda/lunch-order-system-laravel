<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = auth()->user();
        if (session('cart')){
            $total = 0;
            foreach(session('cart') as $product){
                $total += $product['price'] * $product['quantity'];
            }
            if ($total > $user->balance){
                return redirect()->back()->with('error', "You don't have enough balance");
            }elseif(!$total){
                return redirect()->back()->with('error', "Please add products to cart first");
            }
            else{
                $order = $this->save_order($total, $user);
                $order_id = $order->id;
                $this->save_order_products($order_id);
                session()->forget('cart');
                return redirect()->back()->with('message', 'Your order has been placed successfully');
            }
        }else{
            return redirect()->back()->with('error', 'Please add product to cart first');
        }
    }

    private function save_order($total, $user)
    {
        $user->decrement('balance', $total);
        $director = User::where('role', 'director')->first();
        $director->balance += $total;
        $director->save();
        $data['user_id'] = $user->id;
        $data['total_amount'] = $total;
        return Order::create($data);
    }

    private function save_order_products($order_id)
    {
       foreach (session('cart') as $product){
           $data['product_id'] = $product['product_id'];
           $data['order_id'] = $order_id;
           $data['shop_id'] = $product['shop_id'];
           $data['quantity'] = $product['quantity'];
           $data['price'] = $product['quantity']* $product['price'];
           OrderProducts::create($data);
       }
    }
}
