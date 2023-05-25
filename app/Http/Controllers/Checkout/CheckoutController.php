<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = Carrito::all(); // Obtén los datos del carrito
        $total = 0; // Calcula el total del pedido
    
        return view('checkout.checkout', compact('cart', 'total'));
    }
}
