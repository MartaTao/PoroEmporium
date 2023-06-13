<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use App\Models\Discount\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categorias=Categorie::all();
        $products = Product::where('cantidad' ,'>',0)->get();
        $descuentos = Discount::all();
        $nuevosProductos = Product::latest()->take(5)->get();
        return view('index',compact('categorias','products','descuentos','nuevosProductos'));
        
    }
}
