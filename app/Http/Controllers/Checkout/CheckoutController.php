<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;

class CheckoutController extends Controller
{
    public function show()
    {
    
        return view('checkout.checkout');
    }
}
