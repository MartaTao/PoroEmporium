<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        $total = 0;
    
        foreach ($cart as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
    
        return view('checkout.checkout', compact('cart', 'total'));
    }
}    
