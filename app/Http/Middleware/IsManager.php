<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == 'manager' || auth()->user()->role == 'shop_staff'){
            return $next($request);
        }else{
            return redirect()->back()->with('error', 'You do not have manager access');
        }
    }
}
