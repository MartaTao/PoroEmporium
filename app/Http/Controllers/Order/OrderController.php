<?php

namespace App\Http\Controllers\Order;
use App\Models\Categorie\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $categorias = Categorie::all();

        return view('order.order', compact('categorias'));
    }

}
