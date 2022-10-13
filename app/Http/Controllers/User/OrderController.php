<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order_now(Request $request)
    {
        $request->validate([
           'quantity' => 'required|integer|min:1'
        ]);
        $product = Product::findOrFail($request->product_id);
        $total = $request->quantity * $product->price;
        $user = auth()->user();
        $discount = 0;
        if($user->role == 'student') {
            $discount = round($total * 10 /100);
            $total = $total - $discount;
        }
        if ($total > $user->balance){
            return redirect()->back()->with('error', "You don't have enough balance");
        }else{
            $order = $this->save_order($request, $total, $user, $discount);
            return redirect()->back()->with('message', 'Order has been placed successfully');
        }
    }

    private function save_order($req, $total, $user, $discount)
    {
        $user->decrement('balance', $total);
        $director = User::where('role', 'director')->first();
        $director->balance += $total;
        $director->save();
        $key = random_int(0, 999999);
        $key = str_pad($key, 6, 0, STR_PAD_LEFT);
        $data['ref_id'] = '#'.$key;
        $data['user_id'] = $user->id;
        $data['shop_id'] = $req->shop_id;
        $data['product_id'] = $req->product_id;
        $data['discount'] = $discount;
        $data['price'] = $total;
        $data['quantity'] = $req->quantity;
        $data['comment'] = $req->comment;
        return OrderProduct::create($data);
    }
}
