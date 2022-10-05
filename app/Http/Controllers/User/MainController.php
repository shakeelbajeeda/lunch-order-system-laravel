<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function setting()
    {
        $user = auth()->user();
        return view('user.setting', compact('user'));
    }

    /**
     * update user profile
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSetting(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|unique:users,email,'. $user->id,
           'password' => 'confirmed',
        ]);
        if (!isset($request->password)){
            $data['name'] = $validated['name'];
            $data['email'] = $validated['email'];
            $user->update($data);
            return redirect()->back()->with('message', 'Profile Update Successfully');
        }
        if (Hash::check($request->old_password, auth()->user()->password)){
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $user->update($data);
            return redirect()->back()->with('message', 'Profile Update Successfully');
        }else{
            return redirect()->back()->with('error', 'You Enter Incorrect Old Password');
        }

    }

    public function user_order_history()
    {
       $data['orders'] = Order::where('user_id', auth()->user()->id)->with('products')->get();
       return view('user.orderHistory')->with($data);
    }

    public function order_detail($id)
    {
        $data['order'] = Order::where('id', $id)->with('products')->first();
        return view('user.orderDetail')->with($data);
    }
}
