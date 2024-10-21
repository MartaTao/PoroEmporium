<?php

namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\Categorie\Categorie;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $categorias = Categorie::all();
        $user = Auth::user();
        
        // Obtener todas las órdenes del usuario actual
        $orders = Order::where('user_id', $user->id)->get();
        
    
        return view('order.order', compact('categorias', 'orders'));
    }
}
