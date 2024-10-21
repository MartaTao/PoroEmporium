<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CartHasProducts
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && $request->session()->has('cart') && count(session('cart')) > 0) {
            return $next($request);
        }

        return redirect()->route('cart.index')->with('message', 'Debes tener productos en el carrito para continuar.');
    }
}
