<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function order_history()
    {
        $data['orders'] = OrderProduct::where('user_id', auth()->user()->id)->with('product')->get();
        return view('dashboard.user.orderHistory')->with($data);
    }
}
