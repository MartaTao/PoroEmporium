<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;
use App\Models\Categorie\Categorie;

class CheckoutController extends Controller
{
    public function show()
    {   
        $categorias = Categorie::all();
        $cart = session()->get('cart', []);
        $total = 0;
    
        foreach ($cart as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
    
        return view('checkout.checkout', compact('categorias','cart', 'total'));
    }
}    
